<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Male()
 * @method static static FEMALE()
 */
final class Sex extends Enum
{
    public const MALE = 'Male';
    public const FEMALE = 'Female';

    public static function toSelect()
    {
        return [
            self::MALE   => __(self::MALE),
            self::FEMALE => __(self::FEMALE),
        ];
    }
}
