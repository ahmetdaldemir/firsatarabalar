<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum
{

    const Status = [
        0 => "İşlem Yarıda Kaldı",
        1 => "Beklemede",
        2 => "Atama Yap",
        3 => "Değerlendirmede",
        4 => "Onaylandı",
        5 => "Satışta",
        6 => "Tamamlandı",
        7 => "İptal Edildi",
     ];

}
