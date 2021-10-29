<?php declare(strict_types = 1);

namespace App\Cms;

use Dms\Core\Package\Definition\PackageDefinition;
use Dms\Core\Package\Package;
use App\Cms\Modules\ApiConfigModule;
use App\Cms\Modules\Breeder_SuppliesModule;
use App\Cms\Modules\Canine_GeneticsModule;
use App\Cms\Modules\Canine_NutritionModule;
use App\Cms\Modules\EmailLogsModule;
use App\Cms\Modules\ListingsModule;
use App\Cms\Modules\LittersModule;
use App\Cms\Modules\MakeAddModule;
use App\Cms\Modules\SavedListingsModule;
use App\Cms\Modules\SavedLittersModule;
use App\Cms\Modules\SavedSearchModule;
use App\Cms\Modules\UsersModule;
use App\Cms\Modules\Auth\PasswordResetModule;

/**
 * The Resources package.
 */
class ResourcesPackage extends Package
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
        $package->name('Resources');

        $package->metadata([
            'icon' => '',
        ]);

        $package->modules([
            'breeder_-supplies' => Breeder_SuppliesModule::class,
            'canine_-genetics' => Canine_GeneticsModule::class,
            'canine_-nutrition' => Canine_NutritionModule::class,
        ]);
    }
}
