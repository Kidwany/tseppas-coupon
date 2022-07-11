<?php


namespace App\Classes\FormBuilder\Elements\BladeContent;


/**
 * Class BladeContent
 * @package App\Classes\FormBuilder\Elements\BladeContent
 */
abstract class BladeContent
{
    /**
     * @param $form
     * @param $breadcrumbs
     * @return mixed
     */
    abstract public function renderBladeContent($form, $breadcrumbs);
}
