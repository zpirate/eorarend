<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div class="years-table-container" style="margin-top: 4.5rem;">
    <h1 class="text-center">Tantárgyak karbantartása</h1>
    <a href="<?= site_url('admin/subjects/add') ?>" class="btn years-add-btn mb-3">Új tantárgy hozzáadása</a>
    <div class="table-responsive">
        <table class="table years-table mb-0">
            <thead>
                <tr>
                    <th>Név</th>
                    <th>Tevékenységek</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datas as $data): ?>
                    <tr>
                        <td><?= esc($data['name']) ?></td>
                        <td>
                            <a href='<?= site_url("admin/subjects/update/{$data['id']}"); ?>' title='Módosítás' data-toggle='tooltip' class='btn years-action-btn years-action-btn-warning me-2'>
                                <i class='icon-edit'></i>
                            </a>
                            <form action='<?= site_url("admin/subjects/show"); ?>' method='post' style='display: inline;'>
                                <input type='hidden' name='method' value='delete'>
                                <input type='hidden' name='id' value='<?= esc($data['id']) ?>'>
                                <button type='submit' title='Törlés' data-toggle='tooltip' class='btn years-action-btn years-action-btn-danger me-2'
                                    onclick="return confirm('Biztosan törli a tantárgyat (<?= esc($data['name']) ?>)?');">
                                    <i class='icon-trash'></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="pagination" class='d-none'>
        <?= $pager->links() ?>
    </div>
</div>
<?= $this->endSection() ?>