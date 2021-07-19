<?php


namespace App\Domain\Entities\Auth;


use Dms\Common\Structure\DateTime\DateTime;
use Dms\Common\Structure\Web\EmailAddress;
use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;

class PasswordReset extends Entity
{
    const EMAIL = 'email';
    const TOKEN = 'token';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * @var EmailAddress
     */
    public $email;
    /**
     * @var string
     */
    public $token;
    /**
     * @var DateTime
     */
    public $created_at;
    /**
     * @var DateTime
     */
    public $updated_at;

    /**
     * Defines the structure of this entity.
     *
     * @param ClassDefinition $class
     * @throws InvalidPropertyDefinitionException
     */
    protected function defineEntity(ClassDefinition $class)
    {
        $class->property($this->email)->asObject(EmailAddress::class);
        $class->property($this->token)->asString();
        $class->property($this->created_at)->nullable()->asObject(DateTime::class);
        $class->property($this->updated_at)->nullable()->asObject(DateTime::class);
    }
}
