<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CustomerCarStatus extends Enum
{
    const Status = [
        '1' => ['color' => '6f6f6f', 'sort' => 'aborted',     'text' => 'İşlem Yarıda Kaldı'],
        '2' => ['color' => 'f1c21b', 'sort' => 'waiting',     'text' => 'Beklemede'],
        '3' => ['color' => '4589ff', 'sort' => 'assignment',  'text' => 'Atama Yap'],
        '4' => ['color' => '78a9ff', 'sort' => 'evaluation',  'text' => 'Değerlendirmede'],
        '5' => ['color' => '002d9c', 'sort' => 'sale',        'text' => 'Satışta'],
        '6' => ['color' => '42be65', 'sort' => 'complate',    'text' => 'Tamamlandı'],
        '7' => ['color' => 'fa4d56', 'sort' => 'closed',      'text' => 'İptal Edildi'],
    ];



}
