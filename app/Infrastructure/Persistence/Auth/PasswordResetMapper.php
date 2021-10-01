<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence\Auth;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\Auth\PasswordReset;
use Dms\Common\Structure\Web\Persistence\EmailAddressMapper;
use Dms\Common\Structure\DateTime\Persistence\DateTimeMapper;

/**
 * The App\Domain\Entities\Auth\PasswordReset entity mapper.
 */
class PasswordResetMapper extends EntityMapper
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
        $map->type(PasswordReset::class);
        $map->toTable('password_resets');

        $map->idToPrimaryKey('id');

        $map->embedded(PasswordReset::EMAIL)
            ->using(new EmailAddressMapper('email'));

        $map->property(PasswordReset::TOKEN)->to('token')->asVarchar(255);

        $map->embedded(PasswordReset::CREATED_AT)
            ->withIssetColumn('created_at')
            ->using(new DateTimeMapper('created_at'));

        $map->embedded(PasswordReset::UPDATED_AT)
            ->withIssetColumn('updated_at')
            ->using(new DateTimeMapper('updated_at'));


    }
}