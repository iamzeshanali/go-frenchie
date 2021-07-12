<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\SavedLitters;
use App\Domain\Entities\Users;
use App\Domain\Entities\Litters;

/**
 * The App\Domain\Entities\SavedLitters entity mapper.
 */
class SavedLittersMapper extends EntityMapper
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
        $map->type(SavedLitters::class);
        $map->toTable('saved_litters');

        $map->idToPrimaryKey('id');

        $map->column('user_id')->asUnsignedInt();
        $map->relation(SavedLitters::CUSTOMER)
            ->to(Users::class)
            ->manyToOne()
            ->withRelatedIdAs('user_id');

        $map->column('listing_id')->asUnsignedInt();
        $map->relation(SavedLitters::LITTERS)
            ->to(Litters::class)
            ->manyToOne()
            ->withRelatedIdAs('listing_id');

        $map->property(SavedLitters::TRASHED)->to('trashed')->asBool();


    }
}
