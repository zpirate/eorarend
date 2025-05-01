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
        echo "<label for='class_id' class='d-block d-md-none mb-1' style='font-weight:600;color:var(--primary-purple);'>Válassz osztályt:</label>";
        echo select_field('class_id', 'Osztály', $classes, $active, 
            array('class' => 'form-select timetable-selector', 'id' => 'class_id', 'onclick' => "window.location='" . url_to('timetable') . "/' + $(\"select[name='class_id']\").find(\":selected\").val()"));
        echo "</div>";
    }
    ?>

    <!-- Mobile day selector -->
    <div class="d-block d-md-none mb-3">
        <select id="mobile-day-selector" class="form-select timetable-mobile-day-selector" aria-label="Válassz napot">
            <option value="0">Hétfő</option>
            <option value="1">Kedd</option>
            <option value="2">Szerda</option>
            <option value="3">Csütörtök</option>
            <option value="4">Péntek</option>
        </select>
    </div>

    <!-- Mobile vertical list for lessons -->
    <div id="mobile-timetable-list" class="d-block d-md-none timetable-mobile-list"></div>

    <div class="timetable-card mx-auto my-4 table-responsive d-none d-md-block" style="overflow-x:auto; width:100%;">
        <table class="table table-striped table-bordered border-primary timetable-table mb-0" id="main-timetable">
            <?= timetableHeader() ?>
            <tbody>
                <?php
                for ($i = 0; $i < 9; $i++) {
                ?>
                    <tr>
                        <td class="timetable-lesson"><?= $i + 1 ?></td>
                        <?php for ($d = 0; $d < 5; $d++) { ?>
                            <td class="timetable-day-col timetable-day-col-<?= $d ?>">
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    var timetableData = <?= json_encode($timetable) ?>;
    var lessonCount = 9;
    var dayNames = ["Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek"];

    function renderMobileList(dayIdx) {
        var list = document.getElementById('mobile-timetable-list');
        // Only add animation class if not already initialized
        if (!list.classList.contains('timetable-mobile-list-initialized')) {
            list.classList.add('timetable-mobile-list-initialized');
        }
        // Build HTML
        let html = '';
        var lessons = timetableData[dayIdx] || [];
        for (var i = 0; i < lessonCount; i++) {
            var entry = lessons[i] || {};
            var subject = entry.subject_name || '';
            var teacher = entry.teacher_name || '';
            var classroom = entry.classroom_name || '';
            html += '<div class="timetable-mobile-lesson">';
            html += '<div class="timetable-mobile-lesson-num">' + (i+1) + '. óra</div>';
            if (subject) {
                html += '<div class="timetable-mobile-subject">' + subject + 
                    (teacher ? ' <span class="tt-data-teacher">(' + teacher + ')</span>' : '') + '</div>';
                html += '<div class="tt-data-classrooom">' + classroom + '</div>';
            } else {
                html += '<div class="timetable-mobile-empty">-</div>';
            }
            html += '</div>';
        }
        list.innerHTML = html;
    }

    function updateDayColumnsMobile() {
        var day = document.getElementById('mobile-day-selector').value;
        renderMobileList(day);
    }

    function isMobile() {
        return window.innerWidth <= 600;
    }
    var selector = document.getElementById('mobile-day-selector');
    if (selector) {
        selector.addEventListener('change', function() {
            if (isMobile()) updateDayColumnsMobile();
        });
        if (isMobile()) updateDayColumnsMobile();
        window.addEventListener('resize', function() {
            if (isMobile()) {
                updateDayColumnsMobile();
                document.getElementById('main-timetable').parentElement.classList.add('d-none');
                document.getElementById('mobile-timetable-list').classList.remove('d-none');
            } else {
                document.getElementById('main-timetable').parentElement.classList.remove('d-none');
                document.getElementById('mobile-timetable-list').classList.add('d-none');
            }
        });
    }
    if (isMobile()) {
        document.getElementById('main-timetable').parentElement.classList.add('d-none');
        document.getElementById('mobile-timetable-list').classList.remove('d-none');
        updateDayColumnsMobile();
    } else {
        document.getElementById('main-timetable').parentElement.classList.remove('d-none');
        document.getElementById('mobile-timetable-list').classList.add('d-none');
    }
});
</script>
<?= $this->endSection() ?>