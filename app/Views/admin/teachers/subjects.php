<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center"><?= $teacher['name'] ?> tantárgyai</h1>
<div class="m-4">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);
    
    echo start_form('admin/teachers/show');
    echo form_hidden('save', 'subjects');
    echo form_hidden('teacher_id', $teacher['id']);
    
    // subjects
    $allSubjects = array();
    foreach ($subjects as $subject) {
        $sub = array('id' => $subject['key'], 'title' => $subject['value']);
        if (in_array($subject['key'], $data))
            $sub['checked'] = true;
        array_push($allSubjects, $sub);
    }
    echo checkbox_fields($allSubjects);

    echo start_button_group();
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/teachers/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>