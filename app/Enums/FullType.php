<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class FullType extends Enum
{
    const FullType = [
        1  =>  'Benzinli',
        2  =>  'Dizel',
        3  =>  'Benzin + LPG',
        8  =>  'Hibrit',
    ];

}
