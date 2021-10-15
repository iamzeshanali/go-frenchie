<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Common\Structure\Web\Html;
use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\IApiConfigRepository;
use App\Domain\Entities\ApiConfig;
use Dms\Common\Structure\Field;
use http\Url;

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
        $module->action('change-zipcode-api')
            ->returns(Html::class)
            ->handler(function () {

                return new Html('
                             <h3>Follow these instructions to change the API:</h3>
                             <ol>
                             <li>Visit the link given below and copy the Demo API from the Input field.</li>
                             <li>Close this popup box and edit the existing row in ApiConfig table.</li>
                             <li>Paste the copied API content to the existing Field.</li>
                             <li>Save the field and you are good to Go..</li>
                             </ol>
                            <a href="https://www.zipcodeapi.com/API#radius" target="_blank">Click here to change API</a>
                            ');
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
