<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\ILittersRepository;
use App\Domain\Entities\Litters;
use Dms\Common\Structure\Field;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;
use App\Domain\Entities\Enums\ListingsStatusEnum;

/**
 * The litters module.
 */
class LittersModule extends CrudModule
{
    /**
     * @var IUsersRepository
     */
    protected $usersRepository;


    public function __construct(ILittersRepository $dataSource, IAuthSystem $authSystem, IUsersRepository $usersRepository)
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
        $module->name('litters');

        $module->labelObjects()->fromProperty(Litters::SLUG);

        $module->metadata([
            'icon' => ''
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('breeder', 'Breeder')
                        ->entityFrom($this->usersRepository)
                        ->required()
                        ->labelledBy(Users::FIRST_NAME)
                )->bindToProperty(Litters::BREEDER),
                //
                $form->field(
                    Field::create('slug', 'Slug')->string()->required()
                )->bindToProperty(Litters::SLUG),
                //
                $form->field(
                    Field::create('title', 'Title')->string()->required()
                )->bindToProperty(Litters::TITLE),
                //
                $form->field(
                    Field::create('decription', 'Decription')->string()->required()
                )->bindToProperty(Litters::DESCRIPTION),
                //
                $form->field(
                    Field::create('expected_dob', 'Expected Dob')->date()->required()
                )->bindToProperty(Litters::EXPECTED_DOB),
                //
                $form->field(
                    Field::create('photo1', 'Photo1')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/litters'))
                )->bindToProperty(Litters::PHOTO1),
                //
                $form->field(
                    Field::create('photo2', 'Photo2')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/litters'))
                )->bindToProperty(Litters::PHOTO2),
                //
                $form->field(
                    Field::create('photo3', 'Photo3')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/litters'))
                )->bindToProperty(Litters::PHOTO3),
                //
                $form->field(
                    Field::create('photo4', 'Photo4')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/litters'))
                )->bindToProperty(Litters::PHOTO4),
                //
                $form->field(
                    Field::create('photo5', 'Photo5')
                        ->image()
                        ->required()
                        ->moveToPathWithRandomFileName(public_path('app/litters'))
                )->bindToProperty(Litters::PHOTO5),
                //
                $form->field(
                    Field::create('is_sponsored', 'Is Sponsored')->bool()
                )->bindToProperty(Litters::IS_SPONSORED),
                //
                $form->field(
                    Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                        ListingsStatusEnum::ACTIVE => 'Active',
                        ListingsStatusEnum::INACTIVE => 'Inactive',
                    ])->required()
                )->bindToProperty(Litters::STATUS),
                //
                $form->field(
                    Field::create('dam', 'Dam')->string()->required()
                )->bindToProperty(Litters::DAM),
                //
                $form->field(
                    Field::create('sire', 'Sire')->string()->required()
                )->bindToProperty(Litters::SIRE),
                //
                $form->field(
                    Field::create('trashed', 'Trashed')->bool()
                )->bindToProperty(Litters::TRASHED),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(Litters::BREEDER)->to(Field::create('breeder', 'Breeder')
                ->entityFrom($this->usersRepository)
                ->required()
                ->labelledBy(Users::USERNAME));
//            $table->mapProperty(Litters::SLUG)->to(Field::create('slug', 'Slug')->string()->required());
            $table->mapProperty(Litters::TITLE)->to(Field::create('title', 'Title')->string()->required());
//            $table->mapProperty(Litters::DESCRIPTION)->to(Field::create('decription', 'Decription')->string()->required());
//            $table->mapProperty(Litters::EXPECTED_DOB)->to(Field::create('expected_dob', 'Expected Dob')->date()->required());
            $table->mapProperty(Litters::PHOTO1)->to(Field::create('photo1', 'Photo1')
                ->image()
                ->required()
                ->moveToPathWithRandomFileName(public_path('app/litters')));
//            $table->mapProperty(Litters::PHOTO2)->to(Field::create('photo2', 'Photo2')
//                ->image()
//                ->required()
//                ->moveToPathWithRandomFileName(public_path('app/litters')));
//            $table->mapProperty(Litters::PHOTO3)->to(Field::create('photo3', 'Photo3')
//                ->image()
//                ->required()
//                ->moveToPathWithRandomFileName(public_path('app/litters')));
//            $table->mapProperty(Litters::PHOTO4)->to(Field::create('photo4', 'Photo4')
//                ->image()
//                ->required()
//                ->moveToPathWithRandomFileName(public_path('app/litters')));
//            $table->mapProperty(Litters::PHOTO5)->to(Field::create('photo5', 'Photo5')
//                ->image()
//                ->required()
//                ->moveToPathWithRandomFileName(public_path('app/litters')));
            $table->mapProperty(Litters::IS_SPONSORED)->to(Field::create('is_sponsored', 'Is Sponsored')->bool());
            $table->mapProperty(Litters::STATUS)->to(Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                ListingsStatusEnum::ACTIVE => 'Active',
                ListingsStatusEnum::INACTIVE => 'Inactive',
            ])->required());
//            $table->mapProperty(Litters::DAM)->to(Field::create('dam', 'Dam')->string()->required());
//            $table->mapProperty(Litters::SIRE)->to(Field::create('sire', 'Sire')->string()->required());
//            $table->mapProperty(Litters::TRASHED)->to(Field::create('trashed', 'Trashed')->bool());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}
