<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\Breeder_Supplies;
use Dms\Common\Structure\FileSystem\Persistence\ImageMapper;
use Dms\Common\Structure\Web\Persistence\HtmlMapper;
use Dms\Common\Structure\Web\Persistence\UrlMapper;
use Dms\Common\Structure\Money\Persistence\MoneyMapper;
use App\Domain\Entities\Users;

/**
 * The App\Domain\Entities\Breeder_Supplies entity mapper.
 */
class Breeder_SuppliesMapper extends EntityMapper
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
        $map->type(Breeder_Supplies::class);
        $map->toTable('breeder__supplies');

        $map->idToPrimaryKey('id');

        $map->embedded(Breeder_Supplies::LOGO)
            ->using(new ImageMapper('logo', 'logo_file_name', public_path('app/breeder__supplies')));

        $map->property(Breeder_Supplies::SLUG)->to('slug')->asVarchar(255);

        $map->property(Breeder_Supplies::TITLE)->to('title')->asVarchar(255);

        $map->embedded(Breeder_Supplies::DESCRIPTION)
            ->using(new HtmlMapper('decription'));

        $map->embedded(Breeder_Supplies::WEBSITE_URL)
            ->using(new UrlMapper('website_url'));

        $map->property(Breeder_Supplies::COUPON_CODE)->to('coupon_code')->asVarchar(255);

        $map->embedded(Breeder_Supplies::PRICE)
            ->using(new MoneyMapper('price_amount', 'price_currency'));

        $map->column('user_id')->asUnsignedInt();
        $map->relation(Breeder_Supplies::BREEDER)
            ->to(Users::class)
            ->manyToOne()
            ->withRelatedIdAs('user_id');

        $map->property(Breeder_Supplies::TRASHED)->to('trashed')->asBool();

        $map->enum(Breeder_Supplies::STATUS)->to('status')->usingValuesFromConstants();


    }
}
