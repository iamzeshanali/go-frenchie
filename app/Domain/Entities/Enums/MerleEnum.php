<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class MerleEnum extends Enum
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
            MerleEnum::YES=> 'yes',
            MerleEnum::NO=> 'no',
            MerleEnum::UNKNOWN=> 'unknown',
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
     * @return MerleEnum
     * @throws InvalidEnumValueException
     */
    public static function yes () : self{
        return new self(self::YES);
    }

    /**
     * @return MerleEnum
     * @throws InvalidEnumValueException
     */
    public static function no () : self{
        return new self(self::NO);
    }

    /**
     * @return MerleEnum
     * @throws InvalidEnumValueException
     */
    public static function unKnown () : self{
        return new self(self::UNKNOWN);
    }
}
