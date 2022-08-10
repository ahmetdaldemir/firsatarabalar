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

if (! function_exists('page')) {
    /**
     * Format number
     *
     * @param $value
     * @param $attribute
     * @param $data
     * @return boolean
     */
    function page($value)
    {
        $page =  \App\Models\Page::where('categories',$value)->get();
        return $page;
    }

}