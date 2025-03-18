<?php

namespace App\Controllers\Admin;

use Exception;
use App\Controllers\BaseController;

class SetupController extends BaseController
{

    public function setup() {
        $migration = service('migrations');
        try {
            $migration->latest();
            echo "Adatbázis módosítás sikerült";
        } catch (Exception $e) {
            echo "Hiba történt az adatbázis módosítása közben: " . $e->getMessage();
        }
    }
}
