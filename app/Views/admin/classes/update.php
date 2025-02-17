<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center">Osztály karbantartása</h1>
<div class="m-4">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);

    echo start_form('admin/classes/show');
    echo form_hidden('id', $data['id']);
    echo input_field('name', 'Osztály neve', $data['name']);
    echo select_field('year_id', 'Évfolyam', $years, $data['year_id'], array('add_empty' => true));
    echo select_field('class_teacher_id', 'Osztályfőnők', $teachers, $data['class_teacher_id'], array('add_empty' => true));
    echo start_button_group();
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/classes/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>