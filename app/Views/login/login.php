<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>KICKBATH</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="signin.css">    
</head>
<body class="text-center">
    <form class="form-signin" action="<?= site_url('login') ?>" method="post">
        <img class="mb-1" src="logo.png" alt="" width="84" height="89">
        <h1 class="h3 mb-3 font-arial-black">KICKBATH</h1>

        <label for="username" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>

        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

        <div class="checkbox mb-3">
            <label for="remember">
                <input type="checkbox" name="remember" id="remember"> Remember Me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
        <?php if (session()->getFlashdata('error')) : ?>
            <script>alert('<?= session()->getFlashdata('error') ?>')</script>
        <?php endif; ?>
        <p class="mt-5 mb-3 text-muted">&copy; KICKBATH 2024</p>
    </form>
</body>
</html>