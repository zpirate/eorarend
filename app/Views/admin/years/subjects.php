<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center"><?= $year['name'] ?> évfolyam heti óraszámai</h1>
<div class="m-4">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);
    
    echo start_form('admin/years/show');
    echo form_hidden('save', 'lessons');
    echo form_hidden('year_id', $year['id']);
    
    // subjects
    foreach ($data as $row) {
        echo input_field("subject_{$row['subject_id']}", $row['name'], $row['lesson_number']);
    }

    echo start_button_group();
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/years/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>