<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>

<div class="years-table-container" style="margin-top: 4.5rem;">
    <div class="container-fluid px-0">
        <h1 class="text-center">Tanárok karbantartása</h1>
        <a href="<?= site_url('admin/teachers/add') ?>" class="btn years-add-btn mb-3">Új tanár hozzáadása</a>
        <div class="table-responsive">
            <table class="table years-table mb-0">
                <thead>
                    <tr>
                        <th>Név</th>
                        <th>Felhasználó</th>
                        <th>Tantárgyak</th>
                        <th>Tevékenységek</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datas as $data): ?>
                        <tr>
                            <td><?= esc($data['name']) ?></td>
                            <td><?= esc($data['username']) ?></td>
                            <td><?= esc($data['subjects']) ?></td>
                            <td>
                                <a href='<?= site_url("admin/teachers/update/{$data['id']}"); ?>' title='Módosítás' data-toggle='tooltip' class='btn years-action-btn years-action-btn-warning me-2'>
                                    <i class='far fa-edit'></i>
                                </a>
                                <a href='<?= site_url("admin/teachers/subjects/{$data['id']}"); ?>' title='Tantárgyak' data-toggle='tooltip' class='btn years-action-btn years-action-btn-warning me-2'>
                                    <i class='fas fa-book'></i>
                                </a>
                                <a href='<?= site_url("admin/teachers/availability/{$data['id']}"); ?>' title='Rendelkezésre állás' data-toggle='tooltip' class='btn years-action-btn years-action-btn-warning me-2'>
                                    <i class='far fa-calendar'></i>
                                </a>
                                <?php if ($data['classcount'] == 0) : ?>
                                    <form action='<?= site_url("admin/teachers/show"); ?>' method='post' style='display: inline;'>
                                        <input type='hidden' name='method' value='delete'>
                                        <input type='hidden' name='id' value='<?= esc($data['id']) ?>'>
                                        <button type='submit' title='Törlés' data-toggle='tooltip' class='btn years-action-btn years-action-btn-danger me-2'
                                            onclick="return confirm('Biztosan törli a tanárt (<?= esc($data['name']) ?>)?');">
                                            <i class='far fa-trash-alt'></i>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div id="pagination">
            <?= $pager->links() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>