<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<?php if (count($teacher) == 0) : ?>
    <h1>A felhasználó nincs még tanárhoz hozzárendelve</h1>
<?php else : ?>
<h1 class="text-center"><?= $teacher['name'] ?> rendelkezésre állása</h1>
<div class="m-4">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);

    echo start_form( 'admin/teachers/show');
    echo form_hidden('save', $cancelSite == '/' ? 'teacherAvailability' : 'availability');
    echo form_hidden('teacher_id', $teacher['id']);
    echo form_hidden('availability', '');
    ?>

    <div class="mx-5 my-2">
        <table class="table table-bordered border-primary">
            <?= timetableHeader("setFullDayAvailability(this)") ?>
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
        <div class="fs-6">A napra duplát kattintva az egész nap rendelkezésre állása módosítható</div>
    </div>
    <?php
    echo start_button_group();
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 
        'onclick' => "window.location.href='" .  site_url($cancelSite) . "'"));
    echo button('btnSubmit', 'Mentés', 'button', array('class' => 'btn btn-primary frm-button', 'onclick' => "saveAvailability()"));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?php endif; ?>
<?= $this->endSection() ?>