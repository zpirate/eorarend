<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h1 class='text-center mt-4'>Órarend</h1>
<?php
helper('form');
$hide = "class='d-none'";
if (auth()->user()->inGroup('admin'))
    $hide = "";
echo "<div {$hide}>";
echo select_field('class_id', 'Osztály', $classes, $active, 
    array('onclick' => "window.location='" . url_to('timetable') . "/' + $(\"select[name='class_id']\").find(\":selected\").val()"));
echo "</div>";
?>
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
                        <td><?php if (count($timetable) > $d && count($timetable[$d]) > $i && !empty($timetable[$d][$i]['subject_name'])) {
                                echo "<div>{$timetable[$d][$i]['subject_name']} <span class='tt-data-teacher'>({$timetable[$d][$i]['teacher_name']})</span></div>
                                <div class='tt-data-classrooom'>{$timetable[$d][$i]['classroom_name']}</div>";
                            } else {
                                echo "<div>&nbsp;</div>
                                <div class='tt-data-classrooom'>&nbsp;</div>";
                            }
                            ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>