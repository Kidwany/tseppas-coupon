<?php


namespace App\Classes\FormBuilder\Elements\FormHeader;


/**
 * Class AeroFormHeader
 * @package App\Classes\FormBuilder\Elements\FormHeader
 */
class AeroFormHeader extends FormHeader
{
    /**
     * @param $method
     * @param $action
     * @return mixed|void
     */
    public function renderFormHeader($method, $action)
    {
        if (strpos(strval($action), "/"))
        {
            $target_action = "{{" . config('form_builder.action_url_func') . '("' . $action . '")}}';
        }
        else
        {
            $target_action = "{{route('" . $action . "')}}";
        }

        return '@include("dashboard.layouts.messages")
            <!-- Vertical Layout -->
            <form action="' . $target_action . '" method="' . $method . '" enctype="multipart/form-data">
                @csrf
                @method("' . $method . '")
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">';
    }
}
