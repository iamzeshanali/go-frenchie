<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class BrindleEnum extends Enum
{
    const YES = 'yes';
    const NO = 'no';
    const UNKNOWN = 'unknown';

    /**
     * @return array
     */
    public static function getNamedMap()
    {
        return [
            BrindleEnum::YES=> 'yes',
            BrindleEnum::NO=> 'no',
            BrindleEnum::UNKNOWN=> 'unknown',
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
     * @return BrindleEnum
     * @throws InvalidEnumValueException
     */
    public static function yes () : self{
        return new self(self::YES);
    }

    /**
     * @return BrindleEnum
     * @throws InvalidEnumValueException
     */
    public static function no () : self{
        return new self(self::NO);
    }

    /**
     * @return BrindleEnum
     * @throws InvalidEnumValueException
     */
    public static function unKnown () : self{
        return new self(self::UNKNOWN);
    }
}
