<?php declare(strict_types = 1);

namespace App;

use App\Domain\Entities\Advertise;
use App\Domain\Entities\Auth\PasswordReset;
use App\Domain\Entities\Breeder;
use App\Domain\Entities\Breeder_Supplies;
use App\Domain\Entities\Canine_Genetics;
use App\Domain\Entities\Canine_Nutrition;
use App\Domain\Entities\Customers;
use App\Domain\Entities\EnumsTest;
use App\Domain\Entities\Listings;
use App\Domain\Entities\Litters;
use App\Domain\Entities\SavedItems;
use App\Domain\Entities\SavedListings;
use App\Domain\Entities\SavedLitters;
use App\Domain\Entities\SavedSearch;
use App\Domain\Entities\Users;
use App\Infrastructure\Persistence\AdvertiseMapper;
use App\Infrastructure\Persistence\AdvertisementsMapper;
use App\Infrastructure\Persistence\Auth\PasswordResetMapper;
use App\Infrastructure\Persistence\Breeder_SuppliesMapper;
use App\Infrastructure\Persistence\BreederMapper;
use App\Infrastructure\Persistence\Canine_GeneticsMapper;
use App\Infrastructure\Persistence\Canine_NutritionMapper;
use App\Infrastructure\Persistence\CustomersMapper;
use App\Infrastructure\Persistence\EnumsTestMapper;
use App\Infrastructure\Persistence\ListingsMapper;
use App\Infrastructure\Persistence\LittersMapper;
use App\Infrastructure\Persistence\SavedItemsMapper;
use App\Infrastructure\Persistence\SavedListingsMapper;
use App\Infrastructure\Persistence\SavedLittersMapper;
use App\Infrastructure\Persistence\SavedSearchMapper;
use App\Infrastructure\Persistence\UsersMapper;
use Dms\Core\Persistence\Db\Mapping\Definition\Orm\OrmDefinition;
use Dms\Core\Persistence\Db\Mapping\Orm;
use Dms\Web\Laravel\Persistence\Db\DmsOrm;

/**
 * The application's orm.
 */
class AppOrm extends Orm
{
    /**
     * Defines the object mappers registered in the orm.
     *
     * @param OrmDefinition $orm
     *
     * @return void
     */
    protected function define(OrmDefinition $orm)
    {
        $orm->enableLazyLoading();

        $orm->encompass(DmsOrm::inDefaultNamespace());

        // TODO: Register your mappers...

        $orm->entities([
            Users::class => UsersMapper::class,
            PasswordReset::class => PasswordResetMapper::class,
            Listings::class => ListingsMapper::class,
            Litters::class => LittersMapper::class,
//
            Breeder_Supplies::class => Breeder_SuppliesMapper::class,
            Canine_Genetics::class => Canine_GeneticsMapper::class,
            Canine_Nutrition::class => Canine_NutritionMapper::class,
//
            SavedSearch::class => SavedSearchMapper::class,
            SavedListings::class => SavedListingsMapper::class,
            SavedLitters::class => SavedLittersMapper::class,
//
            Advertise::class => AdvertiseMapper::class,

        ]);

    }
}
