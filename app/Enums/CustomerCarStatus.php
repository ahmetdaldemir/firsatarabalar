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
        '0' => ['color' => '6f6f6f', 'sort' => 'aborted', 'text' => 'İşlem Yarıda Kaldı'],
        '1' => ['color' => '6f6f6f', 'sort' => 'waiting', 'text' => 'Beklemede'],
        '2' => ['color' => 'f1c21b', 'sort' => 'assignment', 'text' => 'Atama Yap'],
        '3' => ['color' => '4589ff', 'sort' => 'evaluation', 'text' => 'Değerlemede'],
        '4' => ['color' => '78a9ff', 'sort' => 'confirm', 'text' => 'Onaylandı'],
        '5' => ['color' => '002d9c', 'sort' => 'sale', 'text' => 'Satışta'],
        '6' => ['color' => '42be65', 'sort' => 'complate', 'text' => 'Tamamlandı'],
        '7' => ['color' => 'fa4d56', 'sort' => 'closed', 'text' => 'İptal Edildi'],
        '8' => ['color' => 'fa4d56', 'sort' => 'closed', 'text' => 'Değerleme Kabul Edilmedi'],
    ];


    const STATUS_STRING = [
        'TRANSACTION ABORTED' => 0,
        'WAITING' => 1,
        'ASSINGTO' => 2,
        'VALUATION' => 3,
        'CONFIRM' => 4,
        'SELL' => 5,
        'COMPLATED' => 6,
        'CLOSED' => 7,
        'VALUATION NOT ACCEPTED' => 8,
    ];
}
