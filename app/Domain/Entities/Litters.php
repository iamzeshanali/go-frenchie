<?php


namespace App\Domain\Entities;


use App\Domain\Entities\Enums\ListingsStatusEnum;
use Dms\Common\Structure\DateTime\Date;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Web\Html;
use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;

class Litters extends Entity
{
    const BREEDER = 'breeder';
    const SLUG = 'slug';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const EXPECTED_DOB = 'expectedDob';
    const PHOTO1 = 'photo1';
    const PHOTO2 = 'photo2';
    const PHOTO3 = 'photo3';
    const PHOTO4 = 'photo4';
    const PHOTO5 = 'photo5';
    const IS_SPONSORED = 'isSponsored';
    const IS_FEATURED = 'isFeatured';
    const STATUS = 'status';
    const DAM = 'dam';
    const SIRE = 'sire';
    const TRASHED = 'trashed';
    /**
     * @var Users
     */
    public $breeder;

    /**
     * @var string
     */
    public $slug;
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var Date
     */
    public $expectedDob;

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
     * @var Boolean
     */
    public $isFeatured;
    /**
     * @var ListingsStatusEnum
     */
    public $status;

    /**
     * @var string
     */
    public $dam;

    /**
     * @var string
     */
    public $sire;

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

        $class->property($this->slug)->asString();

        $class->property($this->title)->asString();

        $class->property($this->description)->asObject(Html::class);

        $class->property($this->expectedDob)->asObject(Date::class);

        $class->property($this->photo1)->nullable()->asObject(Image::class);

        $class->property($this->photo2)->nullable()->asObject(Image::class);

        $class->property($this->photo3)->nullable()->asObject(Image::class);

        $class->property($this->photo4)->nullable()->asObject(Image::class);

        $class->property($this->photo5)->nullable()->asObject(Image::class);

        $class->property($this->isSponsored)->asBool();

        $class->property($this->isFeatured)->asBool();

        $class->property($this->status)->asObject(ListingsStatusEnum::class);

        $class->property($this->dam)->asString();

        $class->property($this->sire)->asString();

        $class->property($this->trashed)->asBool();
    }
}
