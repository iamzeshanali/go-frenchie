<?php


namespace App\Domain\Entities\Enums;


use Dms\Core\Model\Object\Enum;
use Dms\Core\Model\Object\InvalidEnumValueException;
use Dms\Core\Model\Object\PropertyTypeDefiner;

class AgoutiEnum extends Enum
{
    const A_A = '(a,a)';
    const AY_A = '(ay,a)';
    const AY_AT = '(ay,at)';
    const AY_AY = '(ay,ay)';
    const AT_A = '(at,a)';
    const AT_AT = '(at,at)';

    /**
     * @return array
     */
    public static function getNamedMap()
    {
        return [
            AgoutiEnum::A_A=> '(a,a)',
            AgoutiEnum::AY_A=> '(ay,a)',
            AgoutiEnum::AY_AT=> '(ay,at)',
            AgoutiEnum::AY_AY=> '(ay,ay)',
            AgoutiEnum::AT_A=> '(at,a)',
            AgoutiEnum::AT_AT=> '(at,at)',

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
     * @return AgoutiEnum
     * @throws InvalidEnumValueException
     */
    public static function A_A () : self{
        return new self(self::A_A);
    }

    /**
     * @return AgoutiEnum
     * @throws InvalidEnumValueException
     */
    public static function AY_A () : self{
        return new self(self::AY_A);
    }

    /**
     * @return AgoutiEnum
     * @throws InvalidEnumValueException
     */
    public static function AY_AT () : self{
        return new self(self::AY_AT);
    }

    /**
     * @return AgoutiEnum
     * @throws InvalidEnumValueException
     */
    public static function AY_AY () : self{
        return new self(self::AY_AY);
    }

    /**
     * @return AgoutiEnum
     * @throws InvalidEnumValueException
     */
    public static function AT_A () : self{
        return new self(self::AT_A);
    }

    /**
     * @return AgoutiEnum
     * @throws InvalidEnumValueException
     */
    public static function AT_AT () : self{
        return new self(self::AT_AT);
    }
}
