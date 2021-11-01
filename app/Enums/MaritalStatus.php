<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MaritalStatus extends Enum
{
    const Single = "SOLTERO";
    const Married = "CASADO";
    const Divorced = "DIVORCIADO";
    const Widower = "VIUDO";
    const Concubinage = "CONCUBINATO";
}
