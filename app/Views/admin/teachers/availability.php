<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center"><?= $teacher['name'] ?> rendelkezésre állása</h1>
<div class="m-4">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);

    echo start_form('admin/teachers/show');
    echo form_hidden('save', 'availability');
    echo form_hidden('teacher_id', $teacher['id']);
    echo form_hidden('availabality', '');
    ?>

    <div class="mx-5 my-2">
        <table class="table table-bordered border-primary">
            <?= timetableHeader() ?>
            <tbody>
                <?php
                for ($i = 1; $i < 10; $i++) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <?php for ($d = 1; $d < 6; $d++) {
                        ?>
                            <td <?php
                                $html = "id='td_{$d}_{$i}' class='";
                                if (array_key_exists($d, $data) && array_key_exists($i, $data[$d])) {
                                    $html .= 'available';
                                } else {
                                    $html .= 'unavailable';
                                }
                                $html .= "' ondblclick='changeColor(this);'";
                                echo $html;
                             ?>></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    echo start_button_group();
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/teachers/show') . "'"));
    echo button('submit', 'Mentés', 'button', array('class' => 'btn btn-primary frm-button', 'onclick' => "saveAvailability()"));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>