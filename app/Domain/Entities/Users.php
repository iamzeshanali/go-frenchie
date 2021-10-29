<?php


namespace App\Domain\Entities;


use App\Domain\Entities\Enums\UserRoleEnum;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Web\EmailAddress;
use Dms\Common\Structure\Web\Url;
use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class Users extends Entity implements Authenticatable, CanResetPassword
{
    const FIRST_NAME = 'firstName';
    const LAST_NAME = 'lastName';
    const USERNAME = 'username';
    const ROLE = 'role';
    const IS_ACTIVE = 'isActive';
    const HASHED_PASSWORD = 'hashedPassword';
    const REMEMBER_TOKEN = 'rememberToken';
    const EMAIL = 'email';
    const PHONE = 'phone';
    const KENNEL_NAME = 'kennelName';
    const PROFILE_IMAGE = 'profileImage';
    const ADDRESS = 'address';
    const ZIP = 'zip';
    const STATE = 'state';
    const CITY = 'city';
    const FB_ACCOUNT = 'fbAccountUrl';
    const IG_ACCOUNT = 'igAccountUrl';
    const WEBSITE = 'website';
    const LOGO = 'logo';

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $username;

    /**
     * @var UserRoleEnum
     */
    public $role;

    /**
     * @var string
     */
    public $isActive;
    /**
     * @var string|null
     */
    public $hashedPassword;

    /**
     * @var string|null
     */
    public $rememberToken;

    /**
     * @var EmailAddress
     */
    public $email;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $kennelName;

    /**
     * @var Image
     */
    public $profileImage;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $zip;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $city;

    /**
     * @var Url
     */
    public $fbAccountUrl;

    /**
     * @var Url
     */
    public $igAccountUrl;

    /**
     * @var Url
     */
    public $website;

    /**
     * @var Image
     */
    public $logo;

    /**
     * Defines the structure of this entity.
     *
     * @param ClassDefinition $class
     * @throws InvalidPropertyDefinitionException
     */
    protected function defineEntity(ClassDefinition $class)
    {
        $class->property($this->firstName)->nullable()->asString();

        $class->property($this->lastName)->nullable()->asString();

        $class->property($this->username)->asString();

        $class->property($this->role)->asObject(UserRoleEnum::class);

        $class->property($this->isActive)->asBool();

        $class->property($this->website)->nullable()->asObject(Url::class);

        $class->property($this->hashedPassword)->asString();

        $class->property($this->rememberToken)->nullable()->asString();

        $class->property($this->email)->asObject(EmailAddress::class);

        $class->property($this->phone)->nullable()->asString();

        $class->property($this->kennelName)->nullable()->asString();

        $class->property($this->profileImage)->nullable()->asObject(Image::class);

        $class->property($this->address)->nullable()->asString();

        $class->property($this->zip)->nullable()->asString();

        $class->property($this->state)->nullable()->asString();

        $class->property($this->city)->nullable()->asString();

        $class->property($this->fbAccountUrl)->nullable()->asObject(Url::class);

        $class->property($this->igAccountUrl)->nullable()->asObject(Url::class);

        $class->property($this->website)->nullable()->asObject(Url::class);

        $class->property($this->logo)->nullable()->asObject(Image::class);

    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getId();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->hashedPassword;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->rememberToken;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->rememberToken = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email->asString();
    }

    public function sendPasswordResetNotification($token)
    {
        // TODO: Implement sendPasswordResetNotification() method.
    }

    public function getFullName() {
        return $this->firstName.' '.$this->lastName;
    }

}
