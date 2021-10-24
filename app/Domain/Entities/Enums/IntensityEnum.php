<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class IntensityEnum extends Enum
{
    const CARRIES_2COPIES = '2copies(i/i)';
    const CARRIES_1COPY = '1copy(I/i)';
    const DOES_NOT_CARRY = 'doesnotcarry';
    const UNKNOWN = 'unknown';

    /**
     * @return array
     */
    public static function getNamedMap()
    {
        return [
            IntensityEnum::CARRIES_2COPIES=> '2copies(i/i)',
            IntensityEnum::CARRIES_1COPY=> '1copy(I/i)',
            IntensityEnum::DOES_NOT_CARRY=> 'doesnotcarry',
            IntensityEnum::UNKNOWN=> 'unknown',

        ];
    }

    /**
     * Defines the type of the options contained within the enum.
     *
     * @param PropertyTypeDefiner $values
     *
     * @return void
     */
    protected function defineEnumValues(PropertyTypeDefiner $values)
    {
        $values->asString();
    }

    /**
     * @return IntensityEnum
     * @throws InvalidEnumValueException
     */
    public static function copies2 () : self{
        return new self(self::CARRIES_2COPIES);
    }

    /**
     * @return IntensityEnum
     * @throws InvalidEnumValueException
     */
    public static function copy1 () : self{
        return new self(self::CARRIES_1COPY);
    }

    /**
     * @return IntensityEnum
     * @throws InvalidEnumValueException
     */
    public static function doesNotCarry () : self{
        return new self(self::DOES_NOT_CARRY);
    }

    /**
     * @return IntensityEnum
     * @throws InvalidEnumValueException
     */
    public static function unKnown () : self{
        return new self(self::UNKNOWN);
    }
}
