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
    // Card style for form fields
    echo '<div class="card shadow-sm border-0 mb-4" style="background: linear-gradient(90deg, var(--card-bg) 0%, #3d246c 100%);">';
    echo '<div class="card-body">';
    echo input_field('name', 'Terem neve', $data['name']);
    echo '</div></div>';

    echo start_button_group(array('class' => 'w-100 flex-column flex-sm-row'));
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/classrooms/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>