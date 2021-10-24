<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class ListingsTypeEnum extends Enum
{
    const STUD = 'stud';
    const PUPPY = 'puppy';
    public static function getNamedMap()
    {
        return [
            ListingsTypeEnum::STUD=> 'stud',
            ListingsTypeEnum::PUPPY=> 'puppy',

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
     * @return ListingsTypeEnum
     * @throws InvalidEnumValueException
     */
    public static function STUD () : self{
        return new self(self::STUD);
    }

    /**
     * @return ListingsTypeEnum
     * @throws InvalidEnumValueException
     */
    public static function PUPPY () : self{
        return new self(self::PUPPY);
    }
}
