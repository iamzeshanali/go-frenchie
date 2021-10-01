<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\Canine_Nutrition;
use Dms\Common\Structure\FileSystem\Persistence\ImageMapper;
use Dms\Common\Structure\Web\Persistence\HtmlMapper;
use Dms\Common\Structure\Web\Persistence\UrlMapper;
use Dms\Common\Structure\Money\Persistence\MoneyMapper;
use App\Domain\Entities\Users;

/**
 * The App\Domain\Entities\Canine_Nutrition entity mapper.
 */
class Canine_NutritionMapper extends EntityMapper
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
        $map->type(Canine_Nutrition::class);
        $map->toTable('canine__nutritions');

        $map->idToPrimaryKey('id');

        $map->embedded(Canine_Nutrition::LOGO)
            ->using(new ImageMapper('logo', 'logo_file_name', public_path('app/canine__nutrition')));

        $map->property(Canine_Nutrition::TITLE)->to('title')->asVarchar(255);

        $map->property(Canine_Nutrition::SLUG)->to('slug')->asVarchar(255);

        $map->embedded(Canine_Nutrition::DESCRIPTION)
            ->using(new HtmlMapper('decription'));

        $map->embedded(Canine_Nutrition::WEBSITE_URL)
            ->using(new UrlMapper('website_url'));

        $map->property(Canine_Nutrition::COUPON_CODE)->to('coupon_code')->asVarchar(255);

        $map->embedded(Canine_Nutrition::PRICE)
            ->using(new MoneyMapper('price_amount', 'price_currency'));

        $map->column('user_id')->asUnsignedInt();
        $map->relation(Canine_Nutrition::BREEDER)
            ->to(Users::class)
            ->manyToOne()
            ->withRelatedIdAs('user_id');

        $map->property(Canine_Nutrition::TRASHED)->to('trashed')->asBool();

        $map->enum(Canine_Nutrition::STATUS)->to('status')->usingValuesFromConstants();


    }
}
