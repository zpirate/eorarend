<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=<?= base_url('css/bootstrap.min.css') ?> rel="stylesheet">
    <link href=<?= base_url('css/style.css'); ?> rel="stylesheet">
    <title>e-Órarend</title>
</head>

<body class="layout-flex-body">
    <nav class="navbar navbar-expand-lg navbar-dark main-navbar">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="<?= url_to('home') ?>">
                <img src="<?= base_url('css/IMG/FilcLogo.png') ?>" alt="Logo" class="navbar-logo me-2">
                <span class="fw-bold">E-Órarend</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a name="home" class="nav-link active" href="<?= url_to('home') ?>">Főoldal</a>
                    </li>
                    <li class="nav-item">
                        <a name="timetable" class="nav-link" href="<?= url_to('timetable') ?>">Órarend</a>
                    </li>
                    <li class="nav-item">
                        <a name="teachers" class="nav-link" href="<?= url_to('teachers') ?>">Tanárok</a>
                    </li>
                    <?php
                    $hide = "d-none";
                    if (auth()->user()->inGroup('admin'))
                        $hide = "";

                    echo "<li class=\"nav-item dropdown {$hide}\">"
                    ?>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Adminisztráció
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= url_to('admin/years/show') ?>">Évfolyamok</a></li>
                        <li><a class="dropdown-item" href="<?= url_to('admin/classes/show') ?>">Osztályok</a></li> 
                        <li><a class="dropdown-item" href="<?= url_to('admin/classrooms/show') ?>">Osztálytermek</a></li>
                        <li><a class="dropdown-item" href="<?= url_to('admin/teachers/show') ?>">Tanárok</a></li>      
                        <li><a class="dropdown-item" href="<?= url_to('admin/subjects/show') ?>">Tantárgyak</a></li>
                        <li><a class="dropdown-item" href="<?= url_to('admin/students/show') ?>">Tanulók</a></li>                    
                    </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center ms-auto">
                    <?php
                    $cName = auth()->getProvider()->getClassName();
                    echo auth()->user()->full_name . (strlen($cName) > 0 ? " ({$cName})" : "");
                    ?>
                    <a href="<?= url_to("logout"); ?>" class="navbar-logout-link ms-3">Kilépés</a>
                </div>
            </div>
        </div>
    </nav>

    <?php if (isset($message) && strlen($message['text']) > 0) {
        $msgType = "class='alert alert-{$message['type']} alert-dismissible' role='alert'";
    ?>
        <div <?= $msgType ?>>
            <div><?= $message['text'] ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="main-content flex-grow-1 d-flex flex-column">
        <?= $this->renderSection('content') ?>
    </div>

    <script src=<?= base_url('js/jquery-3.7.1.min.js'); ?>></script>
    <script src=<?= base_url('/js/common.js'); ?>></script>
    <script src=<?= base_url('js/bootstrap.bundle.min.js'); ?>></script>
    <script>
        setMenuActive('<?= basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) ?>');
    </script>
    <footer class="main-footer mt-5">
        <div class="container text-center py-3">
            <span class="footer-logo">
                <img src="<?= base_url('css/IMG/FilcLogo.png') ?>" alt="Logo" style="height:22px;vertical-align:middle;margin-right:8px;">
            </span>
            <span class="footer-text">
                Készítette: <span class="fw-bold">Blaschek Loránd</span> és <span class="fw-bold">Kaló Bence</span> &middot; &copy; <?= date('Y') ?> e-Órarend
            </span>
        </div>
    </footer>
</body>

</html>