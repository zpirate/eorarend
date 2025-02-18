<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center">Tanulók karbantartása</h1>
<div class="m-4">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);
    
    echo start_form('admin/students/show');
    echo form_hidden('id', $data['id']);
    echo input_field('name', 'Tanuló neve', $data['name']);
    echo select_field('class_id', 'Osztály', $classes, $data['class_id'], array('add_empty' => true));
    echo input_field('educational_id', 'Oktatási azonosító', $data['educational_id']);
    echo start_button_group();
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/students/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>