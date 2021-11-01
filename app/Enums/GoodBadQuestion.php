<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class GoodBadQuestion extends Enum
{
    const Very_good = "MUY BUENA";
    const Good = "BUENA";
    const Regular = "REGULAR";
    const Bad = "MALA";
}
