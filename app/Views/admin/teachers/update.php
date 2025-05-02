<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center">Tanárok karbantartása</h1>
<div class="m-4">
    <div class="container-fluid px-0">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);
    
    echo start_form('admin/teachers/show');
    echo form_hidden('id', $data['id']);
    // Card style for form fields
    echo '<div class="card shadow-sm border-0 mb-4" style="background: linear-gradient(90deg, var(--card-bg) 0%, #3d246c 100%);">';
    echo '<div class="card-body">';
    echo input_field('name', 'Tanár neve', $data['name']);
    echo select_field('user_id', 'Kapcsolódó felhasználó', $users, $data['user_id'], array('add_empty' => true));
    echo '</div></div>';

    echo start_button_group(array('class' => 'w-100 flex-column flex-sm-row'));
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/teachers/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
    </div>
</div>
<?= $this->endSection() ?> 