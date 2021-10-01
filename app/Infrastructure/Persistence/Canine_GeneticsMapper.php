<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\Canine_Genetics;
use Dms\Common\Structure\FileSystem\Persistence\ImageMapper;
use Dms\Common\Structure\Web\Persistence\HtmlMapper;
use Dms\Common\Structure\Web\Persistence\UrlMapper;
use Dms\Common\Structure\Money\Persistence\MoneyMapper;
use App\Domain\Entities\Users;

/**
 * The App\Domain\Entities\Canine_Genetics entity mapper.
 */
class Canine_GeneticsMapper extends EntityMapper
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
        $map->type(Canine_Genetics::class);
        $map->toTable('canine__genetics');

        $map->idToPrimaryKey('id');

        $map->embedded(Canine_Genetics::LOGO)
            ->withIssetColumn('logo')
            ->using(new ImageMapper('logo', 'logo_file_name', public_path('app/canine__genetics')));

        $map->property(Canine_Genetics::TITLE)->to('title')->asVarchar(255);

        $map->property(Canine_Genetics::SLUG)->to('slug')->asVarchar(255);

        $map->embedded(Canine_Genetics::DESCRIPTION)
            ->using(new HtmlMapper('decription'));

        $map->embedded(Canine_Genetics::WEBSITE_URL)
            ->using(new UrlMapper('website_url'));

        $map->property(Canine_Genetics::COUPON_CODE)->to('coupon_code')->asVarchar(255);

        $map->embedded(Canine_Genetics::PRICE)
            ->using(new MoneyMapper('price_amount', 'price_currency'));

        $map->column('user_id')->asUnsignedInt();
        $map->relation(Canine_Genetics::BREEDER)
            ->to(Users::class)
            ->manyToOne()
            ->withRelatedIdAs('user_id');

        $map->property(Canine_Genetics::TRASHED)->to('trashed')->asBool();

        $map->enum(Canine_Genetics::STATUS)->to('status')->usingValuesFromConstants();


    }
}
