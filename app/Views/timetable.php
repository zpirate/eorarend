<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<div class="timetable-outer">
    <h1 class="text-center mt-4 home-title">Órarend</h1>
    <?php
    helper('form');
    $hide = "class='d-none'";
    $isAdmin = auth()->user()->inGroup('admin');
    $isStudent = auth()->user()->inGroup('student');
    if ($isAdmin) {
        $hide = "";
    }
    // Only show selector for admin, not for students
    if ($isAdmin) {
        echo "<div class='timetable-selector-outer' {$hide}>";
        echo select_field('class_id', 'Osztály', $classes, $active, 
            array('class' => 'form-select timetable-selector', 'onclick' => "window.location='" . url_to('timetable') . "/' + $(\"select[name='class_id']\").find(\":selected\").val()"));
        echo "</div>";
    }
    ?>
    <div class="timetable-card mx-auto my-4">
        <table class="table table-striped table-bordered border-primary timetable-table mb-0">
            <?= timetableHeader() ?>
            <tbody>
                <?php
                for ($i = 0; $i < 9; $i++) {
                ?>
                    <tr>
                        <td class="timetable-lesson"><?= $i + 1 ?></td>
                        <?php for ($d = 0; $d < 5; $d++) { ?>
                            <td>
                                <?php if (count($timetable) > $d && count($timetable[$d]) > $i && !empty($timetable[$d][$i]['subject_name'])) {
                                    echo "<div class='timetable-subject'>{$timetable[$d][$i]['subject_name']} <span class='tt-data-teacher'>({$timetable[$d][$i]['teacher_name']})</span></div>
                                    <div class='tt-data-classrooom'>{$timetable[$d][$i]['classroom_name']}</div>";
                                } else {
                                    echo "<div>&nbsp;</div>
                                    <div class='tt-data-classrooom'>&nbsp;</div>";
                                }
                                ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>