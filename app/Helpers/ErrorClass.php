<?php
/**
 * Created by PhpStorm.
 * User: Crespo
 * Date: 7/7/2018
 * Time: 10:03 AM
 */

namespace App\Helpers;


use App\Models\ErrorLog;
use Carbon\Carbon;



class ErrorClass
{

    public function getAllError()
    {
        return ErrorLog::all();
    }
/*
    public function Error_Save(Request $request)
    {
        $error = new admin_error();
        $error->page_name = $request->page_name;
        $error->function_name = $request->function_name;
        //$error->Is_android_Web =($request->Is_android_Web=='1')?1:0;
        $error->error_message = $request->error_message;
        $error->created_at = Carbon::now(+2)->toDateTimeString();
        $error->save();
        return -10;//Error
    }
    */
/**
 * @Is_android_Web: 1 android , 0 web
*/

    public function Error_Save($page_name,$function_name,$error_message,$Is_android_Web)
    {
        $error = new ErrorLog();
        $error->page_name = $page_name;
        $error->function_name = $function_name;
        $error->Is_android_Web =$Is_android_Web;
        $error->error_message = $error_message;
        $error->created_at = Carbon::now(+2)->toDateTimeString();
        if($error->save()){
            return redirect()->back()->with('exception', 'Some Error Occurred');
        }else{
            return "something wrong";
        }

    }


}
