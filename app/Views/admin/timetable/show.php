<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h1 class='text-center mt-4'>Órarend beosztása</h1>
<?php
helper('form');
$hide = "class='d-none'";
if (auth()->user()->inGroup('admin'))
    $hide = "";
echo "<div {$hide}>";
echo select_field(
    'class_id',
    'Osztály',
    $classes,
    $active,
    array('onclick' => "window.location='" . url_to('admin/timetable/show') . "/' + $(\"select[name='class_id']\").find(\":selected\").val()")
);
echo "</div>";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="mx-5 my-2">
                <table class="table table-striped table-bordered border-primary">
                    <thead>
                        <tr>
                            <th scope="col">Tantárgy</th>
                            <th scope="col">Óraszám</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($subjects as $subject) {
                            $class = 'unfit';
                            if ($subject['lesson_number'] == $subject['act_number']) {
                                $class = 'fit';
                            }
                            echo "<tr id='tr_{$subject['subject_id']}' class='{$class}'>";
                            echo "<td>{$subject['subject_name']}</td>";
                            echo "<td><span id='lesson_{$subject['subject_id']}'>{$subject['lesson_number']}</span> / <span id='subject_{$subject['subject_id']}'>{$subject['act_number']}</span></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-9">
            <div class="mx-5 my-2">
                <table class="table table-striped table-bordered border-primary">
                    <?= timetableHeader() ?>
                    <tbody>
                        <?php
                        for ($i = 0; $i < 9; $i++) {
                        ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <?php for ($d = 0; $d < 5; $d++) {
                                ?>
                                    <td><?php
                                        //print_r($subjects);
                                        $subject_id = $timetable[$d][$i]['subject_id'];
                                        $classroom_id = $timetable[$d][$i]['classroom_id'];
                                        echo "<div>
                                            <select id='subject_{$i}_{$d}' class='long'
                                                data-oldvalue='{$subject_id}'
                                                onchange='updateSubject(this, \"" . url_to('admin/timetable/updatesubject') . "\", {$d}, {$i})'>";
                                        echo "<option value='-'>-</option>";
                                        foreach ($subjects as $subject) {
                                            $avail = false;
                                            if (empty($subject['teacher_id'])) {
                                                $avail = true;
                                            } else {
                                                foreach ($availables as $available) {
                                                    if (
                                                        $available['day'] == $d + 1 && $available['hour'] == $i + 1
                                                        && $subject['teacher_id'] == $available['teacher_id']
                                                    ) {
                                                        $avail = true;
                                                        break;
                                                    }
                                                }
                                            }

                                            if ($avail) {
                                                $active = "";
                                                if ($subject['subject_id'] === $subject_id) {
                                                    $active = "selected";
                                                }
                                                echo "<option value='{$subject['subject_id']}' {$active}>{$subject['subject_name']} ({$subject['teacher_name']})</option>";
                                            }
                                        }
                                        echo "
                                </select>
                                </div>
                                <div class='tt-data-classrooom'>
                                <select id='classroom_{$i}_{$d}' onchange='updateClassroom(\"" . url_to('admin/timetable/updateclassroom') . "\", {$d}, {$i}, $(this).val())'>";
                                        echo "<option value='-'>-</option>";
                                        foreach ($classrooms as $classroom) {
                                            $active = "";
                                            if ($classroom['key'] === $classroom_id) {
                                                $active = "selected";
                                            }
                                            echo "<option value='{$classroom['key']}' {$active}>{$classroom['value']}</option>";
                                        }
                                        echo "
                                        </select></div>";
                                        ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>