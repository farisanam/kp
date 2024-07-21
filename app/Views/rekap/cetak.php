<?php 
session_start();

require_once '../koneksi.php';  // Pastikan file ini ada dan koneksi ke database benar
require ('functions.php');
require_once('fpdf/fpdf.php');

$awal = $_GET['awal']; 
$akhir = $_GET['akhir'];

function IndonesiaTgl($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

class PDF extends FPDF
{
    // Atur margin yang lebih kecil
    function __construct() {
        parent::__construct();
        $this->SetMargins(10, 10, 10);
        $this->SetAutoPageBreak(true, 10);
    }

    // Fungsi Header
    function Header()
    {
        // Judul
        $this->SetFont('Arial','B',14);
        $this->Cell(0,10,'Laporan Transaksi KICKBATH',0,1,'C');

        // Garis baru
        $this->Ln(5);

        // Tampilkan periode
        global $awal, $akhir;
        $this->SetFont('Arial','',12);
        $this->Cell(0,10,'Periode Pemesanan: '.IndonesiaTgl($awal).' s/d '.IndonesiaTgl($akhir),0,1,'C');

        // Garis baru
        $this->Ln(5);
    }

    // Fungsi untuk menampilkan tabel
    function Content($conn)
    {
        global $awal, $akhir;

        $SqlPeriode = " WHERE masuk BETWEEN '$awal' AND '$akhir' AND status = 'Sudah diambil'";
        $query = "SELECT * FROM transaksi".$SqlPeriode;
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die('Query Error: '.mysqli_error($conn));
        }

        $this->SetFont('Arial','B',8);
        $this->SetFillColor(230, 230, 230);
        $this->Cell(10,7,'No.',1,0,'C',true);
        $this->Cell(25,7,'Tanggal Masuk',1,0,'C',true);
        $this->Cell(40,7,'Nama Pelanggan',1,0,'C',true);
        $this->Cell(25,7,'Kategori',1,0,'C',true);
        $this->Cell(25,7,'Paket',1,0,'C',true);
        $this->Cell(15,7,'PCS',1,0,'C',true);
        $this->Cell(25,7,'Status',1,0,'C',true);
        $this->Cell(25,7,'Total',1,1,'C',true);

        $this->SetFont('Arial','',8);
        $no = 1;
        $total_harga = 0;
        while ($row = mysqli_fetch_array($result)) {
            $this->Cell(10,7,$no++,1,0,'C');
            $this->Cell(25,7,IndonesiaTgl($row['masuk']),1,0,'C');
            $this->Cell(40,7,$row['nama_konsumen'],1,0,'L');
            $this->Cell(25,7,$row['kategori'],1,0,'L');
            $this->Cell(25,7,$row['paket'],1,0,'L');
            $this->Cell(15,7,$row['pcs'],1,0,'C');
            $this->Cell(25,7,$row['status'],1,0,'C');
            $this->Cell(25,7,'Rp. '.number_format($row['harga_total']),1,1,'R');
            $total_harga += $row['harga_total'];
        }

        // Total
        $this->SetFont('Arial','B',8);
        $this->Cell(165,7,'Jumlah',1,0,'C',true);
        $this->Cell(25,7,'Rp. '.number_format($total_harga),1,1,'R',true);
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->Content($conn);
$pdf->Output();
?>