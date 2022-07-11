<?php


namespace App\Repository;


use App\Helpers\CheckPhone;
use App\Models\Finance\Balance;
use App\Models\Status;
use App\User;
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

    public function unInvoicedOrdersQuery($star_id)
    {
        return $this->model->with(['balance' => function($query) {
            $query->select("user_id", 'amount');
        }])->with('notInvoicedOrders')
            ->where('user_type_id', User::IS_STAR)
            ->where("id", $star_id)
            ->select("id", "name", "code", "phone")
            ->withCount('notInvoicedOrders')
            ->having("not_invoiced_orders_count", ">", 0)
            ->first();
    }

    public function getUnInvoicedOrders($star_id)
    {
        $star = $this->unInvoicedOrdersQuery($star_id);

        if (isset($star->notInvoicedOrders) && count($star->notInvoicedOrders) > 0)
        {
            foreach ($star->notInvoicedOrders as $notInvoicedOrder)
            {
                $star['totalServiceValue'] += $notInvoicedOrder->orderFinance->service_value;
                $star['totalDiscount'] += $notInvoicedOrder->orderFinance->discount;
                $star['totalCashAmount'] += $notInvoicedOrder->orderFinance->cash_amount;
                $star['totalCommission'] += $notInvoicedOrder->orderFinance->commission;
                $star['totalSubtractedFromUser'] += $notInvoicedOrder->orderFinance->subtracted_from_user_balance;
                $star['total'] = $this->calculateTotal($star);
                $star['transactionType'] = $star['total'] > 0 ? 'Cash Out' : 'Cash In';
            }
        }
        return $star;
    }

    public function getUnInvoiceOrdersIDs($star_id)
    {
        return $this->unInvoicedOrdersQuery($star_id)->notInvoicedOrders->pluck("id")->toArray();
    }

    /**
     * @param $star
     * @return mixed
     */
    public function calculateTotal($star)
    {
        $total_added =  $star['totalDiscount'] + $star['totalSubtractedFromUser'];
        $total_subtracted = $star['totalCommission'];
        return $total_added - $total_subtracted;
    }

    public function findStarByPhone($phone)
    {
        return $user = User::query()
            ->where("user_type_id", User::IS_STAR)
            ->where("phone", (new CheckPhone($phone))->formattedPhone())
            ->where("status_id", Status::IS_ACTIVE)
            ->first();
        /*if ($user)
            return true;
        return false;*/
    }

    public function updateStarBalance($star_id, $amount, $type = "addition")
    {
        $balance = Balance::query()->where("user_id", $star_id)->first();
        if ($type == "addition")
            $balance->amount = $balance->amount + $amount;
        elseif ($type = "subtraction")
            $balance->amount = $balance->amount - $amount;

        if ($balance->save())
            return true;
        return false;
    }

    public function getAvailableStarsToReceiveOrders(){
        $stars_has_orders = DB::table("orders")
            ->whereDate("created_at", today())
            ->where("star_id", "!=", null)
            ->whereIn("status_id", [
                Status::IS_PICKED_UP, Status::IS_RUNNING
            ])->select("star_id")
            ->pluck("star_id")
            ->toArray();

        return User::query()->where("currently_available", 1)
            ->whereNotIn("id", $stars_has_orders)
            ->where("user_type_id", User::IS_STAR)
            ->where("status_id", Status::IS_ACTIVE);
    }

    public function getOnlineStars()
    {
        return User::query()
            ->where("currently_available", 1)
            ->where("user_type_id", User::IS_STAR)
            ->where("status_id", Status::IS_ACTIVE)
            ->get();
    }

}
