<?php


namespace App\Domain\Entities;


use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;

class SavedLitters extends Entity
{
    const CUSTOMER = 'customer';
    const LITTERS = 'litters';
    const TRASHED = 'trashed';
    /**
     * @var Users
     */
    public $customer;
    /**
     * @var Listings
     */
    public $litters;

    /**
     * @var Bool
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
        $class->property($this->customer)->asObject(Users::class);
        $class->property($this->litters)->asObject(Litters::class);
        $class->property($this->trashed)->asBool();
    }
}
