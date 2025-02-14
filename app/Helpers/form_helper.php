<?php

$openDiv;
$openDivLabel;
$validationErrors;

use Config\Validation;
use CodeIgniter\Validation\Exceptions\ValidationException;


function setError($error)
{
    global $validationErrors;
    $validationErrors = $error;
}

/**
 * Itt kell inicializalni a globalis valtozokat
 */
function start_form($action)
{
    global $openDiv, $openDivLabel;
    $openDiv = "<div class='col-12'>";
    $openDivLabel = "<div class='col-12 mt-2'>";

    $html = form_open($action);
    $html .= "<div class='container'><div class='row'>";
    return $html;
}

function end_form()
{
    $html = "</div></div>";
    $html .= form_close();
    return $html;
}

function input_field($name, $label, $value)
{
    global $openDiv, $openDivLabel;
    $html = $openDivLabel . form_label($label, $name, array('class' => 'frm-label')) . "</div>";
    $html .= $openDiv . form_input($name, $value, array('class' => 'frm-field')). "</div>";
    $html .= show_error($name);
    return $html;
}

function select_field($name, $label, $options, $selected)
{
    global $openDiv, $openDivLabel;
    $html = $openDivLabel . form_label($label, $name, array('class' => 'frm-label')) . "</div>";
    $html .= $openDiv . form_dropdown($name, $options, $selected, array('class' => 'frm-select')). "</div>";
    $html .= show_error($name);
    return $html;
}

function start_button_group()
{
    $html = "<div class='col-12 mt-2 d-flex justify-content-end'>";
    return $html;
}

function end_button_group()
{
    $html = "</div>";
    return $html;
}

/**
 * @type: submit, cancel, button
 */
function button($name, $label, $type, $attributes)
{    
    $data = array('type' => $type == 'submit' ? 'submit' : 'button',
            'name' => $name);

    $html = form_button($data, $label, $attributes);
    return $html;
}

function show_error(string $field): string
{
    global $validationErrors, $openDiv;
    $html = '';
    $errors = [];
    if ($validationErrors != null)
        $errors = array_filter($validationErrors, static fn ($key): bool => preg_match(
            '/^' . str_replace(['\.\*', '\*\.'], ['\..+', '.+\.'], preg_quote($field, '/')) . '$/',
            $key,
        ) === 1, ARRAY_FILTER_USE_KEY);

    if ($errors === []) {
        return '';
    }

    foreach ($errors as $error) {
        $html .=  $openDiv . "<div class='frm-error'>{$error}</div></div>";
    }

    return $html;
}

