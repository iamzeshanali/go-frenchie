<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\IBreeder_SuppliesRepository;
use App\Domain\Entities\Breeder_Supplies;
use Dms\Common\Structure\Field;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;
use App\Domain\Entities\Enums\ListingsStatusEnum;

/**
 * The breeder_-supplies module.
 */
class Breeder_SuppliesModule extends CrudModule
{
    /**
     * @var IUsersRepository
     */
    protected $usersRepository;


    public function __construct(IBreeder_SuppliesRepository $dataSource, IAuthSystem $authSystem, IUsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        parent::__construct($dataSource, $authSystem);
    }

    /**
     * Defines the structure of this module.
     *
     * @param CrudModuleDefinition $module
     */
    protected function defineCrudModule(CrudModuleDefinition $module)
    {
        $module->name('breeder_-supplies');

        $module->labelObjects()->fromProperty(Breeder_Supplies::SLUG);

        $module->metadata([
            'icon' => 'tags'
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('logo', 'Logo')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/breeder__supplies'))
                )->bindToProperty(Breeder_Supplies::LOGO),
                //
                $form->field(
                    Field::create('slug', 'Slug')->string()->required()
                )->bindToProperty(Breeder_Supplies::SLUG),
                //
                $form->field(
                    Field::create('title', 'Title')->string()->required()
                )->bindToProperty(Breeder_Supplies::TITLE),
                //
                $form->field(
                    Field::create('decription', 'Decription')->string()->required()
                )->bindToProperty(Breeder_Supplies::DESCRIPTION),
                //
                $form->field(
                    Field::create('website_url', 'Website Url')->url()->required()
                )->bindToProperty(Breeder_Supplies::WEBSITE_URL),
                //
                $form->field(
                    Field::create('coupon_code', 'Coupon Code')->string()->required()
                )->bindToProperty(Breeder_Supplies::COUPON_CODE),
                //
                $form->field(
                    Field::create('price', 'Price')->money()->required()
                )->bindToProperty(Breeder_Supplies::PRICE),
                //
                $form->field(
                    Field::create('breeder', 'Breeder')
                        ->entityFrom($this->usersRepository)
                        ->required()
                        ->labelledBy(Users::FIRST_NAME)
                )->bindToProperty(Breeder_Supplies::BREEDER),
                //
                $form->field(
                    Field::create('trashed', 'Trashed')->bool()
                )->bindToProperty(Breeder_Supplies::TRASHED),
                //
                $form->field(
                    Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                        ListingsStatusEnum::ACTIVE => 'Active',
                        ListingsStatusEnum::INACTIVE => 'Inactive',
                    ])->required()
                )->bindToProperty(Breeder_Supplies::STATUS),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(Breeder_Supplies::LOGO)->to(Field::create('logo', 'Logo')
                ->image()
                ->required()
                ->moveToPathWithRandomFileName(public_path('app/breeder__supplies')));
            $table->mapProperty(Breeder_Supplies::SLUG)->to(Field::create('slug', 'Slug')->string()->required());
            $table->mapProperty(Breeder_Supplies::TITLE)->to(Field::create('title', 'Title')->string()->required());
            $table->mapProperty(Breeder_Supplies::DESCRIPTION)->to(Field::create('decription', 'Decription')->string()->required());
            $table->mapProperty(Breeder_Supplies::WEBSITE_URL)->to(Field::create('website_url', 'Website Url')->url()->required());
            $table->mapProperty(Breeder_Supplies::COUPON_CODE)->to(Field::create('coupon_code', 'Coupon Code')->string()->required());
            $table->mapProperty(Breeder_Supplies::PRICE)->to(Field::create('price', 'Price')->money()->required());
            $table->mapProperty(Breeder_Supplies::BREEDER)->to(Field::create('breeder', 'Breeder')
                ->entityFrom($this->usersRepository)
                ->required()
                ->labelledBy(Users::FIRST_NAME));
            $table->mapProperty(Breeder_Supplies::TRASHED)->to(Field::create('trashed', 'Trashed')->bool());
            $table->mapProperty(Breeder_Supplies::STATUS)->to(Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                ListingsStatusEnum::ACTIVE => 'Active',
                ListingsStatusEnum::INACTIVE => 'Inactive',
            ])->required());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}
