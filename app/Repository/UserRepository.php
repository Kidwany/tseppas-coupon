<?php


namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Class StarRepository
 * @package App\Repository
 */
class UserRepository extends BaseRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * StarRepository constructor.
     * @param $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
