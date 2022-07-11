<?php


namespace App\Classes\FormBuilder\Templates;


use App\Classes\FormBuilder\Elements\BladeContent\AdminLteBladeContent;
use App\Classes\FormBuilder\Elements\FormFooter\AdminLteFormFooter;
use App\Classes\FormBuilder\Elements\FormHeader\AdminLteFormHeader;
use App\Classes\FormBuilder\Elements\Layouts\AdminLteLayouts;
use App\Classes\FormBuilder\Elements\Layouts\Layouts;
use App\Classes\FormBuilder\Elements\FormField\AdminLteFormField;
use App\Classes\FormBuilder\Elements\FormField\FormField;

/**
 * Class AdminLteFactory
 * @package App\Classes\FormBuilder\Templates
 */
class AdminLteFactory extends GUIFactory
{
    /**
     * @return Layouts
     */
    public function createLayouts() :Layouts
    {
        return new AdminLteLayouts();
    }

    /**
     * @return AdminLteBladeContent
     */
    public function createBladeContent() :AdminLteBladeContent
    {
        return new AdminLteBladeContent();
    }
    /**
     * @return AdminLteFormHeader|mixed
     */
    public function createFormHeader()
    {
        return new AdminLteFormHeader();
    }

    /**
     * @return AdminLteFormFooter()|mixed
     */
    public function createFormFooter()
    {
        return new AdminLteFormFooter();
    }

    /**
     * @return FormField
     */
    public function createField() :FormField
    {
        return new AdminLteFormField();
    }
}
