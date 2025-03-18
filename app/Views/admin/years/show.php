<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center">Évfolyamok karbantartása</h1>
<table class="table table-bordered m-3">
    <thead>
        <tr>
            <th>Név</th>
            <th>Tevékenységek</th>
        </tr>
    </thead>
    <tbody>
        <a href="<?= site_url('admin/years/add') ?>" class="btn btn-secondary">Új évfolyam hozzáadása</a>
        <?php
        foreach ($datas as $data): ?>
            <tr>
                <td><?= $data['name'] ?></td>
                <td>
                    <a href='<?= site_url("admin/years/update/{$data['id']}"); ?>' title='Módosítás' data-toggle='tooltip' class='btn btn-sm btn-warning me-2'>
                    <span class='icon icon-edit'></span></a>
                    <a href='<?= site_url("admin/years/subjects/{$data['id']}"); ?>' title='Heti óraszámok' data-toggle='tooltip' class='btn btn-sm btn-warning me-2'>
                    <span class='icon icon-calendar'></span></a>
                    <form action='<?= site_url("admin/years/show"); ?>' method='post' style='display: inline;'>
                        <input type='hidden' name='method' value='delete'>
                        <input type='hidden' name='id' value='<?= $data['id'] ?>'>
                        <button type='submit' title='Törlés' data-toggle='tooltip' class='btn btn-sm btn-danger me-2'
                            onclick="return confirm('Biztosan törli az évfolyamot(<?= $data['name'] ?>)?');">
                            <span class='icon icon-trash'></span>
                        </button>
                    </form>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div id="pagination" class='d-none'>
    <?= $pager->links() ?>
</div>
<?= $this->endSection() ?>