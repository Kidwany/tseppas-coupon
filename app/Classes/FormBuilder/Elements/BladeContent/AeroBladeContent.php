<?php


namespace App\Classes\FormBuilder\Elements\BladeContent;


/**
 * Class AeroBladeContent
 * @package App\Classes\FormBuilder\Elements\BladeContent
 */
class AeroBladeContent extends BladeContent
{
    /**
     * @param $form
     * @param $breadcrumbs
     * @return mixed|void
     */
    public function renderBladeContent($form, $breadcrumbs)
    {
        $breadcrumbs_array = explode("/", $breadcrumbs);
        $breadcrumbs_links = "";
        $title = "";
        foreach ($breadcrumbs_array as $key => $value)
        {
            if ($key == (count($breadcrumbs_array)) - 1)
            {
                $title = $value;
                $breadcrumbs_links .= '<li class="breadcrumb-item active"> ' . $value . ' </li>
                 ';
            }
            else
                $breadcrumbs_links .= '<li class="breadcrumb-item"><a href="javascript:void(0);">' . $value . ' </a></li>
                ';
        }
        return '<div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>' . $title . '</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl("/")}}"><i class="zmdi zmdi-home"></i> {{config("app.name_ar")}} </a></li>
                        ' . $breadcrumbs_links . '
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Vertical Layout -->
            ' . $form . '
        </div>
    </div>';
    }
}
