<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\IListingsRepository;
use App\Domain\Entities\Listings;
use Dms\Common\Structure\Field;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;
use App\Domain\Entities\Enums\ListingsTypeEnum;
use App\Domain\Entities\Enums\ListingsSexEnum;
use App\Domain\Entities\Enums\ListingsStatusEnum;
use App\Domain\Entities\Enums\BlueEnum;
use App\Domain\Entities\Enums\ChocolateEnum;
use App\Domain\Entities\Enums\AgoutiEnum;
use App\Domain\Entities\Enums\TestableChocolateEnum;
use App\Domain\Entities\Enums\FluffyEnum;
use App\Domain\Entities\Enums\E_mcirEnum;
use App\Domain\Entities\Enums\IntensityEnum;
use App\Domain\Entities\Enums\PiedEnum;
use App\Domain\Entities\Enums\BrindleEnum;
use App\Domain\Entities\Enums\MerleEnum;

/**
 * The listings module.
 */
class ListingsModule extends CrudModule
{
    /**
     * @var IUsersRepository
     */
    protected $usersRepository;


    public function __construct(IListingsRepository $dataSource, IAuthSystem $authSystem, IUsersRepository $usersRepository)
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
        $module->name('listings');

        $module->labelObjects()->fromProperty(Listings::TITLE);

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
                )->bindToProperty(Listings::BREEDER),
                //
                $form->field(
                    Field::create('title', 'Title')->string()->required()
                )->bindToProperty(Listings::TITLE),
                //
                $form->field(
                    Field::create('slug', 'Slug')->string()->required()
                )->bindToProperty(Listings::SLUG),
                //
                $form->field(
                    Field::create('description', 'Description')->html()->required()
                )->bindToProperty(Listings::DESCRIPTION),
                //
                $form->field(
                    Field::create('type', 'Type')->enum(ListingsTypeEnum::class, [
                        ListingsTypeEnum::STUD => 'Stud',
                        ListingsTypeEnum::PUPPY => 'Puppy',
                    ])->required()
                )->bindToProperty(Listings::TYPE),
                //
                $form->field(
                    Field::create('sex', 'Sex')->enum(ListingsSexEnum::class, [
                        ListingsSexEnum::MALE => 'Male',
                        ListingsSexEnum::FEMALE => 'Female',
                    ])->required()
                )->bindToProperty(Listings::SEX),
                //
                $form->field(
                    Field::create('dob', 'Dob')->date()->required()
                )->bindToProperty(Listings::DOB),
                //
                $form->field(
                    Field::create('photo1', 'Photo1')
                        ->image()
                        ->moveToPathWithRandomFileName(public_path('app/listings'))
                )->bindToProperty(Listings::PHOTO1),
                //
                $form->field(
                    Field::create('photo2', 'Photo2')
                        ->image()
                        ->moveToPathWithRandomFileName(public_path('app/listings'))
                )->bindToProperty(Listings::PHOTO2),
                //
                $form->field(
                    Field::create('photo3', 'Photo3')
                        ->image()
                        ->moveToPathWithRandomFileName(public_path('app/listings'))
                )->bindToProperty(Listings::PHOTO3),
                //
                $form->field(
                    Field::create('photo4', 'Photo4')
                        ->image()
                        ->moveToPathWithRandomFileName(public_path('app/listings'))
                )->bindToProperty(Listings::PHOTO4),
                //
                $form->field(
                    Field::create('photo5', 'Photo5')
                        ->image()
                        ->moveToPathWithRandomFileName(public_path('app/listings'))
                )->bindToProperty(Listings::PHOTO5),
                //
                $form->field(
                    Field::create('is_sponsored', 'Is Sponsored')->bool()
                )->bindToProperty(Listings::IS_SPONSORED),
                //
                $form->field(
                    Field::create('is_featured', 'Is Featured')->bool()
                )->bindToProperty(Listings::IS_FEATURED),
                //
                $form->field(
                    Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                        ListingsStatusEnum::ACTIVE => 'Active',
                        ListingsStatusEnum::INACTIVE => 'Inactive',
                    ])->required()
                )->bindToProperty(Listings::STATUS),
                //
                $form->field(
                    Field::create('blue', 'Blue')->enum(BlueEnum::class, [
                        BlueEnum::CARRIES_2COPIES => '2copies(d/d)',
                        BlueEnum::CARRIES_1COPY => '1copy( D/d)',
                        BlueEnum::DOES_NOT_CARRY => 'Doesnotcarry',
                        BlueEnum::UNKNOWN => 'Unknown',
                    ])
                )->bindToProperty(Listings::BLUE),
                //
                $form->field(
                    Field::create('chocolate', 'Chocolate')->enum(ChocolateEnum::class, [
                        ChocolateEnum::CARRIES_2COPIES => '2copies(co/co)',
                        ChocolateEnum::CARRIES_1COPY => '1copy( Co/co)',
                        ChocolateEnum::DOES_NOT_CARRY => 'Doesnotcarry',
                        ChocolateEnum::UNKNOWN => 'Unknown',
                    ])
                )->bindToProperty(Listings::CHOCOLATE),
                //
                $form->field(
                    Field::create('agouti', 'Agouti')->enum(AgoutiEnum::class, [
                        AgoutiEnum::A_A => '(a,a)',
                        AgoutiEnum::AY_A => '(ay,a)',
                        AgoutiEnum::AY_AT => '(ay,at)',
                        AgoutiEnum::AY_AY => '(ay,ay)',
                        AgoutiEnum::AT_A => '(at,a)',
                        AgoutiEnum::AT_AT => '(at,at)',
                    ])
                )->bindToProperty(Listings::AGOUTI),
                //
                $form->field(
                    Field::create('testable_chocolate', 'Testable Chocolate')->enum(TestableChocolateEnum::class, [
                        TestableChocolateEnum::CARRIES_2COPIES => '2copies(b/b)',
                        TestableChocolateEnum::CARRIES_1COPY => '1copy( B/b)',
                        TestableChocolateEnum::DOES_NOT_CARRY => 'Doesnotcarry',
                        TestableChocolateEnum::UNKNOWN => 'Unknown',
                    ])
                )->bindToProperty(Listings::TESTABLE_CHOCOLATE),
                //
                $form->field(
                    Field::create('fluffy', 'Fluffy')->enum(FluffyEnum::class, [
                        FluffyEnum::CARRIES_2COPIES => '2copies(l/l)',
                        FluffyEnum::CARRIES_1COPY => '1copy( L/l)',
                        FluffyEnum::DOES_NOT_CARRY => 'Doesnotcarry',
                        FluffyEnum::UNKNOWN => 'Unknown',
                    ])
                )->bindToProperty(Listings::FLUFFY),
                //
                $form->field(
                    Field::create('e_mcir', 'E Mcir')->enum(E_mcirEnum::class, [
                        E_mcirEnum::EM_EM => '( E M, E M)',
                        E_mcirEnum::EM_E => '( E M, E)',
                        E_mcirEnum::EM_e => '( E M,e)',
                        E_mcirEnum::E_E => '( E, E)',
                        E_mcirEnum::E_e => '( E,e)',
                        E_mcirEnum::e_e => '(e,e)',
                    ])
                )->bindToProperty(Listings::E_MCIR),
                //
                $form->field(
                    Field::create('intensity', 'Intensity')->enum(IntensityEnum::class, [
                        IntensityEnum::CARRIES_2COPIES => '2copies(i/i)',
                        IntensityEnum::CARRIES_1COPY => '1copy( I/i)',
                        IntensityEnum::DOES_NOT_CARRY => 'Doesnotcarry',
                        IntensityEnum::UNKNOWN => 'Unknown',
                    ])
                )->bindToProperty(Listings::INTENSITY),
                //
                $form->field(
                    Field::create('pied', 'Pied')->enum(PiedEnum::class, [
                        PiedEnum::CARRIES_2COPIES => '2copies(s/s)',
                        PiedEnum::CARRIES_1COPY => '1copy(s/ N)',
                        PiedEnum::DOES_NOT_CARRY => 'Doesnotcarry',
                        PiedEnum::UNKNOWN => 'Unknown',
                    ])
                )->bindToProperty(Listings::PIED),
                //
                $form->field(
                    Field::create('brindle', 'Brindle')->enum(BrindleEnum::class, [
                        BrindleEnum::YES => 'Yes',
                        BrindleEnum::NO => 'No',
                        BrindleEnum::UNKNOWN => 'Unknown',
                    ])
                )->bindToProperty(Listings::BRINDLE),
                //
                $form->field(
                    Field::create('merle', 'Merle')->enum(MerleEnum::class, [
                        MerleEnum::YES => 'Yes',
                        MerleEnum::NO => 'No',
                        MerleEnum::UNKNOWN => 'Unknown',
                    ])
                )->bindToProperty(Listings::MERLE),
                //
                $form->field(
                    Field::create('trashed', 'Trashed')->bool()
                )->bindToProperty(Listings::TRASHED),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(Listings::BREEDER)->to(Field::create('breeder', 'Breeder')
                ->entityFrom($this->usersRepository)
                ->required()
                ->labelledBy(Users::FIRST_NAME));
            $table->mapProperty(Listings::TITLE)->to(Field::create('title', 'Title')->string()->required());
//            $table->mapProperty(Listings::SLUG)->to(Field::create('slug', 'Slug')->string()->required());
            $table->mapProperty(Listings::DESCRIPTION)->to(Field::create('description', 'Description')->html()->required());
            $table->mapProperty(Listings::TYPE)->to(Field::create('type', 'Type')->enum(ListingsTypeEnum::class, [
                ListingsTypeEnum::STUD => 'Stud',
                ListingsTypeEnum::PUPPY => 'Puppy',
            ])->required());
            $table->mapProperty(Listings::SEX)->to(Field::create('sex', 'Sex')->enum(ListingsSexEnum::class, [
                ListingsSexEnum::MALE => 'Male',
                ListingsSexEnum::FEMALE => 'Female',
            ])->required());
            $table->mapProperty(Listings::DOB)->to(Field::create('dob', 'Dob')->date()->required());
            $table->mapProperty(Listings::PHOTO1)->to(Field::create('photo1', 'Photo1')
                ->image()
                ->moveToPathWithRandomFileName(public_path('app/listings')));
//            $table->mapProperty(Listings::PHOTO2)->to(Field::create('photo2', 'Photo2')
//                ->image()
//                ->moveToPathWithRandomFileName(public_path('app/listings')));
//            $table->mapProperty(Listings::PHOTO3)->to(Field::create('photo3', 'Photo3')
//                ->image()
//                ->moveToPathWithRandomFileName(public_path('app/listings')));
//            $table->mapProperty(Listings::PHOTO4)->to(Field::create('photo4', 'Photo4')
//                ->image()
//                ->moveToPathWithRandomFileName(public_path('app/listings')));
//            $table->mapProperty(Listings::PHOTO5)->to(Field::create('photo5', 'Photo5')
//                ->image()
//                ->moveToPathWithRandomFileName(public_path('app/listings')));
            $table->mapProperty(Listings::IS_SPONSORED)->to(Field::create('is_sponsored', 'Is Sponsored')->bool());
            $table->mapProperty(Listings::IS_FEATURED)->to(Field::create('is_featured', 'Is Featured')->bool());
            $table->mapProperty(Listings::STATUS)->to(Field::create('status', 'Status')->enum(ListingsStatusEnum::class, [
                ListingsStatusEnum::ACTIVE => 'Active',
                ListingsStatusEnum::INACTIVE => 'Inactive',
            ])->required());
//            $table->mapProperty(Listings::BLUE)->to(Field::create('blue', 'Blue')->enum(BlueEnum::class, [
//                BlueEnum::CARRIES_2COPIES => '2copies(d/d)',
//                BlueEnum::CARRIES_1COPY => '1copy( D/d)',
//                BlueEnum::DOES_NOT_CARRY => 'Doesnotcarry',
//                BlueEnum::UNKNOWN => 'Unknown',
//            ]));
//            $table->mapProperty(Listings::CHOCOLATE)->to(Field::create('chocolate', 'Chocolate')->enum(ChocolateEnum::class, [
//                ChocolateEnum::CARRIES_2COPIES => '2copies(co/co)',
//                ChocolateEnum::CARRIES_1COPY => '1copy( Co/co)',
//                ChocolateEnum::DOES_NOT_CARRY => 'Doesnotcarry',
//                ChocolateEnum::UNKNOWN => 'Unknown',
//            ]));
//            $table->mapProperty(Listings::AGOUTI)->to(Field::create('agouti', 'Agouti')->enum(AgoutiEnum::class, [
//                AgoutiEnum::A_A => '(a,a)',
//                AgoutiEnum::AY_A => '(ay,a)',
//                AgoutiEnum::AY_AT => '(ay,at)',
//                AgoutiEnum::AY_AY => '(ay,ay)',
//                AgoutiEnum::AT_A => '(at,a)',
//                AgoutiEnum::AT_AT => '(at,at)',
//            ]));
//            $table->mapProperty(Listings::TESTABLE_CHOCOLATE)->to(Field::create('testable_chocolate', 'Testable Chocolate')->enum(TestableChocolateEnum::class, [
//                TestableChocolateEnum::CARRIES_2COPIES => '2copies(b/b)',
//                TestableChocolateEnum::CARRIES_1COPY => '1copy( B/b)',
//                TestableChocolateEnum::DOES_NOT_CARRY => 'Doesnotcarry',
//                TestableChocolateEnum::UNKNOWN => 'Unknown',
//            ]));
//            $table->mapProperty(Listings::FLUFFY)->to(Field::create('fluffy', 'Fluffy')->enum(FluffyEnum::class, [
//                FluffyEnum::CARRIES_2COPIES => '2copies(l/l)',
//                FluffyEnum::CARRIES_1COPY => '1copy( L/l)',
//                FluffyEnum::DOES_NOT_CARRY => 'Doesnotcarry',
//                FluffyEnum::UNKNOWN => 'Unknown',
//            ]));
//            $table->mapProperty(Listings::E_MCIR)->to(Field::create('e_mcir', 'E Mcir')->enum(E_mcirEnum::class, [
//                E_mcirEnum::EM_EM => '( E M, E M)',
//                E_mcirEnum::EM_E => '( E M, E)',
//                E_mcirEnum::EM_e => '( E M,e)',
//                E_mcirEnum::E_E => '( E, E)',
//                E_mcirEnum::E_e => '( E,e)',
//                E_mcirEnum::e_e => '(e,e)',
//            ]));
//            $table->mapProperty(Listings::INTENSITY)->to(Field::create('intensity', 'Intensity')->enum(IntensityEnum::class, [
//                IntensityEnum::CARRIES_2COPIES => '2copies(i/i)',
//                IntensityEnum::CARRIES_1COPY => '1copy( I/i)',
//                IntensityEnum::DOES_NOT_CARRY => 'Doesnotcarry',
//                IntensityEnum::UNKNOWN => 'Unknown',
//            ]));
//            $table->mapProperty(Listings::PIED)->to(Field::create('pied', 'Pied')->enum(PiedEnum::class, [
//                PiedEnum::CARRIES_2COPIES => '2copies(s/s)',
//                PiedEnum::CARRIES_1COPY => '1copy(s/ N)',
//                PiedEnum::DOES_NOT_CARRY => 'Doesnotcarry',
//                PiedEnum::UNKNOWN => 'Unknown',
//            ]));
//            $table->mapProperty(Listings::BRINDLE)->to(Field::create('brindle', 'Brindle')->enum(BrindleEnum::class, [
//                BrindleEnum::YES => 'Yes',
//                BrindleEnum::NO => 'No',
//                BrindleEnum::UNKNOWN => 'Unknown',
//            ]));
//            $table->mapProperty(Listings::MERLE)->to(Field::create('merle', 'Merle')->enum(MerleEnum::class, [
//                MerleEnum::YES => 'Yes',
//                MerleEnum::NO => 'No',
//                MerleEnum::UNKNOWN => 'Unknown',
//            ]));
            $table->mapProperty(Listings::TRASHED)->to(Field::create('trashed', 'Trashed')->bool());


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}
