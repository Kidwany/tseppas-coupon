<?php


namespace App\Traits;


use App\Models\Integrations\Fawry\CallType;
use App\Models\Integrations\Fawry\StatusCode;
use App\Services\Integrations\Fawry\CallStatusService;

/**
 * Trait HttpResponseStatus
 * @package App\Traits
 */
trait HttpResponseStatus
{
    /**
     * @param array $data
     * @param string $message
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    protected function successResponse($data = [], $message = 'success')
    {
        return response([
            'success' => true,
            'status_code'  => 200,
            'message'  => $message,
            'data' => $data,
        ], 200);
    }

    /**
     * @param $status
     * @param $message
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    protected function failureResponse($status, $message)
    {
        return response([
            'success' => false,
            'status_code'  => $status,
            'message' => $message,
        ], $status);
    }

    /**
     * @param $status
     * @param $request_id
     * @param $asyncRequestID
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    protected function billInquiryFailureResponse($status, $request_id, $asyncRequestID, $request = null)
    {
        $message = CallStatusService::getStatus($status, CallType::BILL_INQUIRY);
        return response([
            "status" => [
                "statusCode"   => (int)$status,
                "description"   => $message->message
            ],
            "billRec"       => array([
                "billingAcct" => $request->billingAcct,
                "billTypeCode"  => $request->billTypeCode
            ]),
            "msgCode"           => "BillInqRs",
            "serverLang"        => isset($request->custLang) ? $request->custLang : "en-gb",
            "serverDt"          => date("Y-m-d\Th:i:s.v", strtotime(serverTimeNow())),
            "rqUID"             => $request_id,
            "asyncRqUID"        => $asyncRequestID,
            "terminalId"        => isset($request->terminalId) ? $request->terminalId : "",
            "bankId"            => isset($request->bankId) ? $request->bankId : "FAWRYRTL",
            "deliveryMethod"    => isset($request->deliveryMethod) ? $request->deliveryMethod : "POS",
        ]);
    }


    /**
     * @param $status
     * @param $request
     * @param null $hashedString
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    protected function billNotifyFailureResponse($status, $request, $hashedString = null)
    {
        $message = CallStatusService::getStatus($status, CallType::PAYMENT_NOTIFY);
        if (isset($request->signature) && !empty($request->signature) && $hashedString != null)
            $signature = $hashedString->generateResponseSignature($status);
        else
            $signature = "";
        return response([
            "status" => [
                "statusCode"   => (int)$status,
                "description"   => $message->message
            ],
            "msgCode"               => "PmtNotifyRs",
            "serverDt"              => date("Y-m-d\Th:i:s.v", strtotime(serverTimeNow())),
            "rqUID"                 => $request->rqUID,
            "asyncRqUID"            => $request->asyncRqUID,
            "terminalId"            => $request->terminalId,
            "pmtStatusRec"          => [[
                "status"    => [
                    "statusCode"    => (int)$status,
                    "description"   => $message->message
                ],
                "pmtIds"    => $request->pmtRec[0]["pmtInfo"]["pmtIds"]
            ]],
            "isRetry"               => false,
        ]);
    }

    protected function cashOutNotificationServiceFailureResponse($status, $request)
    {
        $message = CallStatusService::getStatus($status, CallType::CUSTOMER_VOUCHER_NOTIFY);
        return response([
            "status" => [
                "statusCode"   => (int)$status,
                "description"   => $message->message
            ],
            "msgCode"               => "PmtNotifyRs",
            "serverDt"              => date("Y-m-d\Th:i:s.v", strtotime(serverTimeNow())),
            "rqUID"                 => $request->rqUID,
            "asyncRqUID"            => $request->asyncRqUID,
            "terminalId"            => $request->terminalId,
            "pmtStatusRec"          => [[
                "status"    => [
                    "statusCode"    => (int)$status,
                    "description"   => $message->message
                ],
                "pmtIds"    => $request->pmtRec[0]["pmtInfo"]["pmtIds"]
            ]],
            "isRetry"               => false,
        ]);
    }
}
