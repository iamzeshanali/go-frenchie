<?php


namespace App\Domain\Entities;


use App\Domain\Entities\Enums\ListingsStatusEnum;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Money\Money;
use Dms\Common\Structure\Web\Url;
use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;

class Canine_Genetics extends Entity{

    const LOGO = 'logo';
    const SLUG = 'slug';
    const TITLE = 'title';
    const DESCRIPTION = 'decription';
    const WEBSITE_URL = 'websiteUrl';
    const COUPON_CODE = 'couponCode';
    const PRICE = 'price';
    const BREEDER = 'breeder';
    const TRASHED = 'trashed';
    const STATUS = 'status';
    /**
     * @var Image
     */
    public $logo;



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
     * @var Url
     */
    public $websiteUrl;

    /**
     * @var string
     */
    public $couponCode;

    /**
     * @var Money
     */
    public $price;

    /**
     * @var Users
     */
    public $breeder;
    /**
     * @var Boolean
     */
    public $trashed;

    /**
     * @var ListingsStatusEnum
     *
     */
    public $status;
    /**
     * Defines the structure of this entity.
     *
     * @param ClassDefinition $class
     * @throws InvalidPropertyDefinitionException
     *
     */
    protected function defineEntity(ClassDefinition $class)
    {
        $class->property($this->logo)->asObject(Image::class);
        $class->property($this->slug)->asString();
        $class->property($this->title)->asString();
        $class->property($this->decription)->asString();
        $class->property($this->websiteUrl)->asObject(Url::class);
        $class->property($this->couponCode)->asString();
        $class->property($this->price)->asObject(Money::class);
        $class->property($this->breeder)->asObject(Users::class);
        $class->property($this->trashed)->asBool();
        $class->property($this->status)->asObject(ListingsStatusEnum::class);
    }

}
