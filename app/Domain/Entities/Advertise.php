<?php


namespace App\Domain\Entities;


use App\Domain\Entities\Enums\ListingsStatusEnum;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Web\Url;
use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;

class Advertise extends Entity
{
    const PHOTO = 'photo';
    const URL = 'url';
    const TRASHED = 'trashed';
    const STATUS = 'status';
    /**
     * @var Image
     */
    public $photo;

    /**
     * @var Url
     */
    public $url;
    /**
     * @var Boolean
     */
    public $trashed;
    /**
     * @var ListingsStatusEnum
     */
    public $status;
    /**
     * Defines the structure of this entity.
     *
     * @param ClassDefinition $class
     * @throws InvalidPropertyDefinitionException
     */
    protected function defineEntity(ClassDefinition $class)
    {
        $class->property($this->photo)->asObject(Image::class);

        $class->property($this->url)->asObject(Url::class);

        $class->property($this->trashed)->asBool();

        $class->property($this->status)->asObject(ListingsStatusEnum::class);

    }
}
