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

if (! function_exists('cacheresponseid')) {
    /**
     * Format number
     *
     * @param $value
     * @param $attribute
     * @param $data
     * @return boolean
     */
    function cacheresponseid()
    {
        return "Session_" . session()->getId();
    }

}

if (! function_exists('word_abbreviation')) {
    /**
     * Format number
     *
     * @param $value
     * @param $attribute
     * @param $data
     * @return boolean
     */
    function word_abbreviation($item,$chars)
    {
        $temiz = strlen($item);
        if($temiz > $chars){
            return mb_substr($item,0,$chars,'UTF-8').'...';
        }else{
            return $item;
        }
    }

}

