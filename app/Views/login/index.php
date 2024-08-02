<!-- app/Views/login/index.php -->
<!doctype html>
<html lang="en">
<head>        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - KICKBATH</title>
    <link rel="stylesheet" href="<?= base_url('css/signin.css') ?>">
    <!-- Sertakan Bootstrap jika diperlukan -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body class="text-center">
    <form class="form-signin" action="<?= base_url('auth/login') ?>" method="post">
        <img class="mb-1" src="<?= base_url('img/logo.png') ?>" alt="" width="84" height="89">
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
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger mt-3"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <p class="mt-5 mb-3 text-muted">&copy; KICKBATH 2024</p>
    </form>
</body>
</html>
