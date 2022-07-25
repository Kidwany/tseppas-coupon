<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Coupon\CouponCategories;
use App\Repository\Coupon\CouponCategoryRepository;
use App\Repository\Coupon\CouponRepository;
use App\Repository\Customer\CustomerRepository;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public $customersRepository, $couponRepository, $couponCategoryRepository;

    public function __construct(CustomerRepository $customerRepository,
                                CouponRepository $couponRepository,
                                CouponCategoryRepository $couponCategoryRepository)
    {
        $this->couponRepository         = $couponRepository;
        $this->customersRepository      = $customerRepository;
        $this->couponCategoryRepository = $couponCategoryRepository;
    }

    public function index()
    {
        return view("dashboard.coupons.index");
    }

    public function create()
    {
        $customers  = $this->customersRepository->all(["id", "name", "code"]);
        $couponCategories = $this->couponCategoryRepository->all(["id", "code", "title", "amount"]);
        return view("dashboard.coupons.create", compact("customers", 'couponCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view("dashboard.coupons.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
