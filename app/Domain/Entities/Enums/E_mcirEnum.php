<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class E_mcirEnum extends Enum
{
    const EM_EM = '(EM,EM)';
    const EM_E = '(EM,E)';
    const EM_e = '(EM,e)';
    const E_E = '(E,E)';
    const E_e = '(E,e)';
    const e_e = '(e,e)';

    /**
     * @return array
     */
    public static function getNamedMap()
    {
        return [
            E_mcirEnum::EM_EM=> '(EM,EM)',
            E_mcirEnum::EM_E=> '(EM,E)',
            E_mcirEnum::EM_e=> '(EM,e)',
            E_mcirEnum::E_E=> '(E,E)',
            E_mcirEnum::E_e=> '(E,e)',
            E_mcirEnum::e_e=> '(e,e)',

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
     * @return E_mcirEnum
     * @throws InvalidEnumValueException
     */
    public static function EM_EM () : self{
        return new self(self::EM_EM);
    }

    /**
     * @return E_mcirEnum
     * @throws InvalidEnumValueException
     */
    public static function EME () : self{
        return new self(self::EM_E);
    }

    /**
     * @return E_mcirEnum
     * @throws InvalidEnumValueException
     */
    public static function EM_e () : self{
        return new self(self::EM_e);
    }

    /**
     * @return E_mcirEnum
     * @throws InvalidEnumValueException
     */
    public static function E_E () : self{
        return new self(self::E_E);
    }

    /**
     * @return E_mcirEnum
     * @throws InvalidEnumValueException
     */
    public static function Ee () : self{
        return new self(self::E_e);
    }

    /**
     * @return E_mcirEnum
     * @throws InvalidEnumValueException
     */
    public static function e__e () : self{
        return new self(self::e_e);
    }
}
