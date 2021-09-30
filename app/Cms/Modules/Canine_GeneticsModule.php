<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\ICanine_GeneticsRepository;
use App\Domain\Entities\Canine_Genetics;
use Dms\Common\Structure\Field;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;
use App\Domain\Entities\Enums\ListingsStatusEnum;

/**
 * The canine_-genetics module.
 */
class Canine_GeneticsModule extends CrudModule
{
    /**
     * @var IUsersRepository
     */
    protected $usersRepository;


    public function __construct(ICanine_GeneticsRepository $dataSource, IAuthSystem $authSystem, IUsersRepository $usersRepository)
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
        $module->name('canine_-genetics');

        $module->labelObjects()->fromProperty(Canine_Genetics::TITLE);

        $module->metadata([
            'icon' => 'mars-double'
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('logo', 'Logo')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/canine__genetics'))
                )->bindToProperty(Canine_Genetics::LOGO),
                //
                $form->field(
                    Field::create('title', 'Title')->string()->required()
                )->bindToProperty(Canine_Genetics::TITLE),
                //
                $form->field(
                    Field::create('slug', 'Slug')->string()->required()
                )->bindToProperty(Canine_Genetics::SLUG),
                //
                $form->field(
                    Field::create('decription', 'Decription')->string()->required()
                )->bindToProperty(Canine_Genetics::DESCRIPTION),
                //
                $form->field(
                    Field::create('website_url', 'Website Url')->url()->required()
                )->bindToProperty(Canine_Genetics::WEBSITE_URL),
                //
                $form->field(
                    Field::create('coupon_code', 'Coupon Code')->string()->required()
                )->bindToProperty(Canine_Genetics::COUPON_CODE),
                //
                $form->field(
                    Field::create('price', 'Price')->money()->required()
                )->bindToProperty(Canine_Genetics::PRICE),
                //
                $form->field(
                    Field::create('breeder', 'Breeder')
                        ->entityFrom($this->usersRepository)
                        ->required()
                        ->labelledBy(Users::FIRST_NAME)
                )->bindToProperty(Canine_Genetics::BREEDER),
                //
                $form->field(
                    Field::create('trashed', 'Trashed')->bool()
                )->bindToProperty(Canine_Genetics::TRASHED),
                //
                $form->field(
                    Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                        ListingsStatusEnum::ACTIVE => 'Active',
                        ListingsStatusEnum::INACTIVE => 'Inactive',
                    ])->required()
                )->bindToProperty(Canine_Genetics::STATUS),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(Canine_Genetics::LOGO)->to(Field::create('logo', 'Logo')
                ->image()
                ->required()
                ->moveToPathWithRandomFileName(public_path('app/canine__genetics')));
            $table->mapProperty(Canine_Genetics::TITLE)->to(Field::create('title', 'Title')->string()->required());
            $table->mapProperty(Canine_Genetics::SLUG)->to(Field::create('slug', 'Slug')->string()->required());
            $table->mapProperty(Canine_Genetics::DESCRIPTION)->to(Field::create('decription', 'Decription')->string()->required());
            $table->mapProperty(Canine_Genetics::WEBSITE_URL)->to(Field::create('website_url', 'Website Url')->url()->required());
            $table->mapProperty(Canine_Genetics::COUPON_CODE)->to(Field::create('coupon_code', 'Coupon Code')->string()->required());
            $table->mapProperty(Canine_Genetics::PRICE)->to(Field::create('price', 'Price')->money()->required());
            $table->mapProperty(Canine_Genetics::BREEDER)->to(Field::create('breeder', 'Breeder')
                ->entityFrom($this->usersRepository)
                ->required()
                ->labelledBy(Users::FIRST_NAME));
            $table->mapProperty(Canine_Genetics::TRASHED)->to(Field::create('trashed', 'Trashed')->bool());
            $table->mapProperty(Canine_Genetics::STATUS)->to(Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                ListingsStatusEnum::ACTIVE => 'Active',
                ListingsStatusEnum::INACTIVE => 'Inactive',
            ])->required());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}
