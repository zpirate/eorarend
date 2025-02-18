<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>

<h1 class="text-center">Tanulók karbantartása</h1>
<table class="table table-bordered m-3">
    <thead>
        <tr>
            <th>Név</th>
            <th>Osztály</th>
            <th>Oktatási azonosító</th>
            <th>Tevékenységek</th>
        </tr>
    </thead>
    <tbody>
        <a href="<?= site_url('admin/students/add') ?>" class="btn btn-secondary">Új tanuló hozzáadása</a>
        <?php
        foreach ($datas as $data): ?>
            <tr>
                <td><?= $data['name'] ?></td>
                <td><?= $data['class_name'] ?></td>
                <td><?= $data['educational_id'] ?></td>
                <td>
                    <a href='<?= site_url("admin/students/update/{$data['id']}"); ?>' title='Módosítás' data-toggle='tooltip' class='btn btn-sm btn-warning me-2'>
                        <i class='far fa-edit'></i></a>
                        <form action='<?= site_url("admin/students/show"); ?>' method='post' style='display: inline;'>
                            <input type='hidden' name='method' value='delete'>
                            <input type='hidden' name='id' value='<?= $data['id'] ?>'>
                            <button type='submit' title='Törlés' data-toggle='tooltip' class='btn btn-sm btn-danger me-2'
                                onclick="return confirm('Biztosan törli a tanulót (<?= $data['name'] ?>)?');">
                                <i class='far fa-trash-alt'></i>
                            </button>
                        </form>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div id="pagination">
    <?= $pager->links() ?>
</div>
<?= $this->endSection() ?>