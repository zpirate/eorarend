<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h1 class="text-center home-title mb-5">Tanáraink</h1>
<div class="container">
    <div class="row justify-content-center g-4">
        <?php foreach ($teachers as $teacher) : ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card teacher-card shadow-sm hover-shadow h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                        <div class="teacher-avatar mb-3">
                            <span class="bi bi-person-circle"></span>
                        </div>
                        <h5 class="card-title teacher-name mb-2"><?= esc($teacher['name']) ?></h5>
                        <?php if (!empty($teacher['subject'])): ?>
                            <div class="teacher-subject mb-1"><?= esc($teacher['subject']) ?></div>
                        <?php endif; ?>
                        <div class="teacher-description mt-2 text-secondary small text-center">
                            <?= !empty($teacher['description']) ? esc($teacher['description']) : 'Ide jön majd valami ...' ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?= $this->endSection() ?>