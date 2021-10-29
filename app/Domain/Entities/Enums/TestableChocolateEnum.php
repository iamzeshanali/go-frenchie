<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class TestableChocolateEnum extends Enum
{
    const CARRIES_2COPIES = '2copies(b/b)';
    const CARRIES_1COPY = '1copy(B/b)';
    const DOES_NOT_CARRY = 'doesnotcarry';
    const UNKNOWN = 'unknown';

    /**
     * @return array
     */
    public static function getNamedMap()
    {
        return [
            TestableChocolateEnum::CARRIES_2COPIES=> '2copies(b/b)',
            TestableChocolateEnum::CARRIES_1COPY=> '1copy(B/b)',
            TestableChocolateEnum::DOES_NOT_CARRY=> 'doesnotcarry',
            TestableChocolateEnum::UNKNOWN=> 'unknown',

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
     * @return TestableChocolateEnum
     * @throws InvalidEnumValueException
     */
    public static function copies2 () : self{
        return new self(self::CARRIES_2COPIES);
    }

    /**
     * @return TestableChocolateEnum
     * @throws InvalidEnumValueException
     */
    public static function copy1 () : self{
        return new self(self::CARRIES_1COPY);
    }

    /**
     * @return TestableChocolateEnum
     * @throws InvalidEnumValueException
     */
    public static function doesNotCarry () : self{
        return new self(self::DOES_NOT_CARRY);
    }

    /**
     * @return TestableChocolateEnum
     * @throws InvalidEnumValueException
     */
    public static function unKnown () : self{
        return new self(self::UNKNOWN);
    }
}
