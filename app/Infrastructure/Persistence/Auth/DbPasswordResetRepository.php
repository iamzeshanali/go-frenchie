<?php declare(strict_types = 1);

namespace App\Infrastructure\Persistence\Auth;

use Dms\Core\Persistence\Db\Connection\IConnection;
use Dms\Core\Persistence\Db\Mapping\IOrm;
use Dms\Core\Persistence\DbRepository;
use App\Domain\Services\Persistence\Auth\IPasswordResetRepository;
use App\Domain\Entities\Auth\PasswordReset;

/**
 * The database repository implementation for the App\Domain\Entities\Auth\PasswordReset entity.
 */
class DbPasswordResetRepository extends DbRepository implements IPasswordResetRepository
{
    public function __construct(IConnection $connection, IOrm $orm)
    {
        parent::__construct($connection, $orm->getEntityMapper(PasswordReset::class));
    }
}