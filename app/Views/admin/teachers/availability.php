<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center"><?= $teacher['name'] ?> rendelkezésre állása</h1>
<div class="m-4">
    <div class="container-fluid px-0">
    <?php
    helper('form');
    if (isset($errors))
        setError($errors);

    echo start_form('admin/teachers/show');
    echo form_hidden('save', 'availability');
    echo form_hidden('teacher_id', $teacher['id']);
    echo form_hidden('availability', '');
    ?>

    <div class="mx-0 my-2">
        <div class="table-responsive">
            <table class="table table-bordered border-primary availability-table">
                <thead>
                    <?= timetableHeader("setFullDayAvailability(this)") ?>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i < 10; $i++) {
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <?php for ($d = 1; $d < 6; $d++) {
                            ?>
                                <td <?php
                                    $html = "id='td_{$d}_{$i}' class='";
                                    if (array_key_exists($d, $data) && array_key_exists($i, $data[$d])) {
                                        $html .= 'available';
                                    } else {
                                        $html .= 'unavailable';
                                    }
                                    $html .= " availability-cell' ondblclick='changeColor(this);' tabindex='0' aria-label='Óra {$i}, nap {$d}'";
                                    echo $html;
                                 ?>></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="fs-6 text-light mt-2">A napra duplát kattintva az egész nap rendelkezésre állása módosítható</div>
    </div>
    <?php
    echo '<div class="btn-group d-flex flex-wrap w-100" role="group">';
    echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button flex-fill', 'onclick' => "window.location.href='" . site_url('admin/teachers/show') . "'"));
    echo button('btnSubmit', 'Mentés', 'button', array('class' => 'btn btn-primary frm-button flex-fill', 'onclick' => "saveAvailability()"));
    echo '</div>';
    echo end_form();
    ?>
    </div>
</div>
<style>
.availability-table .availability-cell {
    transition: background 0.35s cubic-bezier(.77,0,.18,1), box-shadow 0.25s, border 0.25s;
    cursor: pointer;
    position: relative;
}
.availability-table .available {
    background: linear-gradient(120deg, #3d246c 0%, var(--success) 100%) !important;
    box-shadow: 0 2px 12px 0 rgba(79, 209, 197, 0.13);
    border: 2px solid var(--success);
    animation: cellPopIn 0.4s cubic-bezier(.77,0,.18,1);
}
.availability-table .unavailable {
    background: linear-gradient(120deg, #231942 0%, #2d224c 100%) !important;
    box-shadow: 0 1px 6px 0 rgba(162, 89, 236, 0.08);
    border: 2px solid #3d246c;
    animation: cellPopOut 0.4s cubic-bezier(.77,0,.18,1);
}
@keyframes cellPopIn {
    0% { transform: scale(0.92); filter: brightness(1.2); }
    60% { transform: scale(1.08); filter: brightness(1.08);}
    100% { transform: scale(1); filter: brightness(1);}
}
@keyframes cellPopOut {
    0% { transform: scale(1.08); filter: brightness(1.08);}
    60% { transform: scale(0.92); filter: brightness(1.2);}
    100% { transform: scale(1); filter: brightness(1);}
}
</style>
<script>
function changeColor(cell) {
    if (cell.classList.contains('available')) {
        cell.classList.remove('available');
        cell.classList.add('unavailable');
    } else {
        cell.classList.remove('unavailable');
        cell.classList.add('available');
    }
}
// Optional: allow keyboard toggle with Enter/Space
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.availability-cell').forEach(function(cell) {
        cell.addEventListener('keydown', function(e) {
            if (e.key === ' ' || e.key === 'Enter') {
                e.preventDefault();
                changeColor(cell);
            }
        });
    });
});
</script>
<?= $this->endSection() ?>