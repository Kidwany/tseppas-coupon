<?php


namespace App\Classes\FormBuilder\Elements\FormHeader;


/**
 * Class FormHeader
 * @package App\Classes\FormBuilder\Elements\FormHeader
 */
abstract class FormHeader
{
    /**
     * @param $method
     * @param $action
     * @return mixed
     */
    public abstract function renderFormHeader($method, $action);
}
