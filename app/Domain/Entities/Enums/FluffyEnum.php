<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class FluffyEnum extends Enum
{
    const CARRIES_2COPIES = '2copies(l/l)';
    const CARRIES_1COPY = '1copy(L/l)';
    const DOES_NOT_CARRY = 'doesnotcarry';
    const UNKNOWN = 'unknown';

    /**
     * @return array
     */
    public static function getNamedMap()
    {
        return [
            FluffyEnum::CARRIES_2COPIES=> '2copies(l/l)',
            FluffyEnum::CARRIES_1COPY=> '1copy(L/l)',
            FluffyEnum::DOES_NOT_CARRY=> 'doesnotcarry',
            FluffyEnum::UNKNOWN=> 'unknown',

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
     * @return FluffyEnum
     * @throws InvalidEnumValueException
     */
    public static function copies2 () : self{
        return new self(self::CARRIES_2COPIES);
    }

    /**
     * @return FluffyEnum
     * @throws InvalidEnumValueException
     */
    public static function copy1 () : self{
        return new self(self::CARRIES_1COPY);
    }

    /**
     * @return FluffyEnum
     * @throws InvalidEnumValueException
     */
    public static function doesNotCarry () : self{
        return new self(self::DOES_NOT_CARRY);
    }

    /**
     * @return FluffyEnum
     * @throws InvalidEnumValueException
     */
    public static function unKnown () : self{
        return new self(self::UNKNOWN);
    }
}
