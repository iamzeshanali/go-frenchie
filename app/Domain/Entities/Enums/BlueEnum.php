<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class BlueEnum extends Enum
{
    const CARRIES_2COPIES = '2copies(d/d)';
    const CARRIES_1COPY = '1copy(D/d)';
    const DOES_NOT_CARRY = 'doesnotcarry';
    const UNKNOWN = 'unknown';

    /**
     * @return array
     */
    public static function getNamedMap()
    {
        return [
            BlueEnum::CARRIES_2COPIES=> '2copies(d/d)',
            BlueEnum::CARRIES_1COPY=> '1copy(D/d)',
            BlueEnum::DOES_NOT_CARRY=> 'doesnotcarry',
            BlueEnum::UNKNOWN=> 'unknown',

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
     * @return BlueEnum
     * @throws InvalidEnumValueException
     */
    public static function copies2 () : self{
        return new self(self::CARRIES_2COPIES);
    }

    /**
     * @return BlueEnum
     * @throws InvalidEnumValueException
     */
    public static function copy1 () : self{
        return new self(self::CARRIES_1COPY);
    }

    /**
     * @return BlueEnum
     * @throws InvalidEnumValueException
     */
    public static function doesNotCarry () : self{
        return new self(self::DOES_NOT_CARRY);
    }

    /**
     * @return BlueEnum
     * @throws InvalidEnumValueException
     */
    public static function unKnown () : self{
        return new self(self::UNKNOWN);
    }
}
