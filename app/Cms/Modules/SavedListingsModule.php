<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\ISavedListingsRepository;
use App\Domain\Entities\SavedListings;
use Dms\Common\Structure\Field;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;
use App\Domain\Services\Persistence\IListingsRepository;
use App\Domain\Entities\Listings;

/**
 * The saved-listings module.
 */
class SavedListingsModule extends CrudModule
{
    /**
     * @var IUsersRepository
     */
    protected $usersRepository;

    /**
     * @var IListingsRepository
     */
    protected $listingsRepository;


    public function __construct(ISavedListingsRepository $dataSource, IAuthSystem $authSystem, IUsersRepository $usersRepository, IListingsRepository $listingsRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->listingsRepository = $listingsRepository;
        parent::__construct($dataSource, $authSystem);
    }

    /**
     * Defines the structure of this module.
     *
     * @param CrudModuleDefinition $module
     */
    protected function defineCrudModule(CrudModuleDefinition $module)
    {
        $module->name('saved-listings');

        $module->labelObjects()->fromProperty(/* FIXME: */ SavedListings::ID);

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
                )->bindToProperty(SavedListings::CUSTOMER),
                //
                $form->field(
                    Field::create('listings', 'Listings')
                        ->entityFrom($this->listingsRepository)
                        ->required()
                        ->labelledBy(Listings::TITLE)
                )->bindToProperty(SavedListings::LISTINGS),
                //
                $form->field(
                    Field::create('trashed', 'Trashed')->bool()
                )->bindToProperty(SavedListings::TRASHED),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(SavedListings::CUSTOMER)->to(Field::create('customer', 'Customer')
                ->entityFrom($this->usersRepository)
                ->required()
                ->labelledBy(Users::USERNAME));
            $table->mapProperty(SavedListings::LISTINGS)->to(Field::create('listings', 'Listings')
                ->entityFrom($this->listingsRepository)
                ->required()
                ->labelledBy(Listings::TITLE));
            $table->mapProperty(SavedListings::TRASHED)->to(Field::create('trashed', 'Trashed')->bool());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}
