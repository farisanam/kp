<!-- app/Views/layout.php -->
<!doctype html>
<html lang="en">
<head>        
    <title>KICKBATH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/sidebar.css">       
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> <!-- DataTables CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> 
</head>
<body>
    <?php echo view('partials/navbar'); ?>
    <div id="wrapper">            
        <?php echo view('partials/sidebar'); ?>

        <!-- Main Content -->
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <script src="/js/jquery-1.12.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> <!-- DataTables JS -->
    <?php echo view('partials/footer'); ?>
</body>
</html>
