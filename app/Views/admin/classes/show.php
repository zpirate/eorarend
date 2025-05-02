<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div class="years-table-container" style="margin-top: 4.5rem;">
    <h1 class="text-center">Osztályok karbantartása</h1>
    <a href="<?= site_url('admin/classes/add') ?>" class="btn years-add-btn mb-3">Új osztály hozzáadása</a>
    <div class="table-responsive">
        <table class="table years-table mb-0">
            <thead>
                <tr>
                    <th>Név</th>
                    <th>Évfolyam</th>
                    <th>Osztályfőnök</th>
                    <th>Tevékenységek</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datas as $data): ?>
                    <tr>
                        <td><?= esc($data['name']) ?></td>
                        <td><?= esc($data['year_name']) ?></td>
                        <td><?= esc($data['teacher_name']) ?></td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                <a href='<?= site_url("admin/classes/update/{$data['id']}"); ?>' title='Módosítás' data-toggle='tooltip' class='btn years-action-btn years-action-btn-warning me-2 mb-1'>
                                    <i class='far fa-edit'></i>
                                </a>
                                <form action='<?= site_url("admin/classes/show"); ?>' method='post' style='display: inline;'>
                                    <input type='hidden' name='method' value='delete'>
                                    <input type='hidden' name='id' value='<?= esc($data['id']) ?>'>
                                    <button type='submit' title='Törlés' data-toggle='tooltip' class='btn years-action-btn years-action-btn-danger me-2 mb-1'
                                        onclick="return confirm('Biztosan törli az osztályt (<?= esc($data['name']) ?>)?');">
                                        <i class='far fa-trash-alt'></i>
                                    </button>
                                </form>
                            </div>
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