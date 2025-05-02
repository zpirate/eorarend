<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center">Tanulók karbantartása</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="m-4">
                <?php
                helper('form');
                if (isset($errors))
                    setError($errors);

                echo start_form('admin/students/show');
                echo form_hidden('id', $data['id']);
                // Responsive card
                echo '<div class="card shadow-sm border-0 mb-4" style="background: linear-gradient(90deg, var(--card-bg) 0%, #3d246c 100%); max-width:600px;margin:auto;">';
                echo '<div class="card-body">';
                echo input_field('name', 'Tanuló neve', $data['name']);
                echo select_field('class_id', 'Osztály', $classes, $data['class_id'], array('add_empty' => true));
                echo input_field('educational_id', 'Oktatási azonosító', $data['educational_id']);
                echo '</div></div>';

                echo start_button_group();
                echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/students/show') . "'"));
                echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
                echo end_button_group();
                echo end_form();
                ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>