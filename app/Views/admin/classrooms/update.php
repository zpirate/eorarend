<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center">Osztálytermek karbantartása</h1>
<div class="m-4">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);

    echo start_form('admin/classrooms/show');
    echo form_hidden('id', $data['id']);
    echo input_field('name', 'Terem neve', $data['name']);
    echo start_button_group();
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/classrooms/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>