<!-- app/Views/layouts/partials/navbar.php -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">KICKBATH</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('auth/logout') ?>">Log Out <span class="glyphicon glyphicon-off"></span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
