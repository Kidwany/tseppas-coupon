<?php


namespace App\Repository\Sales;

use App\Models\Sales\SalesQuotation;
use App\Models\Sales\SalesType;
use App\Models\User;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class StarRepository
 * @package App\Repository
 */
class SalesTypeRepository extends BaseRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * StarRepository constructor.
     * @param $model
     */
    public function __construct(SalesType $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
