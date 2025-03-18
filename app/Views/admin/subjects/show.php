<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center">Tantárgyak karbantartása</h1>
<table class="table table-bordered m-3">
    <thead>
        <tr>
            <th>Név</th>
            <th>Tevékenységek</th>
        </tr>
    </thead>
    <tbody>
        <a href="<?= site_url('admin/subjects/add') ?>" class="btn btn-secondary">Új tantárgy hozzáadása</a>
        <?php
        foreach ($datas as $data): ?>
            <tr>
                <td><?= $data['name'] ?></td>
                <td>
                    <form action='<?= site_url("admin/subjects/show"); ?>' method='post' style='display: inline-block;'>
                    <a href='<?= site_url("admin/subjects/update/{$data['id']}"); ?>' title='Módosítás' data-toggle='tooltip' class='btn btn-sm btn-warning me-2'>
                        <span class='icon icon-edit'></span></a>
                        <input type='hidden' name='method' value='delete'>
                        <input type='hidden' name='id' value='<?= $data['id'] ?>'>
                        <button type='submit' title='Törlés' data-toggle='tooltip' class='btn btn-sm btn-danger me-2'
                            onclick="return confirm('Biztosan törli a tantárgyat (<?= $data['name'] ?>)?')">
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