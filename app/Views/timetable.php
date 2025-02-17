<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h1 class='text-center mt-4'>Órarend</h1>
<?php
helper('form');
$hide = "d-none";
if (auth()->user()->inGroup('admin'))
    $hide = "";
echo "<div class='{$hide}'>";
echo select_field('class_id', 'Osztály', $classes, 1);
echo "</div'>";
?>
<div class="mx-5 my-2">
    <table class="table table-striped table-bordered border-primary">
        <thead>
            <tr>
                <th class="tt-head tt-head-lesson">Óra</th>
                <th class="tt-head tt-head-day">Hétfő</th>
                <th class="tt-head tt-head-day">Kedd</th>
                <th class="tt-head tt-head-day">Szerda</th>
                <th class="tt-head tt-head-day">Csütörtök</th>
                <th class="tt-head tt-head-day">Péntek</th>
            </tr>
        </thead>
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