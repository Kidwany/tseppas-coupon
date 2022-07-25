<?php


namespace App\Repository\Coupon;

use App\Models\Coupon\Coupons;
use App\Models\User;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class StarRepository
 * @package App\Repository
 */
class CouponRepository extends BaseRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * StarRepository constructor.
     * @param $model
     */
    public function __construct(Coupons $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
