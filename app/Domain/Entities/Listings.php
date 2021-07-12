<?php

namespace App\Domain\Entities;

use App\Domain\Entities\Enums\AgoutiEnum;
use App\Domain\Entities\Enums\BlueEnum;
use App\Domain\Entities\Enums\BrindleEnum;
use App\Domain\Entities\Enums\ChocolateEnum;
use App\Domain\Entities\Enums\E_mcirEnum;
use App\Domain\Entities\Enums\FluffyEnum;
use App\Domain\Entities\Enums\IntensityEnum;
use App\Domain\Entities\Enums\ListingsSexEnum;
use App\Domain\Entities\Enums\ListingsStatusEnum;
use App\Domain\Entities\Enums\ListingsTypeEnum;
use App\Domain\Entities\Enums\MerleEnum;
use App\Domain\Entities\Enums\PiedEnum;
use App\Domain\Entities\Enums\TestableChocolateEnum;
use Dms\Common\Structure\DateTime\Date;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;
use Dms\Core\Persistence\Db\Schema\Type\Boolean;
class  Listings extends Entity {


    const BREEDER = 'breeder';
    const TITLE = 'title';
    const SLUG = 'slug';
    const DESCRIPTION = 'decription';
    const TYPE = 'type';
    const SEX = 'sex';
    const DOB = 'dob';
    const PHOTO1 = 'photo1';
    const PHOTO2 = 'photo2';
    const PHOTO3 = 'photo3';
    const PHOTO4 = 'photo4';
    const PHOTO5 = 'photo5';
    const IS_SPONSORED = 'isSponsored';
    const STATUS = 'status';
    const BLUE = 'blue';
    const CHOCOLATE = 'chocolate';
    const AGOUTI = 'agouti';
    const TESTABLE_CHOCOLATE = 'testableChocolate';
    const FLUFFY = 'fluffy';
    const E_MCIR = 'eMcir';
    const INTENSITY = 'intensity';
    const PIED = 'pied';
    const BRINDLE = 'brindle';
    const MERLE = 'merle';
    const TRASHED = 'trashed';

    /**
     * @var Users
     */
    public $breeder;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var string
     */
    public $decription;

    /**
     * @var ListingsTypeEnum
     */
    public $type;

    /**
     * @var ListingsSexEnum
     */
    public $sex;

    /**
     * @var Date
     */
    public $dob;

    /**
     * @var Image
     */
    public $photo1;

    /**
     * @var Image
     */
    public $photo2;

    /**
     * @var Image
     */
    public $photo3;

    /**
     * @var Image
     */
    public $photo4;

    /**
     * @var Image
     */
    public $photo5;

    /**
     * @var Boolean
     */
    public $isSponsored;

    /**
     * @var ListingsStatusEnum
     */
    public $status;

    /**
     * @var BlueEnum
     */
    public $blue;

    /**
     * @var ChocolateEnum
     */
    public $chocolate;

    /**
     * @var AgoutiEnum
     */
    public $agouti;

    /**
     * @var TestableChocolateEnum
     */
    public $testableChocolate;

    /**
     * @var FluffyEnum
     */
    public $fluffy;

     /**
     * @var E_mcirEnum
     */
    public $eMcir;

    /**
     * @var IntensityEnum
     */
    public $intensity;

    /**
     * @var PiedEnum
     */
    public $pied;

    /**
     * @var BrindleEnum
     */
    public $brindle;

    /**
     * @var MerleEnum
     */
    public $merle;

    /**
     * @var Boolean
     */
    public $trashed;
    /**
     * Defines the structure of this entity.
     *
     * @param ClassDefinition $class
     * @throws InvalidPropertyDefinitionException
     */
    protected function defineEntity(ClassDefinition $class)
    {
        $class->property($this->breeder)->asObject(Users::class);

        $class->property($this->title)->asString();

        $class->property($this->slug)->asString();

        $class->property($this->decription)->asString();

        $class->property($this->type)->asObject(ListingsTypeEnum::class);

        $class->property($this->sex)->asObject(ListingsSexEnum::class);

        $class->property($this->dob)->asObject(Date::class);

        $class->property($this->photo1)->asObject(Image::class);

        $class->property($this->photo2)->asObject(Image::class);

        $class->property($this->photo3)->asObject(Image::class);

        $class->property($this->photo4)->asObject(Image::class);

        $class->property($this->photo5)->asObject(Image::class);

        $class->property($this->isSponsored)->asBool();

        $class->property($this->status)->asObject(ListingsStatusEnum::class);

        $class->property($this->blue)->nullable()->asObject(BlueEnum::class);

        $class->property($this->chocolate)->nullable()->asObject(ChocolateEnum::class);

        $class->property($this->testableChocolate)->nullable()->asObject(TestableChocolateEnum::class);

        $class->property($this->fluffy)->nullable()->asObject(FluffyEnum::class);

        $class->property($this->intensity)->nullable()->asObject(IntensityEnum::class);

        $class->property($this->pied)->nullable()->asObject(PiedEnum::class);

        $class->property($this->brindle)->nullable()->asObject(BrindleEnum::class);

        $class->property($this->merle)->nullable()->asObject(MerleEnum::class);

        $class->property($this->agouti)->nullable()->asObject(AgoutiEnum::class);

        $class->property($this->eMcir)->nullable()->asObject(E_mcirEnum::class);

        $class->property($this->trashed)->asBool();
    }

}
