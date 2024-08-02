<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use CodeIgniter\Controller;

class Laporan extends Controller
{
    public function index()
    {
        $transaksiModel = new TransaksiModel();

        $txtTglAwal = $this->request->getPost('txtTglAwal');
        $txtTglAkhir = $this->request->getPost('txtTglAkhir');

        $data = [
            'txtTglAwal' => $txtTglAwal,
            'txtTglAkhir' => $txtTglAkhir,
            'transaksi' => $transaksiModel->getTransaksiByDate($txtTglAwal, $txtTglAkhir),
        ];

        return view('laporan/laporan', $data);
    }

    public function KICKBATH()
    {
        $txtTglAwal = $this->request->getGet('awal');
        $txtTglAkhir = $this->request->getGet('akhir');
    
        $transaksiModel = new TransaksiModel();
        $transaksi = $transaksiModel->getTransaksiByDate($txtTglAwal, $txtTglAkhir);
    
        // Format tanggal ke format Indonesia hanya jika tanggal diberikan
        if (!empty($txtTglAwal) && !empty($txtTglAkhir)) {
            $txtTglAwal = date('d-m-Y', strtotime($txtTglAwal));
            $txtTglAkhir = date('d-m-Y', strtotime($txtTglAkhir));
            $periodeText = 'Periode: ' . $txtTglAwal . ' s/d ' . $txtTglAkhir;
        } else {
            $periodeText = ''; // Kosongkan periode jika tanggal tidak diberikan
        }
    
        // Load library TCPDF
        $tcpdf = new \TCPDF();
    
        // Set document information
        $tcpdf->SetCreator(PDF_CREATOR);
        $tcpdf->SetAuthor('KICKBATH');
        $tcpdf->SetTitle('Laporan Transaksi');
    
        // Add a page
        $tcpdf->AddPage();
    
        // Set content
        $html = '<h2 style="text-align: center;">Laporan Transaksi KICKBATH</h2>';
        if ($periodeText) {
            $html .= '<p style="text-align: center;">' . $periodeText . '</p>';
        }
        $html .= '<table border="1" cellpadding="6" cellspacing="0" style="width: 100%; border-collapse: collapse; font-size: 12px;">
                    <thead>
                        <tr style="background-color: #f2f2f2; font-weight: bold;">
                            <th style="padding: 8px; text-align: center;">No.</th>
                            <th style="padding: 8px; text-align: center;">No. Order</th>
                            <th style="padding: 8px; text-align: center;">Nama</th>
                            <th style="padding: 8px; text-align: center;">Status</th>
                            <th style="padding: 8px; text-align: center;">Total</th>
                        </tr>
                    </thead>
                    <tbody>';
    
        $totalAmount = 0; // Inisialisasi variabel total
    
        if (!empty($transaksi) && is_array($transaksi)) {
            $no = 1;
            foreach ($transaksi as $item) {
                $totalAmount += $item['total']; // Tambahkan total transaksi ke variabel total
                $html .= '<tr>
                            <td style="text-align: center;">' . $no++ . '</td>
                            <td style="text-align: center;">' . esc($item['no_order']) . '</td>
                            <td>' . esc($item['nama']) . '</td>
                            <td style="text-align: center;">' . esc($item['status']) . '</td>
                            <td style="text-align: right;">' . number_format($item['total'], 2, ',', '.') . '</td>
                          </tr>';
            }
        } else {
            $html .= '<tr>
                        <td colspan="5" style="text-align: center; padding: 8px;">Tidak ada data transaksi untuk periode ini.</td>
                      </tr>';
        }
    
        // Tambahkan baris total
        $html .= '<tr style="background-color: #f2f2f2; font-weight: bold;">
                    <td colspan="4" style="text-align: right; padding: 8px;">Jumlah</td>
                    <td style="text-align: right; padding: 8px;">' . number_format($totalAmount, 2, ',', '.') . '</td>
                  </tr>';
    
        $html .= '</tbody></table>';
    
        // Clean output buffer
        if (ob_get_length()) {
            ob_end_clean();
        }
    
        // Output content
        $tcpdf->writeHTML($html, true, false, true, false, '');
    
        $this->response->setContentType('application/pdf');
    
        // Close and output PDF document
        $tcpdf->Output('Laporan_Transaksi.pdf', 'I');
    }
    


}
