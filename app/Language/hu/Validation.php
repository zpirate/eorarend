<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For A full copyright and license information, please view
 * A LICENSE file that was distributed with this source code.
 */

// Validation language settings
return [
    // Core Messages
    'noRuleSets'      => 'No rule sets specified in Validation configuration.',
    'ruleNotFound'    => '"{0}" is not a valid rule.',
    'groupNotFound'   => '"{0}" is not a validation rules group.',
    'groupNotArray'   => '"{0}" rule group must be an array.',
    'invalidTemplate' => '"{0}" is not a valid Validation template.',

    // Rule Messages
    'alpha'                 => 'A {field} mező csak betűket tartalmazhat.',
    'alpha_dash'            => 'A {field} mező csak betű, aláhúzás és perjel karaktereket tartalmazhat.',
    'alpha_numeric'         => 'A {field} mező csak betű és szám karaktereket tartalmazhat.',
    'alpha_numeric_punct'   => 'A {field} mező csak betű, szám, szóköz és ~ ! # $ % & * - _ + = | : . karaktereket tartalmazhat.',
    'alpha_numeric_space'   => 'A {field} mező csak betű, szám, szóköz karaktereket tartalmazhat.',
    'alpha_space'           => 'A {field} mező csak betű és szóköz karaktereket tartalmazhat.',
    'decimal'               => 'A {field} mező csak számokat tartalmazhat.',
    'differs'               => 'A {field} mezőnek különböznie kell a {param} mezőtől.',
    'equals'                => 'A {field} mező értéke meg kell egyezzen a következővel: {param}.',
    'exact_length'          => 'A {field} mező hossza pontosan {param} karakter kell legyen.',
    'field_exists'          => 'A {field} mezőnek létezőnek kell lennie.',
    'greater_than'          => 'A {field} mező értéke nagyobb kell, hogy legyen, mint {param}.',
    'greater_than_equal_to' => 'A {field} mező értéke nagyobb vagy egyenlő kell, hogy legyen, mint {param}.',
    'hex'                   => 'A {field} mező csak hexadeximális értéket tartalmazhat.',
    'in_list'               => 'A {field} mező értéke a következő egyike kell legyen: {param}.',
    'integer'               => 'A {field} mező csak egész szám lehet.',
    'is_natural'            => 'A {field} mező csak számokat tartalmazhat.',
    'is_natural_no_zero'    => 'A {field} mező csak nullánál nagyobb számokat tartalmazhat.',
    'is_not_unique'         => 'A {field} mezőnek egy, az adatbázisban már szereplő értéket kell tartalmaznia.',
    'is_unique'             => 'A {field} mező egyedi kell legyen.',
    'less_than'             => 'A {field} mező értéke kisebb kell, hogy legyen, mint {param}.',
    'less_than_equal_to'    => 'A {field} mező értéke kisebb vagy egyenlő kell, hogy legyen, mint {param}.',
    'matches'               => 'A {field} mező értéke nem egyezhet meg a {param} mezővel.',
    'max_length'            => 'A {field} mező nem lehet hosszabb {param} karakternél.',
    'min_length'            => 'A {field} mező nem lehet rövidebb {param} karakternél.',
    'not_equals'            => 'A {field} mező nem lehet egyenlő a következővel: {param}.',
    'not_in_list'           => 'A {field} mező értéke nem lehet a következők egyike: {param}.',
    'numeric'               => 'A {field} mező csak számot tartalmazhat.',
    'regex_match'           => 'A {field} mező formátuma nem megfelelő.',
    'required'              => 'A {field} mezőt kötelező kitölteni.',
    'required_with'         => 'A {field} mezőt kötelező kitölteni, ha a {param} meg van adva.',
    'required_without'      => 'A {field} mezőt kötelező kitölteni, ha a {param} nincs megadva.',
    'string'                => 'A {field} mezőnek érvényes karakterláncnak kell lennie.',
    'timezone'              => 'A {field} mezőnek érvényes időzónának kell lennie.',
    'valid_base64'          => 'A {field} mezőnek érvényes base64 kódolású szövegnek kell lennie.',
    'valid_email'           => 'A {field} mezőnek érvényes email címet kell tartalmaznia.',
    'valid_emails'          => 'A {field} mezőnek érvényes email címeket kell tartalmaznia.',
    'valid_ip'              => 'A {field} mezőnek érvényes IP címet kell tartalmaznia.',
    'valid_url'             => 'A {field} mezőnek érvényes URL-t kell tartalmaznia.',
    'valid_url_strict'      => 'A {field} mezőnek érvényes URL-t kell tartalmaznia.',
    'valid_date'            => 'A {field} mezőnek érvényes dátumot kell tartalmaznia.',
    'valid_json'            => 'A {field} mezőnek érvényes json objektumot kell tartalmaznia.',

    // Credit Cards
    'valid_cc_num' => '{field} érvénytelen kártyaszámnak tűnik.',

    // Files
    'uploaded' => '{field} nem érvényes feltöltött fájl.',
    'max_size' => '{field} túl nagy fájl.',
    'is_image' => '{field} nem érvények képfájl.',
    'mime_in'  => '{field} fájlnak nem érvényes a mimi típusa.',
    'ext_in'   => '{field} fájlnak nem érvényes a kiterjesztése.',
    'max_dims' => '{field} is either not an image, or it is too wide or tall.',
    'min_dims' => '{field} is either not an image, or it is not wide or tall enough.',
];
