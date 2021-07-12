<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\Users;
use Dms\Common\Structure\Web\Persistence\EmailAddressMapper;
use Dms\Common\Structure\FileSystem\Persistence\ImageMapper;
use Dms\Common\Structure\Web\Persistence\UrlMapper;

/**
 * The App\Domain\Entities\Users entity mapper.
 */
class UsersMapper extends EntityMapper
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
        $map->type(Users::class);
        $map->toTable('users');

        $map->idToPrimaryKey('id');

        $map->property(Users::FIRST_NAME)->to('first_name')->nullable()->asVarchar(255);

        $map->property(Users::LAST_NAME)->to('last_name')->nullable()->asVarchar(255);

        $map->property(Users::USERNAME)->to('username')->asVarchar(255);

        $map->enum(Users::ROLE)->to('role')->usingValuesFromConstants();

        $map->property(Users::IS_ACTIVE)->to('is_active')->asBool();

        $map->property(Users::HASHED_PASSWORD)->to('hashed_password')->asVarchar(255);

        $map->property(Users::REMEMBER_TOKEN)->to('remember_token')->nullable()->asVarchar(255);

        $map->embedded(Users::EMAIL)
            ->using(new EmailAddressMapper('email'));

        $map->property(Users::PHONE)->to('phone')->nullable()->asVarchar(255);

        $map->property(Users::KENNEL_NAME)->to('kennel_name')->nullable()->asVarchar(255);

        $map->embedded(Users::PROFILE_IMAGE)
            ->withIssetColumn('profile_image')
            ->using(new ImageMapper('profile_image', 'profile_image_file_name', public_path('app/users')));

        $map->property(Users::ADDRESS)->to('address')->nullable()->asVarchar(255);

        $map->property(Users::ZIP)->to('zip')->nullable()->asVarchar(255);

        $map->property(Users::STATE)->to('state')->nullable()->asVarchar(255);

        $map->property(Users::CITY)->to('city')->nullable()->asVarchar(255);

        $map->embedded(Users::FB_ACCOUNT)
            ->withIssetColumn('fb_account_url')
            ->using(new UrlMapper('fb_account_url'));

        $map->embedded(Users::IG_ACCOUNT)
            ->withIssetColumn('ig_account_url')
            ->using(new UrlMapper('ig_account_url'));

        $map->embedded(Users::WEBSITE)
            ->withIssetColumn('website')
            ->using(new UrlMapper('website'));

        $map->embedded(Users::LOGO)
            ->withIssetColumn('logo')
            ->using(new ImageMapper('logo', 'logo_file_name', public_path('app/users')));


    }
}
