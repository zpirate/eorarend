<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center"><?= $class['name'] ?> osztály tanárai</h1>
<div class="m-4">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);

    echo start_form('admin/classes/show');
    echo form_hidden('save', 'teachers');
    echo form_hidden('class_id', $class['id']);

    // teachers
    $allSubjects = array();
    echo '<div class="row">';
    foreach ($subjects as $subject) {
        if ($subject != null) {
            $tId = -1;
            foreach ($data as $row) {
                if ($row['subject_id'] === $subject['subject_id']) {
                    $tId = $row['teacher_id'];
                    break;
                }
            }
            echo '<div class="col-12 col-md-6 mb-3">';
            echo '<div class="card shadow-sm border-0 h-100" style="background: linear-gradient(90deg, var(--card-bg) 0%, #3d246c 100%);">';
            echo '<div class="card-body">';
            echo "<div class='mb-2 fw-bold text-light'>{$subject['subject_name']}</div>";
            echo select_field("sel_teacher_{$subject['subject_id']}", "", filter_options($teachers, $subject['subject_id']), $tId, array('add_empty' => true));
            echo '</div></div></div>';
        }
    }
    echo '</div>';

    echo start_button_group(array('class' => 'w-100 flex-column flex-sm-row'));
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/classes/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>