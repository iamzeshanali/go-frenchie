<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\IMakeAddRepository;
use App\Domain\Entities\MakeAdd;
use Dms\Common\Structure\Field;
use App\Domain\Entities\Enums\ListingsStatusEnum;

/**
 * The make-add module.
 */
class MakeAddModule extends CrudModule
{


    public function __construct(IMakeAddRepository $dataSource, IAuthSystem $authSystem)
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
        $module->name('make-add');

        $module->labelObjects()->fromProperty(/* FIXME: */ MakeAdd::ID);

        $module->metadata([
            'icon' => ''
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('photo', 'Photo')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/make_add'))
                )->bindToProperty(MakeAdd::PHOTO),
                //
                $form->field(
                    Field::create('url', 'Url')->url()->required()
                )->bindToProperty(MakeAdd::URL),
                //
                $form->field(
                    Field::create('trashed', 'Trashed')->bool()
                )->bindToProperty(MakeAdd::TRASHED),
                //
                $form->field(
                    Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                        ListingsStatusEnum::ACTIVE => 'Active',
                        ListingsStatusEnum::INACTIVE => 'Inactive',
                    ])->required()
                )->bindToProperty(MakeAdd::STATUS),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(MakeAdd::PHOTO)->to(Field::create('photo', 'Photo')
                ->image()
                ->required()
                ->moveToPathWithRandomFileName(public_path('app/make_add')));
            $table->mapProperty(MakeAdd::URL)->to(Field::create('url', 'Url')->url()->required());
            $table->mapProperty(MakeAdd::TRASHED)->to(Field::create('trashed', 'Trashed')->bool());
            $table->mapProperty(MakeAdd::STATUS)->to(Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                ListingsStatusEnum::ACTIVE => 'Active',
                ListingsStatusEnum::INACTIVE => 'Inactive',
            ])->required());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}