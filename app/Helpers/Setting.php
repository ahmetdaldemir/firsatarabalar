<?php
if (! function_exists('setting')) {
    /**
     * Format number
     *
     * @param $value
     * @param $attribute
     * @param $data
     * @return boolean
     */
    function setting($value)
    {

      $setting =  \App\Models\Setting::where('key',$value)->first();
      return $setting->value;

    }

}