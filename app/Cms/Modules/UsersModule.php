<?php declare(strict_types = 1);

namespace App\Cms\Modules;

use Dms\Core\Auth\IAuthSystem;
use Dms\Core\Common\Crud\CrudModule;
use Dms\Core\Common\Crud\Definition\CrudModuleDefinition;
use Dms\Core\Common\Crud\Definition\Form\CrudFormDefinition;
use Dms\Core\Common\Crud\Definition\Table\SummaryTableDefinition;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;
use Dms\Common\Structure\Field;
use App\Domain\Entities\Enums\UserRoleEnum;

/**
 * The users module.
 */
class UsersModule extends CrudModule
{


    public function __construct(IUsersRepository $dataSource, IAuthSystem $authSystem)
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
        $module->name('users');

        $module->labelObjects()->fromProperty(Users::FIRST_NAME);

        $module->metadata([
            'icon' => ''
        ]);

        $module->crudForm(function (CrudFormDefinition $form) {
            $form->section('Details', [
                $form->field(
                    Field::create('first_name', 'First Name')->string()
                )->bindToProperty(Users::FIRST_NAME),
                //
                $form->field(
                    Field::create('last_name', 'Last Name')->string()
                )->bindToProperty(Users::LAST_NAME),
                //
                $form->field(
                    Field::create('username', 'Username')->string()->required()
                )->bindToProperty(Users::USERNAME),
                //
                $form->field(
                    Field::create('role', 'Role')->enum(UserRoleEnum::class, [
                        UserRoleEnum::BREEDER => 'Breeder',
                        UserRoleEnum::CUSTOMER => 'Customer',
                    ])->required()
                )->bindToProperty(Users::ROLE),
                //
                $form->field(
                    Field::create('is_active', 'Is Active')->bool()
                )->bindToProperty(Users::IS_ACTIVE),
                //
                $form->field(
                    Field::create('hashed_password', 'Hashed Password')->string()->required()
                )->bindToProperty(Users::HASHED_PASSWORD),
                //
                $form->field(
                    Field::create('remember_token', 'Remember Token')->string()
                )->bindToProperty(Users::REMEMBER_TOKEN),
                //
                $form->field(
                    Field::create('email', 'Email')->email()->required()
                )->bindToProperty(Users::EMAIL),
                //
                $form->field(
                    Field::create('phone', 'Phone')->string()
                )->bindToProperty(Users::PHONE),
                //
                $form->field(
                    Field::create('kennel_name', 'Kennel Name')->string()
                )->bindToProperty(Users::KENNEL_NAME),
                //
                $form->field(
                    Field::create('profile_image', 'Profile Image')
                        ->image()
                        ->moveToPathWithRandomFileName(public_path('app/users'))
                )->bindToProperty(Users::PROFILE_IMAGE),
                //
                $form->field(
                    Field::create('address', 'Address')->string()
                )->bindToProperty(Users::ADDRESS),
                //
                $form->field(
                    Field::create('zip', 'Zip')->string()
                )->bindToProperty(Users::ZIP),
                //
                $form->field(
                    Field::create('state', 'State')->string()
                )->bindToProperty(Users::STATE),
                //
                $form->field(
                    Field::create('city', 'City')->string()
                )->bindToProperty(Users::CITY),
                //
                $form->field(
                    Field::create('fb_account_url', 'Fb Account Url')->url()
                )->bindToProperty(Users::FB_ACCOUNT),
                //
                $form->field(
                    Field::create('ig_account_url', 'Ig Account Url')->url()
                )->bindToProperty(Users::IG_ACCOUNT),
                //
                $form->field(
                    Field::create('website', 'Website')->url()
                )->bindToProperty(Users::WEBSITE),
                //
                $form->field(
                    Field::create('logo', 'Logo')
                        ->image()
                        ->moveToPathWithRandomFileName(public_path('app/users'))
                )->bindToProperty(Users::LOGO),
                //
            ]);

        });

        $module->removeAction()->deleteFromDataSource();

        $module->summaryTable(function (SummaryTableDefinition $table) {
            $table->mapProperty(Users::FIRST_NAME)->to(Field::create('first_name', 'First Name')->string());
            $table->mapProperty(Users::LAST_NAME)->to(Field::create('last_name', 'Last Name')->string());
            $table->mapProperty(Users::USERNAME)->to(Field::create('username', 'Username')->string()->required());
            $table->mapProperty(Users::ROLE)->to(Field::create('role', 'Role')->enum(UserRoleEnum::class, [
                UserRoleEnum::BREEDER => 'Breeder',
                UserRoleEnum::CUSTOMER => 'Customer',
            ])->required());
            $table->mapProperty(Users::IS_ACTIVE)->to(Field::create('is_active', 'Is Active')->bool());
            $table->mapProperty(Users::HASHED_PASSWORD)->to(Field::create('hashed_password', 'Hashed Password')->string()->required());
            $table->mapProperty(Users::REMEMBER_TOKEN)->to(Field::create('remember_token', 'Remember Token')->string());
            $table->mapProperty(Users::EMAIL)->to(Field::create('email', 'Email')->email()->required());
            $table->mapProperty(Users::PHONE)->to(Field::create('phone', 'Phone')->string());
            $table->mapProperty(Users::KENNEL_NAME)->to(Field::create('kennel_name', 'Kennel Name')->string());
            $table->mapProperty(Users::PROFILE_IMAGE)->to(Field::create('profile_image', 'Profile Image')
                ->image()
                ->moveToPathWithRandomFileName(public_path('app/users')));
            $table->mapProperty(Users::ADDRESS)->to(Field::create('address', 'Address')->string());
            $table->mapProperty(Users::ZIP)->to(Field::create('zip', 'Zip')->string());
            $table->mapProperty(Users::STATE)->to(Field::create('state', 'State')->string());
            $table->mapProperty(Users::CITY)->to(Field::create('city', 'City')->string());
            $table->mapProperty(Users::FB_ACCOUNT)->to(Field::create('fb_account_url', 'Fb Account Url')->url());
            $table->mapProperty(Users::IG_ACCOUNT)->to(Field::create('ig_account_url', 'Ig Account Url')->url());
            $table->mapProperty(Users::WEBSITE)->to(Field::create('website', 'Website')->url());
            $table->mapProperty(Users::LOGO)->to(Field::create('logo', 'Logo')
                ->image()
                ->moveToPathWithRandomFileName(public_path('app/users')));


            $table->view('all', 'All')
                ->loadAll()
                ->asDefault();
        });
    }
}