<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\IAdvertiseRepository;
use App\Domain\Entities\Advertise;
use Dms\Common\Structure\Field;
use App\Domain\Entities\Enums\ListingsStatusEnum;

/**
 * The advertise module.
 */
class AdvertiseModule extends CrudModule
{


    public function __construct(IAdvertiseRepository $dataSource, IAuthSystem $authSystem)
    {

        parent::__construct($dataSource, $authSystem);
    }

    /**
     * Defines the structure of this module.
     *
     * @param CrudModuleDefinition $module
     */
    protected function defineCrudModule(CrudModuleDefinition $module)
    {
        $module->name('advertise');

        $module->labelObjects()->fromProperty(/* FIXME: */ Advertise::ID);

        $module->metadata([
            'icon' => ''
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('photo', 'Photo')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/advertise'))
                )->bindToProperty(Advertise::PHOTO),
                //
                $form->field(
                    Field::create('url', 'Url')->url()->required()
                )->bindToProperty(Advertise::URL),
                //
                $form->field(
                    Field::create('trashed', 'Trashed')->bool()
                )->bindToProperty(Advertise::TRASHED),
                //
                $form->field(
                    Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                        ListingsStatusEnum::ACTIVE => 'Active',
                        ListingsStatusEnum::INACTIVE => 'Inactive',
                    ])->required()
                )->bindToProperty(Advertise::STATUS),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(Advertise::PHOTO)->to(Field::create('photo', 'Photo')
                ->image()
                ->required()
                ->moveToPathWithRandomFileName(public_path('app/advertise')));
            $table->mapProperty(Advertise::URL)->to(Field::create('url', 'Url')->url()->required());
            $table->mapProperty(Advertise::TRASHED)->to(Field::create('trashed', 'Trashed')->bool());
            $table->mapProperty(Advertise::STATUS)->to(Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                ListingsStatusEnum::ACTIVE => 'Active',
                ListingsStatusEnum::INACTIVE => 'Inactive',
            ])->required());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}