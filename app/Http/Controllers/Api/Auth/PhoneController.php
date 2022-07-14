<?php

namespace App\Http\Controllers\Api\Auth;
use App\Helpers\CheckPhone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class VerifyController
 * @package App\Http\Controllers
 */
class PhoneController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /**
     *
     ***********************************************************
     * Method: POST
     ***********************************************************
     * Inputs
     ***********************************************************
     * 'phone' => integer
     ***********************************************************
     * Headers:
     ***********************************************************
     * Content-Type  => application/json
     * Accept  => application/json
     ***********************************************************
     * Response Codes:
     ***********************************************************
     * 402 => Phone Is Required
     * 403 => Phone has been taken
     * 200 => Phone is available
     */
    public function check(Request $request)
    {
        if (empty($request->phone))
        {
            return $this->failureResponse(402, "Phone Is Required");
        }

        $checkPhone = new CheckPhone($request->phone);
        if ($checkPhone->checkPhoneExistence() == 0)
        {
            return $this->failureResponse(403, "Phone has been taken");
        }

        return $this->successResponse();
    }
}
