<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\SavedSearch;
use App\Domain\Entities\Users;

/**
 * The App\Domain\Entities\SavedSearch entity mapper.
 */
class SavedSearchMapper extends EntityMapper
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
        $map->type(SavedSearch::class);
        $map->toTable('saved_searches');

        $map->idToPrimaryKey('id');

        $map->column('user_id')->asUnsignedInt();
        $map->relation(SavedSearch::USER)
            ->to(Users::class)
            ->manyToOne()
            ->withRelatedIdAs('user_id');

        $map->property(SavedSearch::DNA_COLOR)->to('dna_color')->nullable()->asVarchar(255);

        $map->property(SavedSearch::DNA_COAT)->to('dna_coat')->nullable()->asVarchar(255);

        $map->property(SavedSearch::ZIP)->to('zip')->nullable()->asVarchar(255);

        $map->property(SavedSearch::TYPE)->to('type')->nullable()->asVarchar(255);


    }
}
