<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\IUsersRepository;
use App\Domain\Entities\Users;

/**
 * The database repository implementation for the App\Domain\Entities\Users entity.
 */
class DbUsersRepository extends DbRepository implements IUsersRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(Users::class));
    }
}