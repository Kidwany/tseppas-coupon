<?php


namespace App\Repository\Sales;

use App\Models\Sales\SalesQuotation;
use App\Models\User;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class StarRepository
 * @package App\Repository
 */
class OrderCouponsRepository extends BaseRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * StarRepository constructor.
     * @param $model
     */
    public function __construct(OrderCouponsRepository $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
