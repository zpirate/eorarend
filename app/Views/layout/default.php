<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=<?= base_url('css/bootstrap.min.css') ?> rel="stylesheet">
    <link href=<?= base_url('css/style.css') ?> rel="stylesheet">
    <title>e-Órarend</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="col-10">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= url_to('home') ?>">Főoldal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url_to('timetable') ?>">Órarend</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url_to('teachers') ?>">Tanárok</a>
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
                            <li><a class="dropdown-item" href="<?= url_to('admin/classrooms/show') ?>">Osztálytermek</a></li>
                            <li><a class="dropdown-item" href="<?= url_to('admin/teachers/show') ?>">Tanárok</a></li>                           
                        </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-2">
                <div>
                    <?php
                    echo auth()->user()->full_name;
                    ?>
                    <a href="<?= url_to("logout"); ?>">Kilépés</a>
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

    <?= $this->renderSection('content') ?>

    <script src=<?= base_url('js/jquery-3.7.1.min.js'); ?>></script>
    <script src=<?= base_url('/js/common.js'); ?>></script>
    <script src=<?= base_url('js/bootstrap.bundle.min.js'); ?>></script>
    <script>
        setMenuActive('<?= basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) ?>');
    </script>
    <footer>Készítette: Blaschek Loránd és Kaló Bence</footer>
</body>

</html>