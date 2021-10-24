<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Common\Structure\DateTime\Persistence\DateTimeMapper;
use Dms\Core\Persistence\Db\Mapping\Definition\MapperDefinition;
use Dms\Core\Persistence\Db\Mapping\EntityMapper;
use App\Domain\Entities\EmailLogs;
use Dms\Common\Structure\Web\Persistence\EmailAddressMapper;
use Dms\Common\Structure\Web\Persistence\HtmlMapper;
use Dms\Common\Structure\DateTime\Persistence\TimezonedDateTimeMapper;

/**
 * The App\Domain\Entities\EmailLogs entity mapper.
 */
class EmailLogsMapper extends EntityMapper
{
    /**
     * Defines the entity mapper
     *
     * @param MapperDefinition $map
     *
     * @return void
     */
    protected function define(MapperDefinition $map)
    {
        $map->type(EmailLogs::class);
        $map->toTable('email_logs');

        $map->idToPrimaryKey('id');

        $map->property(EmailLogs::NAME)->to('name')->nullable()->asVarchar(255);

        $map->embedded(EmailLogs::FROM)
            ->using(new EmailAddressMapper('from'));

        $map->embedded(EmailLogs::TO)
            ->withIssetColumn('to')
            ->using(new HtmlMapper('to'));

        $map->property(EmailLogs::SUBJECT)->to('subject')->nullable()->asVarchar(255);

        $map->embedded(EmailLogs::MESSAGE)
            ->withIssetColumn('message')
            ->using(new HtmlMapper('message'));

        $map->embedded(EmailLogs::OTHER_DATA)
            ->withIssetColumn('other_data')
            ->using(new HtmlMapper('other_data'));

        $map->property(EmailLogs::SENT_TIME)->to('sent_time')->asVarchar(255);


    }
}
