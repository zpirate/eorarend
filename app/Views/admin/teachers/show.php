<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>

<h1 class="text-center">Tanárok karbantartása</h1>
<table class="table table-bordered m-3">
    <thead>
        <tr>
            <th>Név</th>
            <th>Felhasználó</th>
            <th>Tevékenységek</th>
        </tr>
    </thead>
    <tbody>
        <a href="<?= site_url('admin/teachers/add') ?>" class="btn btn-secondary">Új tanár hozzáadása</a>
        <?php
        foreach ($teachers as $teacher): ?>
            <tr>
                <td><?= $teacher['name'] ?></td>
                <td><?= $teacher['username'] ?></td>
                <td>
                    <a href='<?= site_url("admin/teachers/update/{$teacher['id']}"); ?>' title='Módosítás' data-toggle='tooltip' class='btn btn-sm btn-warning me-2'>
                        <i class='far fa-edit'></i></a>
                    <?php if ($teacher['classcount'] == 0) : ?>
                        <a href='<?= site_url("admin/teachers/delete/{$teacher['id']}"); ?>'
                            title='Törlés' data-toggle='tooltip'
                            class='btn btn-sm btn-danger me-2'
                            onclick="return confirm('Biztosan törli a tanárt (<?= $teacher['name'] ?>)?');">
                            <i class='far fa-trash-alt'></i>
                        </a>
                    <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div id="pagination" class='d-none'>
    <?= $pager->links() ?>
</div>
<?= $this->endSection() ?>