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
class SalesQuotationRepository extends BaseRepository
{
    /**
     * @var User
     */
    protected $model;

    /**
     * StarRepository constructor.
     * @param $model
     */
    public function __construct(SalesQuotation $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
