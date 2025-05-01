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
    foreach ($subjects as $subject) {
        if ($subject != null) {
            $tId = -1;
            foreach ($data as $row) {
                if ($row['subject_id'] === $subject['subject_id']) {
                    $tId = $row['teacher_id'];
                    break;
                }
            }
            
            echo "<div class='col-4 mb-3'>{$subject['subject_name']}</div><div class='col-8'>";
            echo select_field("sel_teacher_{$subject['subject_id']}", "", filter_options($teachers, $subject['subject_id']), $tId, array('add_empty' => true));
            echo "</div>";
        }
    }

    echo start_button_group();
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/classes/show') . "'"));
    echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
    echo end_button_group();
    echo end_form();
    ?>
</div>
<?= $this->endSection() ?>