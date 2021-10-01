<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\IEmailLogsRepository;
use App\Domain\Entities\EmailLogs;
use Dms\Common\Structure\Field;

/**
 * The email-logs module.
 */
class EmailLogsModule extends CrudModule
{


    public function __construct(IEmailLogsRepository $dataSource, IAuthSystem $authSystem)
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
        $module->name('email-logs');

        $module->labelObjects()->fromProperty(EmailLogs::NAME);

        $module->metadata([
            'icon' => ''
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('name', 'Name')->string()
                )->bindToProperty(EmailLogs::NAME),
                //
                $form->field(
                    Field::create('from', 'From')->email()->required()
                )->bindToProperty(EmailLogs::FROM),
                //
                $form->field(
                    Field::create('to', 'To')->html()
                )->bindToProperty(EmailLogs::TO),
                //
                $form->field(
                    Field::create('subject', 'Subject')->string()
                )->bindToProperty(EmailLogs::SUBJECT),
                //
                $form->field(
                    Field::create('message', 'Message')->html()
                )->bindToProperty(EmailLogs::MESSAGE),
                //
                $form->field(
                    Field::create('other_data', 'Other Data')->html()
                )->bindToProperty(EmailLogs::OTHER_DATA),
                //
//                $form->field(
//                    Field::create('sent_time', 'Sent Time')->string()
//                )->bindToProperty(EmailLogs::SENT_TIME),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(EmailLogs::NAME)->to(Field::create('name', 'Name')->string());
            $table->mapProperty(EmailLogs::FROM)->to(Field::create('from', 'From')->email()->required());
            $table->mapProperty(EmailLogs::TO)->to(Field::create('to', 'To')->html()->required());
            $table->mapProperty(EmailLogs::SUBJECT)->to(Field::create('subject', 'Subject')->string());
            $table->mapProperty(EmailLogs::MESSAGE)->to(Field::create('message', 'Message')->html());
            $table->mapProperty(EmailLogs::OTHER_DATA)->to(Field::create('other_data', 'Other Data')->html());
            $table->mapProperty(EmailLogs::SENT_TIME)->to(Field::create('sent_time', 'Sent Time')->string());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}
