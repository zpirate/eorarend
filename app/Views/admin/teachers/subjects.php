<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center"><?= $teacher['name'] ?> tantárgyai</h1>
<div class="m-4">
    <div class="container-fluid px-0">
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
    echo '<div class="card shadow-sm border-0 mb-4" style="background: linear-gradient(90deg, var(--card-bg) 0%, #3d246c 100%);">';
    echo '<div class="card-body">';
    echo checkbox_fields($allSubjects);
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