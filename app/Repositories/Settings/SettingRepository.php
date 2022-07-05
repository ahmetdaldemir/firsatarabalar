<?php

namespace App\Repositories\Settings;

use App\Models\Setting;

class SettingRepository implements SettingRepositoryInterface
{

    public function index()
    {
       return Setting::all();
    }
}