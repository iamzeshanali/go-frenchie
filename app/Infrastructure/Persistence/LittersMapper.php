<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Common\Structure\Web\Persistence\HtmlMapper;
use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\Litters;
use App\Domain\Entities\Users;
use Dms\Common\Structure\DateTime\Persistence\DateMapper;
use Dms\Common\Structure\FileSystem\Persistence\ImageMapper;

/**
 * The App\Domain\Entities\Litters entity mapper.
 */
class LittersMapper extends EntityMapper
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
        $map->type(Litters::class);
        $map->toTable('litters');

        $map->idToPrimaryKey('id');

        $map->column('user_id')->asUnsignedInt();
        $map->relation(Litters::BREEDER)
            ->to(Users::class)
            ->manyToOne()
            ->withRelatedIdAs('user_id');

        $map->property(Litters::SLUG)->to('slug')->asVarchar(255);

        $map->property(Litters::TITLE)->to('title')->asVarchar(255);

        $map->embedded(Litters::DESCRIPTION)
            ->using(new HtmlMapper('description'));

        $map->embedded(Litters::EXPECTED_DOB)
            ->using(new DateMapper('expected_dob'));

        $map->embedded(Litters::PHOTO1)
            ->withIssetColumn('photo1')
            ->using(new ImageMapper('photo1', 'photo1_file_name', public_path('app/litters')));

        $map->embedded(Litters::PHOTO2)
            ->withIssetColumn('photo2')
            ->using(new ImageMapper('photo2', 'photo2_file_name', public_path('app/litters')));

        $map->embedded(Litters::PHOTO3)
            ->withIssetColumn('photo3')
            ->using(new ImageMapper('photo3', 'photo3_file_name', public_path('app/litters')));

        $map->embedded(Litters::PHOTO4)
            ->withIssetColumn('photo4')
            ->using(new ImageMapper('photo4', 'photo4_file_name', public_path('app/litters')));

        $map->embedded(Litters::PHOTO5)
            ->withIssetColumn('photo5')
            ->using(new ImageMapper('photo5', 'photo5_file_name', public_path('app/litters')));

        $map->property(Litters::IS_SPONSORED)->to('is_sponsored')->asBool();

        $map->property(Litters::IS_FEATURED)->to('is_featured')->asBool();

        $map->enum(Litters::STATUS)->to('status')->usingValuesFromConstants();

        $map->property(Litters::DAM)->to('dam')->asVarchar(255);

        $map->property(Litters::SIRE)->to('sire')->asVarchar(255);

        $map->property(Litters::TRASHED)->to('trashed')->asBool();


    }
}
