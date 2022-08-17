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

if (! function_exists('private_str')) {
    /**
     * Format number
     *
     * @param $value
     * @param $attribute
     * @param $data
     * @return boolean
     */

    function private_str($str, $start, $end){
        $after = mb_substr($str, 0, $start, 'utf8');
        $repeat = str_repeat('*', $end);
        $before = mb_substr($str, ($start + $end), strlen($str), 'utf8');
        return $after.$repeat.$before;
    }


}

