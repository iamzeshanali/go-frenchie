<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\ApiConfig;


/**
 * The App\Domain\Entities\ApiConfig entity mapper.
 */
class ApiConfigMapper extends EntityMapper
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
        $map->type(ApiConfig::class);
        $map->toTable('api_configs');

        $map->idToPrimaryKey('id');

        $map->property(ApiConfig::TOKEN)->to('token')->asVarchar(255);


    }
}