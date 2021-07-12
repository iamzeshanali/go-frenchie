<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\Listings;
use App\Domain\Entities\Users;
use Dms\Common\Structure\DateTime\Persistence\DateMapper;
use Dms\Common\Structure\FileSystem\Persistence\ImageMapper;

/**
 * The App\Domain\Entities\Listings entity mapper.
 */
class ListingsMapper extends EntityMapper
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
        $map->type(Listings::class);
        $map->toTable('listings');

        $map->idToPrimaryKey('id');

        $map->column('user_id')->asUnsignedInt();
        $map->relation(Listings::BREEDER)
            ->to(Users::class)
            ->manyToOne()
            ->withRelatedIdAs('user_id');

        $map->property(Listings::TITLE)->to('title')->asVarchar(255);

        $map->property(Listings::SLUG)->to('slug')->asVarchar(255);

        $map->property(Listings::DESCRIPTION)->to('decription')->asVarchar(255);

        $map->enum(Listings::TYPE)->to('type')->usingValuesFromConstants();

        $map->enum(Listings::SEX)->to('sex')->usingValuesFromConstants();

        $map->embedded(Listings::DOB)
            ->using(new DateMapper('dob'));

        $map->embedded(Listings::PHOTO1)
            ->using(new ImageMapper('photo1', 'photo1_file_name', public_path('app/listings')));

        $map->embedded(Listings::PHOTO2)
            ->using(new ImageMapper('photo2', 'photo2_file_name', public_path('app/listings')));

        $map->embedded(Listings::PHOTO3)
            ->using(new ImageMapper('photo3', 'photo3_file_name', public_path('app/listings')));

        $map->embedded(Listings::PHOTO4)
            ->using(new ImageMapper('photo4', 'photo4_file_name', public_path('app/listings')));

        $map->embedded(Listings::PHOTO5)
            ->using(new ImageMapper('photo5', 'photo5_file_name', public_path('app/listings')));

        $map->property(Listings::IS_SPONSORED)->to('is_sponsored')->asBool();

        $map->enum(Listings::STATUS)->to('status')->usingValuesFromConstants();

        $map->enum(Listings::BLUE)->to('blue')->usingValuesFromConstants();

        $map->enum(Listings::CHOCOLATE)->to('chocolate')->usingValuesFromConstants();

        $map->enum(Listings::AGOUTI)->to('agouti')->usingValuesFromConstants();

        $map->enum(Listings::TESTABLE_CHOCOLATE)->to('testable_chocolate')->usingValuesFromConstants();

        $map->enum(Listings::FLUFFY)->to('fluffy')->usingValuesFromConstants();

        $map->enum(Listings::E_MCIR)->to('e_mcir')->usingValuesFromConstants();

        $map->enum(Listings::INTENSITY)->to('intensity')->usingValuesFromConstants();

        $map->enum(Listings::PIED)->to('pied')->usingValuesFromConstants();

        $map->enum(Listings::BRINDLE)->to('brindle')->usingValuesFromConstants();

        $map->enum(Listings::MERLE)->to('merle')->usingValuesFromConstants();

        $map->property(Listings::TRASHED)->to('trashed')->asBool();


    }
}
