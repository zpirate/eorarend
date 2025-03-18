<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h1 class="text-center mt-5 mb-5">E-Órarend</h1>
<h3 class="text-center">Üdvözöljük az E-Órarend alkalmazásban!</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-2 stat">
            <div class="stat-title">Évfolyamok</div>
            <div class="stat-value">2</div>
        </div>
        <div class="col-2 stat">
            <div class="stat-title">Tantárgyak</div>
            <div class="stat-value">13</div>
        </div>
        <div class="col-2 stat">
            <div class="stat-title">Tanulók</div>
            <div class="stat-value">234</div>
        </div>
        <div class="col-2 stat">
            <div class="stat-title">Tanárok</div>
            <div class="stat-value">26</div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>