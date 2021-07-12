<?php declare(strict_types = 1);

namespace App\Cms;

use Dms\Core\Package\Definition\PackageDefinition;
use Dms\Core\Package\Package;
use App\Cms\Modules\AdvertiseModule;
use App\Cms\Modules\Breeder_SuppliesModule;
use App\Cms\Modules\Canine_GeneticsModule;
use App\Cms\Modules\Canine_NutritionModule;
use App\Cms\Modules\ListingsModule;
use App\Cms\Modules\LittersModule;
use App\Cms\Modules\SavedListingsModule;
use App\Cms\Modules\SavedLittersModule;
use App\Cms\Modules\SavedSearchModule;
use App\Cms\Modules\UsersModule;

/**
 * The SavedItems package.
 */
class SavedItemsPackage extends Package
{
    /**
     * Defines the structure of this cms package.
     *
     * @param PackageDefinition $package
     *
     * @return void
     */
    protected function define(PackageDefinition $package)
    {
        $package->name('SavedItems');

        $package->metadata([
            'icon' => '',
        ]);

        $package->modules([
            'saved-listings' => SavedListingsModule::class,
            'saved-litters' => SavedLittersModule::class,
            'saved-search' => SavedSearchModule::class,
        ]);
    }
}
