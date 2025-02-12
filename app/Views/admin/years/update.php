<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center">Évfolyamok karbantartása</h1>
<div class="m-4">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);

    echo start_form('admin/years/show');
    echo form_hidden('id', $data['id']);
    echo input_field('name', 'Évfolyam neve', $data['name']);
    echo start_button_group();
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/years/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>