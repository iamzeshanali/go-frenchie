<?php


namespace App\Domain\Entities;


use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;

class SavedListings extends Entity
{
    const CUSTOMER = 'customer';
    const LISTINGS = 'listings';
    const TRASHED = 'trashed';
    /**
     * @var Users
     */
    public $customer;
    /**
     * @var Listings
     */
    public $listings;

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
        $class->property($this->listings)->asObject(Listings::class);
        $class->property($this->trashed)->asBool();
    }
}
