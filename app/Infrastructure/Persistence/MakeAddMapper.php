<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\MakeAdd;
use Dms\Common\Structure\FileSystem\Persistence\ImageMapper;
use Dms\Common\Structure\Web\Persistence\UrlMapper;

/**
 * The App\Domain\Entities\MakeAdd entity mapper.
 */
class MakeAddMapper extends EntityMapper
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
        $map->type(MakeAdd::class);
        $map->toTable('make_adds');

        $map->idToPrimaryKey('id');

        $map->embedded(MakeAdd::PHOTO)
            ->using(new ImageMapper('photo', 'photo_file_name', public_path('app/make_add')));

        $map->embedded(MakeAdd::URL)
            ->using(new UrlMapper('url'));

        $map->property(MakeAdd::TRASHED)->to('trashed')->asBool();

        $map->enum(MakeAdd::STATUS)->to('status')->usingValuesFromConstants();


    }
}