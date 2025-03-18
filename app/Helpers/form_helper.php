<?php

$validationErrors;

function setError($error)
{
    global $validationErrors;
    $validationErrors = $error;
}

function getOpenDiv(): String
{
    return "<div class='col-12'>";
}

function getOpenDivLabel(): String
{
    return "<div class='col-12 mt-2'>";
}

function start_form($action, $formId = 'formId'): string
{
    $html = form_open($action, array('id' => $formId));
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
    $html = getOpenDivLabel() . form_label($label, $name, array('class' => 'frm-label')) . "</div>";
    $html .= getOpenDiv() . form_input($name, $value, array('class' => 'frm-field')) . "</div>";
    $html .= show_error($name);
    return $html;
}

function select_field($name, $label, $options, $selected, $args = [])
{
    $code = [];
    $extra = array('class' => 'frm-select');
    if (is_array($args)) {
        if (array_key_exists('add_empty', $args) && $args['add_empty']) {
            $code = array('' => '');
        }
        if (array_key_exists('onclick', $args)) {
            $extra['onclick'] = $args['onclick'];
        }
    }
    foreach ($options as $option) {
        $code[$option['key']] = $option['value'];
    }
    $html = getOpenDivLabel() . form_label($label, $name, array('class' => 'frm-label')) . "</div>";
    $html .= getOpenDiv() . form_dropdown($name, $code, $selected, $extra) . "</div>";
    $html .= show_error($name);
    return $html;
}

function multiselect_field($name, $label, $options, $selected = [], $args = [])
{
    if (is_array($args)) {
        if (array_key_exists('add_empty', $args) && !$args['add_empty']) {
            $code = [];
        } else {
            $code = array('' => '');
        }
    }
    foreach ($options as $option) {
        $code[$option['key']] = $option['value'];
    }
    $html = getOpenDivLabel() . form_label($label, $name, array('class' => 'frm-label')) . "</div>";
    $html .= getOpenDiv() . form_multiselect($name, $code, $selected, array('class' => 'frm-select')) . "</div>";
    $html .= show_error($name);
    return $html;
}

function checkbox_field($name, $label, $checked = false)
{
    $html = getOpenDiv() . form_checkbox($name, '1', $checked, array('class' => 'frm-checkbox'));
    $html .= form_label($label, $name, array('class' => 'frm-label')) . "</div>";
    $html .= show_error($name);
    return $html;
}

function checkbox_fields($cbList)
{
    $html = "";
    foreach ($cbList as $cb) {
        $html .= checkbox_field('cb_'.$cb['id'], $cb['title'], array_key_exists('checked', $cb) ? $cb['checked'] : false);
    }
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
    $data = array(
        'type' => $type == 'submit' ? 'submit' : 'button',
        'name' => $name
    );

    $html = form_button($data, $label, $attributes);
    return $html;
}

function show_error(string $field): string
{
    global $validationErrors;
    $html = '';
    $errors = [];
    if ($validationErrors != null)
        $errors = array_filter($validationErrors, static fn($key): bool => preg_match(
            '/^' . str_replace(['\.\*', '\*\.'], ['\..+', '.+\.'], preg_quote($field, '/')) . '$/',
            $key,
        ) === 1, ARRAY_FILTER_USE_KEY);

    if ($errors === []) {
        return '';
    }

    foreach ($errors as $error) {
        $html .=  getOpenDiv() . "<div class='frm-error'>{$error}</div></div>";
    }

    return $html;
}

function timetableHeader($ondblclick = ""): string{
    return "<thead>
            <tr>
                <th class=\"tt-head tt-head-lesson\">Óra</th>
                <th id=\"th_1\" class=\"tt-head tt-head-day\"". (strlen($ondblclick) == 0 ? "" : " ondblclick='{$ondblclick}'") . ">Hétfő</th>
                <th id=\"th_2\" class=\"tt-head tt-head-day\"". (strlen($ondblclick) == 0 ? "" : " ondblclick='{$ondblclick}'") . ">Kedd</th>
                <th id=\"th_3\" class=\"tt-head tt-head-day\"". (strlen($ondblclick) == 0 ? "" : " ondblclick='{$ondblclick}'") . ">Szerda</th>
                <th id=\"th_4\" class=\"tt-head tt-head-day\"". (strlen($ondblclick) == 0 ? "" : " ondblclick='{$ondblclick}'") . ">Csütörtök</th>
                <th id=\"th_5\" class=\"tt-head tt-head-day\"". (strlen($ondblclick) == 0 ? "" : " ondblclick='{$ondblclick}'") . ">Péntek</th>
            </tr>
        </thead>";
}
