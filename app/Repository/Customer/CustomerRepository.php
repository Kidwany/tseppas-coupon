<?php


namespace App\Repository\Customer;

use App\Models\Customer\Customers;
use App\Models\User;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class StarRepository
 * @package App\Repository
 */
class CustomerRepository extends BaseRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * StarRepository constructor.
     * @param $model
     */
    public function __construct(Customers $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
