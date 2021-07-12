<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\SavedListings;
use App\Domain\Entities\Users;
use App\Domain\Entities\Listings;

/**
 * The App\Domain\Entities\SavedListings entity mapper.
 */
class SavedListingsMapper extends EntityMapper
{
    /**
     * Defines the entity mapper
     *
     * @param MapperDefinition $map
     *
     * @return void
     */
    protected function define(MapperDefinition $map)
    {
        $map->type(SavedListings::class);
        $map->toTable('saved_listings');

        $map->idToPrimaryKey('id');

        $map->column('user_id')->asUnsignedInt();
        $map->relation(SavedListings::CUSTOMER)
            ->to(Users::class)
            ->manyToOne()
            ->withRelatedIdAs('user_id');

        $map->column('listing_id')->asUnsignedInt();
        $map->relation(SavedListings::LISTINGS)
            ->to(Listings::class)
            ->manyToOne()
            ->withRelatedIdAs('listing_id');

        $map->property(SavedListings::TRASHED)->to('trashed')->asBool();


    }
}
