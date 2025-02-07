<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h1 class='text-center mt-4'>Órarend</h1>
<div class="mx-5 my-2">
<table class="table table-striped table-bordered border-primary">
    <thead>
        <tr>
            <th>Óra</th>
            <th>Hétfő</th>
            <th>Kedd</th>
            <th>Szerda</th>
            <th>Csütörtök</th>
            <th>Péntek</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            for($i = 1; $i < 10; $i++) {
         ?>
            <tr>
            <td><?= $i ?></td>
            <td>Matematika</td>
            <td>Matematika</td>
            <td>Matematika</td>
            <td>Matematika</td>
            <td>Matematika</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<?= $this->endSection() ?>