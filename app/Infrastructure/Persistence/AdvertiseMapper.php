<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\Advertise;
use Dms\Common\Structure\FileSystem\Persistence\ImageMapper;
use Dms\Common\Structure\Web\Persistence\UrlMapper;

/**
 * The App\Domain\Entities\Advertise entity mapper.
 */
class AdvertiseMapper extends EntityMapper
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
        $map->type(Advertise::class);
        $map->toTable('advertises');

        $map->idToPrimaryKey('id');

        $map->embedded(Advertise::PHOTO)
            ->using(new ImageMapper('photo', 'photo_file_name', public_path('app/advertise')));

        $map->embedded(Advertise::URL)
            ->using(new UrlMapper('url'));

        $map->property(Advertise::TRASHED)->to('trashed')->asBool();

        $map->enum(Advertise::STATUS)->to('status')->usingValuesFromConstants();


    }
}