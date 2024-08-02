<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li>
            <a href="../index.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
        </li>
        <li>
            <a href="../pelanggan"><span class="glyphicon glyphicon-list-alt"></span> Pelanggan</a>
        </li>        
        <li>
            <a href="../paket"><span class="glyphicon glyphicon-list-alt"></span> Paket</a>
        </li>
        <li>
            <a href="../transaksi"><span class="glyphicon glyphicon-shopping-cart"></span> Transaksi</a>
        </li>
        <li>
            <a href="../laporan"><span class="glyphicon glyphicon-file"></span> Laporan</a>
        </li>        
        <li>
            <a href="../tentang"><span class="glyphicon glyphicon-info-sign"></span> Tentang KICKBATH</a>
        </li>
    </ul>
</div>

        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        <script src="js/bootstrap.min.js"></script>