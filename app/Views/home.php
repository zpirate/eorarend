<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h1 class="text-center mb-5 home-title">Üdvözöljük az E-Órarend alkalmazásban!</h1>

<div class="container">
    <div class="row justify-content-center g-4">

        <!-- Órarend Card (bigger, left) -->
        <div class="col-12 col-md-6">
            <a href="<?= url_to('timetable') ?>" class="text-decoration-none">
                <div class="card h-100 shadow-sm text-center home-card hover-shadow py-5">
                    <div class="card-body">
                        <span class="fs-1 mb-2 d-block"><i class="bi bi-calendar3"></i></span>
                        <h4 class="card-title">Órarend</h4>
                        <p class="card-text text-secondary">Nézze meg az órarendet.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tanárok Card (bigger, right) -->
        <div class="col-12 col-md-6">
            <a href="<?= url_to('teachers') ?>" class="text-decoration-none">
                <div class="card h-100 shadow-sm text-center home-card hover-shadow py-5">
                    <div class="card-body">
                        <span class="fs-1 mb-2 d-block"><i class="bi bi-person-lines-fill"></i></span>
                        <h4 class="card-title">Tanárok</h4>
                        <p class="card-text text-secondary">Tanári névsor megtekintése.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Adminisztráció Card (full width, only for admin) -->
        <?php if (auth()->user() && auth()->user()->inGroup('admin')): ?>
        <div class="col-12 mt-5">
            <div class="card h-100 shadow-sm text-center home-card hover-shadow py-4">
                <div class="card-body">
                    <span class="fs-1 mb-2 d-block"><i class="bi bi-gear"></i></span>
                    <h5 class="card-title mb-4">Adminisztráció</h5>
                    <div class="row g-3 justify-content-center flex-nowrap overflow-auto admin-links-row">
                        <div class="col-6 col-sm-4 col-md-2 admin-link-col">
                            <a href="<?= url_to('admin/years/show') ?>" class="text-decoration-none">
                                <div class="card admin-link-card h-100 text-center">
                                    <div class="card-body py-3">
                                        <span class="bi bi-calendar-range fs-2 mb-2 d-block"></span>
                                        <div>Évfolyamok</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-2 admin-link-col">
                            <a href="<?= url_to('admin/classes/show') ?>" class="text-decoration-none">
                                <div class="card admin-link-card h-100 text-center">
                                    <div class="card-body py-3">
                                        <span class="bi bi-collection fs-2 mb-2 d-block"></span>
                                        <div>Osztályok</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-2 admin-link-col">
                            <a href="<?= url_to('admin/classrooms/show') ?>" class="text-decoration-none">
                                <div class="card admin-link-card h-100 text-center">
                                    <div class="card-body py-3">
                                        <span class="bi bi-door-open fs-2 mb-2 d-block"></span>
                                        <div>Osztálytermek</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-2 admin-link-col">
                            <a href="<?= url_to('admin/teachers/show') ?>" class="text-decoration-none">
                                <div class="card admin-link-card h-100 text-center">
                                    <div class="card-body py-3">
                                        <span class="bi bi-person-badge fs-2 mb-2 d-block"></span>
                                        <div>Tanárok</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-2 admin-link-col">
                            <a href="<?= url_to('admin/subjects/show') ?>" class="text-decoration-none">
                                <div class="card admin-link-card h-100 text-center">
                                    <div class="card-body py-3">
                                        <span class="bi bi-journal-bookmark fs-2 mb-2 d-block"></span>
                                        <div>Tantárgyak</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-2 admin-link-col">
                            <a href="<?= url_to('admin/students/show') ?>" class="text-decoration-none">
                                <div class="card admin-link-card h-100 text-center">
                                    <div class="card-body py-3">
                                        <span class="bi bi-people fs-2 mb-2 d-block"></span>
                                        <div>Tanulók</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?= $this->endSection() ?>