<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\IApiConfigRepository;
use App\Domain\Entities\ApiConfig;
use Dms\Common\Structure\Field;

/**
 * The api-config module.
 */
class ApiConfigModule extends CrudModule
{


    public function __construct(IApiConfigRepository $dataSource, IAuthSystem $authSystem)
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
        $module->name('api-config');

        $module->labelObjects()->fromProperty(ApiConfig::TOKEN);

        $module->metadata([
            'icon' => ''
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('token', 'Token')->string()->required()
                )->bindToProperty(ApiConfig::TOKEN),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(ApiConfig::TOKEN)->to(Field::create('token', 'Token')->string()->required());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}