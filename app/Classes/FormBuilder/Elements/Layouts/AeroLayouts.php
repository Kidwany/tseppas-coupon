<?php


namespace App\Classes\FormBuilder\Elements\Layouts;


/**
 * Class AeroLayouts
 * @package App\Classes\FormBuilder\Elements\Layouts
 */
class AeroLayouts extends Layouts
{

    /**
     * @param $title
     * @param $content
     * @param null $scripts
     * @return mixed|string
     */
    public function renderLayouts($title, $content, $scripts = null)
    {
        return  "@extends('dashboard.layouts.layouts')
@section('title', '{$title}')
@section('customizedStyle')
@endsection

@section('customizedScript')
    <script>
        $('.select2').select2()
    </script>
    <script>$(function () {

        $(function () {
        //CKEditor
        CKEDITOR.replace('ckeditor');
        CKEDITOR.config.height = 300;

});
            // Basic instantiation:
            $('#car_color').colorpicker();

            // Example using an event, to change the color of the #demo div background:
            $('#car_color').on('colorpickerChange', function(event) {
                $('.input-group-addon').css('background-color', event.color.toString());
            });
        });
        </script>
@endsection

@section('content')
" . $content . "\n"
            . "@endsection";
    }
}
