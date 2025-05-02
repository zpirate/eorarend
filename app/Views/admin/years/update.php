<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<h1 class="text-center">Évfolyamok karbantartása</h1>
<div class="container-fluid px-0">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="m-4">
                <?php
                helper('form');
                if (isset($errors))
                    setError($errors);

                echo start_form('admin/years/show');
                echo form_hidden('id', $data['id']);
                // Add card style to the name input
                echo '<div class="card shadow-sm border-0 mb-4" style="background: linear-gradient(90deg, var(--primary-purple) 0%, var(--success) 100%);">';
                echo '<div class="card-body">';
                echo input_field('name', 'Évfolyam neve', $data['name']);
                echo '</div></div>';

                echo start_button_group();
                echo button('cancel', 'Mégsem', 'cancel', array('class' => 'btn btn-primary frm-button', 'onclick' => "window.location.href='" . site_url('admin/years/show') . "'"));
                echo button('submit', 'Mentés', 'submit', array('class' => 'btn btn-primary frm-button'));
                echo end_button_group();
                echo end_form();
                ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>