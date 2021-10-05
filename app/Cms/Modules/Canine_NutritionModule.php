<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\ICanine_NutritionRepository;
use App\Domain\Entities\Canine_Nutrition;
use Dms\Common\Structure\Field;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;
use App\Domain\Entities\Enums\ListingsStatusEnum;

/**
 * The canine_-nutrition module.
 */
class Canine_NutritionModule extends CrudModule
{
    /**
     * @var IUsersRepository
     */
    protected $usersRepository;


    public function __construct(ICanine_NutritionRepository $dataSource, IAuthSystem $authSystem, IUsersRepository $usersRepository)
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
        $module->name('canine_-nutrition');

        $module->labelObjects()->fromProperty(Canine_Nutrition::TITLE);

        $module->metadata([
            'icon' => ''
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('logo', 'Logo')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/canine__nutrition'))
                )->bindToProperty(Canine_Nutrition::LOGO),
                //
                $form->field(
                    Field::create('title', 'Title')->string()->required()
                )->bindToProperty(Canine_Nutrition::TITLE),
                //
                $form->field(
                    Field::create('slug', 'Slug')->string()->required()
                )->bindToProperty(Canine_Nutrition::SLUG),
                //
                $form->field(
                    Field::create('decription', 'Decription')->html()->required()
                )->bindToProperty(Canine_Nutrition::DESCRIPTION),
                //
                $form->field(
                    Field::create('website_url', 'Website Url')->url()->required()
                )->bindToProperty(Canine_Nutrition::WEBSITE_URL),
                //
                $form->field(
                    Field::create('coupon_code', 'Coupon Code')->string()->required()
                )->bindToProperty(Canine_Nutrition::COUPON_CODE),
                //
                $form->field(
                    Field::create('price', 'Price')->money()->required()
                )->bindToProperty(Canine_Nutrition::PRICE),
                //
                $form->field(
                    Field::create('breeder', 'Breeder')
                        ->entityFrom($this->usersRepository)
                        ->required()
                        ->labelledBy(Users::FIRST_NAME)
                )->bindToProperty(Canine_Nutrition::BREEDER),
                //
                $form->field(
                    Field::create('trashed', 'Trashed')->bool()
                )->bindToProperty(Canine_Nutrition::TRASHED),
                //
                $form->field(
                    Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                        ListingsStatusEnum::ACTIVE => 'Active',
                        ListingsStatusEnum::INACTIVE => 'Inactive',
                    ])->required()
                )->bindToProperty(Canine_Nutrition::STATUS),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
//            $table->mapProperty(Canine_Nutrition::LOGO)->to(Field::create('logo', 'Logo')
//                ->image()
//                ->required()
//                ->moveToPathWithRandomFileName(public_path('app/canine__nutrition')));
            $table->mapProperty(Canine_Nutrition::TITLE)->to(Field::create('title', 'Title')->string()->required());
            $table->mapProperty(Canine_Nutrition::SLUG)->to(Field::create('slug', 'Slug')->string()->required());
            $table->mapProperty(Canine_Nutrition::DESCRIPTION)->to(Field::create('decription', 'Decription')->html()->required());
            $table->mapProperty(Canine_Nutrition::WEBSITE_URL)->to(Field::create('website_url', 'Website Url')->url()->required());
            $table->mapProperty(Canine_Nutrition::COUPON_CODE)->to(Field::create('coupon_code', 'Coupon Code')->string()->required());
            $table->mapProperty(Canine_Nutrition::PRICE)->to(Field::create('price', 'Price')->money()->required());
            $table->mapProperty(Canine_Nutrition::BREEDER)->to(Field::create('breeder', 'Breeder')
                ->entityFrom($this->usersRepository)
                ->required()
                ->labelledBy(Users::FIRST_NAME));
            $table->mapProperty(Canine_Nutrition::TRASHED)->to(Field::create('trashed', 'Trashed')->bool());
            $table->mapProperty(Canine_Nutrition::STATUS)->to(Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                ListingsStatusEnum::ACTIVE => 'Active',
                ListingsStatusEnum::INACTIVE => 'Inactive',
            ])->required());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}
