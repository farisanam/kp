<!-- app/Views/layout.php -->
<!doctype html>
<html lang="en">
<head>
    <?= view('layouts/partials/header') ?>
</head>
<body>
    <?php echo view('layouts/partials/navbar'); ?>
    <div id="wrapper">
        <?php echo view('layouts/partials/sidebar'); ?>

        <!-- Main Content -->
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> <!-- DataTables JS -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <?php echo view('layouts/partials/footer'); ?>
</body>
</html>
