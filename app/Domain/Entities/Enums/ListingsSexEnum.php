<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class ListingsSexEnum extends Enum
{
    const MALE = 'male';
    const FEMALE = 'female';

    /**
     * @return array
     */
    public static function getNamedMap()
    {
        return [
            ListingsSexEnum::MALE=> 'male',
            ListingsSexEnum::FEMALE=> 'female',

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
     * @return ListingsSexEnum
     * @throws InvalidEnumValueException
     */
    public static function male () : self{
        return new self(self::MALE);
    }

    /**
     * @return ListingsSexEnum
     * @throws InvalidEnumValueException
     */
    public static function female () : self{
        return new self(self::FEMALE);
    }
}
