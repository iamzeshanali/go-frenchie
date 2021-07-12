<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class ChocolateEnum extends Enum
{
    const CARRIES_2COPIES = '2copies(co/co)';
    const CARRIES_1COPY = '1copy(Co/co)';
    const DOES_NOT_CARRY = 'doesnotcarry';
    const UNKNOWN = 'unknown';

    /**
     * @return array
     */
    public static function getNamedMap()
    {
        return [
            ChocolateEnum::CARRIES_2COPIES=> '2copies(co/co)',
            ChocolateEnum::CARRIES_1COPY=> '1copy(Co/co)',
            ChocolateEnum::DOES_NOT_CARRY=> 'doesnotcarry',
            ChocolateEnum::UNKNOWN=> 'unknown',

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
     * @return ChocolateEnum
     * @throws InvalidEnumValueException
     */
    public static function copies2 () : self{
        return new self(self::CARRIES_2COPIES);
    }

    /**
     * @return ChocolateEnum
     * @throws InvalidEnumValueException
     */
    public static function copy1 () : self{
        return new self(self::CARRIES_1COPY);
    }

    /**
     * @return ChocolateEnum
     * @throws InvalidEnumValueException
     */
    public static function doesNotCarry () : self{
        return new self(self::DOES_NOT_CARRY);
    }

    /**
     * @return ChocolateEnum
     * @throws InvalidEnumValueException
     */
    public static function unKnown () : self{
        return new self(self::UNKNOWN);
    }
}
