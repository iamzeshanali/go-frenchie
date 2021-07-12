<?php


namespace App\Domain\Entities;


use App\Domain\Entities\Enums\AgoutiEnum;
use App\Domain\Entities\Enums\BlueEnum;
use App\Domain\Entities\Enums\BrindleEnum;
use App\Domain\Entities\Enums\ChocolateEnum;
use App\Domain\Entities\Enums\E_mcirEnum;
use App\Domain\Entities\Enums\FluffyEnum;
use App\Domain\Entities\Enums\IntensityEnum;
use App\Domain\Entities\Enums\MerleEnum;
use App\Domain\Entities\Enums\PiedEnum;
use App\Domain\Entities\Enums\TestableChocolateEnum;
use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;

class SavedSearch extends Entity
{
    const USER = 'user';
    const DNA_COLOR = 'dnaColor';
    const DNA_COAT = 'dnaCoat';
    const ZIP = 'zip';
    const TYPE = 'type';

    /**
     * @var Users
     */
    public $user;
    /**
     * @var DNA Color
     */
    public $dnaColor;

    /**
     * @var DNA Coat
     */
    public $dnaCoat;

    /**
     * @var Zip
     */
    public $zip;

    /**
     * @var Zip
     */
    public $type;

    /**
     * Defines the structure of this entity.
     *
     * @param ClassDefinition $class
     * @throws InvalidPropertyDefinitionException
     */
    protected function defineEntity(ClassDefinition $class)
    {
        $class->property($this->user)->asObject(Users::class);

        $class->property($this->dnaColor)->nullable()->asString();

        $class->property($this->dnaCoat)->nullable()->asString();

        $class->property($this->zip)->nullable()->asString();

        $class->property($this->type)->nullable()->asString();
    }
}
