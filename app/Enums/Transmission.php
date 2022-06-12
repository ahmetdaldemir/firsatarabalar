<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Transmission extends Enum
{
    const Transmission = [
        1  => 'Düz',
        2  =>  'Otomatik',
        3  =>  'Yarı Otomatik',
     ];

}
