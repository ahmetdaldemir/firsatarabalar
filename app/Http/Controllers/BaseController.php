<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Hamcrest\Core\Set;

class BaseController
{

    public function setting()
    {
        return Setting::all();
    }

}