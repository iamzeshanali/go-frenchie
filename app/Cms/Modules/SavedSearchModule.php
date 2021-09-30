<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\ISavedSearchRepository;
use App\Domain\Entities\SavedSearch;
use Dms\Common\Structure\Field;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;

/**
 * The saved-search module.
 */
class SavedSearchModule extends CrudModule
{
    /**
     * @var IUsersRepository
     */
    protected $usersRepository;


    public function __construct(ISavedSearchRepository $dataSource, IAuthSystem $authSystem, IUsersRepository $usersRepository)
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
        $module->name('saved-search');

        $module->labelObjects()->fromProperty(SavedSearch::DNA_COLOR);

        $module->metadata([
            'icon' => 'eercast'
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('user', 'User')
                        ->entityFrom($this->usersRepository)
                        ->required()
                        ->labelledBy(Users::FIRST_NAME)
                )->bindToProperty(SavedSearch::USER),
                //
                $form->field(
                    Field::create('dna_color', 'Dna Color')->string()
                )->bindToProperty(SavedSearch::DNA_COLOR),
                //
                $form->field(
                    Field::create('dna_coat', 'Dna Coat')->string()
                )->bindToProperty(SavedSearch::DNA_COAT),
                //
                $form->field(
                    Field::create('zip', 'Zip')->string()
                )->bindToProperty(SavedSearch::ZIP),
                //
                $form->field(
                    Field::create('type', 'Type')->string()
                )->bindToProperty(SavedSearch::TYPE),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(SavedSearch::USER)->to(Field::create('user', 'User')
                ->entityFrom($this->usersRepository)
                ->required()
                ->labelledBy(Users::USERNAME));
            $table->mapProperty(SavedSearch::DNA_COLOR)->to(Field::create('dna_color', 'Dna Color')->string());
            $table->mapProperty(SavedSearch::DNA_COAT)->to(Field::create('dna_coat', 'Dna Coat')->string());
            $table->mapProperty(SavedSearch::ZIP)->to(Field::create('zip', 'Zip')->string());
            $table->mapProperty(SavedSearch::TYPE)->to(Field::create('type', 'Type')->string());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}
