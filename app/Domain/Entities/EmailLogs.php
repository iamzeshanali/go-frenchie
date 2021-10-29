<?php


namespace App\Domain\Entities;


use App\Domain\Entities\Enums\UserRoleEnum;
use Dms\Common\Structure\DateTime\DateTime;
use Dms\Common\Structure\DateTime\TimezonedDateTime;
use Dms\Common\Structure\FileSystem\Image;
use Dms\Common\Structure\Web\EmailAddress;
use Dms\Common\Structure\Web\Html;
use Dms\Common\Structure\Web\Url;
use Dms\Core\Model\Object\ClassDefinition;
use Dms\Core\Model\Object\Entity;
use Dms\Core\Model\Object\InvalidPropertyDefinitionException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

class EmailLogs extends Entity
{

    const NAME = 'name';
    const FROM = 'from';
    const TO = 'to';
    const SUBJECT = 'subject';
    const MESSAGE = 'message';
    const OTHER_DATA = 'otherData';
    const SENT_TIME = 'sentTime';

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string
     */
    public $from;

    /**
     * @var string
     */
    public $to;

    /**
     * @var string|null
     */
    public $subject;

    /**
     * @var string|null
     */
    public $message;
    /**
     * @var string|null
     */
    public $otherData;

    /**
     * @var TimezonedDateTime
     */
    public $sentTime;

    /**
     * Defines the structure of this entity.
     *
     * @param ClassDefinition $class
     * @throws InvalidPropertyDefinitionException
     */
    protected function defineEntity(ClassDefinition $class)
    {
        $class->property($this->name)->nullable()->asString();

        $class->property($this->to)->nullable()->asObject(Html::class);

        $class->property($this->from)->asObject(EmailAddress::class);

        $class->property($this->subject)->nullable()->asString();

        $class->property($this->message)->nullable()->asObject(Html::class);

        $class->property($this->otherData)->nullable()->asObject(Html::class);

        $class->property($this->sentTime)->asString();

    }

}
