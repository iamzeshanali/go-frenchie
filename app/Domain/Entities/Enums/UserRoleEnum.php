<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class UserRoleEnum extends Enum
{
    const BREEDER = 'breeder';
    const CUSTOMER = 'customer';
    public static function getNamedMap()
    {
        return [
            UserRoleEnum::BREEDER=> 'breeder',
            UserRoleEnum::CUSTOMER=> 'customer',

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
     * @return UserRoleEnum
     * @throws InvalidEnumValueException
     */
    public static function BREEDER () : self{
        return new self(self::BREEDER);
    }

    /**
     * @return UserRoleEnum
     * @throws InvalidEnumValueException
     */
    public static function CUSTOMER () : self{
        return new self(self::CUSTOMER);
    }


}
