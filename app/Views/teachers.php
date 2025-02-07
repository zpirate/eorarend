<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h1 class="text-center">Tanáraink</h1>
<div class="container text-center">
    <div class="row">
        <?php foreach ($teachers as $teacher) : ?>
            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $teacher['name'] ?></h5>
                        <p class="card-text">Ide jön majd valami ...</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>