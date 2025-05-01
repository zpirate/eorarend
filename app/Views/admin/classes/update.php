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
    // Card style for form fields
    echo '<div class="card shadow-sm border-0 mb-4" style="background: linear-gradient(90deg, var(--card-bg) 0%, #3d246c 100%);">';
    echo '<div class="card-body">';
    echo input_field('name', 'Osztály neve', $data['name']);
    echo select_field('year_id', 'Évfolyam', $years, $data['year_id'], array('add_empty' => true));
    echo select_field('class_teacher_id', 'Osztályfőnök', $teachers, $data['class_teacher_id'], array('add_empty' => true));
    echo '</div></div>';

    echo start_button_group(array('class' => 'w-100 flex-column flex-sm-row'));
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/classes/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>