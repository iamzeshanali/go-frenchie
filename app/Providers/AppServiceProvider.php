<?php

namespace App\Providers;

use App\AppCms;
use App\AppOrm;
use App\Domain\Services\Persistence\Auth\IPasswordResetRepository;
use App\Domain\Services\Persistence\IAdvertisementsRepository;
use App\Domain\Services\Persistence\IAdvertiseRepository;
use App\Domain\Services\Persistence\IApiConfigRepository;
use App\Domain\Services\Persistence\IBreeder_SuppliesRepository;
use App\Domain\Services\Persistence\IBreederRepository;
use App\Domain\Services\Persistence\ICanine_GeneticsRepository;
use App\Domain\Services\Persistence\ICanine_NutritionRepository;
use App\Domain\Services\Persistence\ICustomersRepository;
use App\Domain\Services\Persistence\IEmailLogsRepository;
use App\Domain\Services\Persistence\IEnumsTestRepository;
use App\Domain\Services\Persistence\IListingsRepository;
use App\Domain\Services\Persistence\ILittersRepository;
use App\Domain\Services\Persistence\IMakeAddRepository;
use App\Domain\Services\Persistence\ISavedItemsRepository;
use App\Domain\Services\Persistence\ISavedListingsRepository;
use App\Domain\Services\Persistence\ISavedLittersRepository;
use App\Domain\Services\Persistence\ISavedSearchRepository;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Infrastructure\Persistence\Auth\DbPasswordResetRepository;
use App\Infrastructure\Persistence\DbAdvertisementsRepository;
use App\Infrastructure\Persistence\DbAdvertiseRepository;
use App\Infrastructure\Persistence\DbApiConfigRepository;
use App\Infrastructure\Persistence\DbBreeder_SuppliesRepository;
use App\Infrastructure\Persistence\DbBreederRepository;
use App\Infrastructure\Persistence\DbCanine_GeneticsRepository;
use App\Infrastructure\Persistence\DbCanine_NutritionRepository;
use App\Infrastructure\Persistence\DbCustomersRepository;
use App\Infrastructure\Persistence\DbEmailLogsRepository;
use App\Infrastructure\Persistence\DbEnumsTestRepository;
use App\Infrastructure\Persistence\DbListingsRepository;
use App\Infrastructure\Persistence\DbLittersRepository;
use App\Infrastructure\Persistence\DbMakeAddRepository;
use App\Infrastructure\Persistence\DbSavedItemsRepository;
use App\Infrastructure\Persistence\DbSavedListingsRepository;
use App\Infrastructure\Persistence\DbSavedLittersRepository;
use App\Infrastructure\Persistence\DbSavedSearchRepository;
use App\Infrastructure\Persistence\DbUsersRepository;
use App\View\Components\likeSponsored;
use App\View\Components\likeSponsoredLitters;
use App\View\Components\likeStandard;
use App\View\Components\likeStandardLitters;
use App\View\Components\login;
use App\View\Components\register;
use Dms\Core\ICms;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('like-sponsored', likeSponsored::class);
        Blade::component('like-standard', likeStandard::class);
        Blade::component('like-sponsored-litters', likeSponsoredLitters::class);
        Blade::component('like-standard-litters', likeStandardLitters::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IOrm::class, AppOrm::class);
        $this->app->singleton(ICms::class, AppCms::class);

        $this->app->singleton(IUsersRepository::class, DbUsersRepository::class);
        $this->app->singleton(IPasswordResetRepository::class, DbPasswordResetRepository::class);

        $this->app->singleton(IListingsRepository::class, DbListingsRepository::class);
        $this->app->singleton(ILittersRepository::class, DbLittersRepository::class);

        $this->app->singleton(ISavedListingsRepository::class, DbSavedListingsRepository::class);
        $this->app->singleton(ISavedLittersRepository::class, DbSavedLittersRepository::class);

        $this->app->singleton(IBreeder_SuppliesRepository::class, DbBreeder_SuppliesRepository::class);
        $this->app->singleton(ICanine_GeneticsRepository::class, DbCanine_GeneticsRepository::class);
        $this->app->singleton(ICanine_NutritionRepository::class, DbCanine_NutritionRepository::class);

        $this->app->singleton(IMakeAddRepository::class, DbMakeAddRepository::class);
        $this->app->singleton(IEmailLogsRepository::class, DbEmailLogsRepository::class);


        $this->app->singleton(IApiConfigRepository::class, DbApiConfigRepository::class);

    }
}
