<?php declare(strict_types = 1);

namespace App\Cms\Modules\Auth;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\Auth\IPasswordResetRepository;
use App\Domain\Entities\Auth\PasswordReset;
use Dms\Common\Structure\Field;

/**
 * The password-reset module.
 */
class PasswordResetModule extends CrudModule
{


    public function __construct(IPasswordResetRepository $dataSource, IAuthSystem $authSystem)
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
        $module->name('password-reset');

        $module->labelObjects()->fromProperty(PasswordReset::TOKEN);

        $module->metadata([
            'icon' => ''
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('email', 'Email')->email()->required()
                )->bindToProperty(PasswordReset::EMAIL),
                //
                $form->field(
                    Field::create('token', 'Token')->string()->required()
                )->bindToProperty(PasswordReset::TOKEN),
                //
                $form->field(
                    Field::create('created_at', 'Created At')->dateTime()
                )->bindToProperty(PasswordReset::CREATED_AT),
                //
                $form->field(
                    Field::create('updated_at', 'Updated At')->dateTime()
                )->bindToProperty(PasswordReset::UPDATED_AT),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(PasswordReset::EMAIL)->to(Field::create('email', 'Email')->email()->required());
            $table->mapProperty(PasswordReset::TOKEN)->to(Field::create('token', 'Token')->string()->required());
            $table->mapProperty(PasswordReset::CREATED_AT)->to(Field::create('created_at', 'Created At')->dateTime());
            $table->mapProperty(PasswordReset::UPDATED_AT)->to(Field::create('updated_at', 'Updated At')->dateTime());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}