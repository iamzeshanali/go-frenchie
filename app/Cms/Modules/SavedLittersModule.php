<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\ISavedLittersRepository;
use App\Domain\Entities\SavedLitters;
use Dms\Common\Structure\Field;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;
use App\Domain\Services\Persistence\ILittersRepository;
use App\Domain\Entities\Litters;

/**
 * The saved-litters module.
 */
class SavedLittersModule extends CrudModule
{
    /**
     * @var IUsersRepository
     */
    protected $usersRepository;

    /**
     * @var ILittersRepository
     */
    protected $littersRepository;


    public function __construct(ISavedLittersRepository $dataSource, IAuthSystem $authSystem, IUsersRepository $usersRepository, ILittersRepository $littersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->littersRepository = $littersRepository;
        parent::__construct($dataSource, $authSystem);
    }

    /**
     * Defines the structure of this module.
     *
     * @param CrudModuleDefinition $module
     */
    protected function defineCrudModule(CrudModuleDefinition $module)
    {
        $module->name('saved-litters');

        $module->labelObjects()->fromProperty(/* FIXME: */ SavedLitters::ID);

        $module->metadata([
            'icon' => ''
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('customer', 'Customer')
                        ->entityFrom($this->usersRepository)
                        ->required()
                        ->labelledBy(Users::FIRST_NAME)
                )->bindToProperty(SavedLitters::CUSTOMER),
                //
                $form->field(
                    Field::create('litters', 'Litters')
                        ->entityFrom($this->littersRepository)
                        ->required()
                        ->labelledBy(Litters::TITLE)
                )->bindToProperty(SavedLitters::LITTERS),
                //
                $form->field(
                    Field::create('trashed', 'Trashed')->bool()
                )->bindToProperty(SavedLitters::TRASHED),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(SavedLitters::CUSTOMER)->to(Field::create('customer', 'Customer')
                ->entityFrom($this->usersRepository)
                ->required()
                ->labelledBy(Users::FIRST_NAME));
            $table->mapProperty(SavedLitters::LITTERS)->to(Field::create('litters', 'Litters')
                ->entityFrom($this->littersRepository)
                ->required()
                ->labelledBy(Litters::TITLE));
            $table->mapProperty(SavedLitters::TRASHED)->to(Field::create('trashed', 'Trashed')->bool());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}