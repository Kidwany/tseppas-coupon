<?php


namespace App\Classes\FormBuilder\Templates;

use App\Classes\FormBuilder\Elements\BladeContent\AeroBladeContent;
use App\Classes\FormBuilder\Elements\BladeContent\BladeContent;
use App\Classes\FormBuilder\Elements\FormFooter\AeroFormFooter;
use App\Classes\FormBuilder\Elements\FormHeader\AeroFormHeader;
use App\Classes\FormBuilder\Elements\Layouts\AeroLayouts;
use App\Classes\FormBuilder\Elements\Layouts\Layouts;
use App\Classes\FormBuilder\Elements\FormField\AeroFormField;
use App\Classes\FormBuilder\Elements\FormField\FormField;

/**
 * Class AeroFactory
 * @package App\Classes\FormBuilder\Templates
 */
class AeroFactory extends GUIFactory
{

    /**
     * @return Layouts
     */
    public function createLayouts() :Layouts
    {
        return new AeroLayouts();
    }

    /**
     * @return BladeContent
     */
    public function createBladeContent() :BladeContent
    {
        return new AeroBladeContent();
    }

    /**
     * @return AeroFormHeader|mixed
     */
    public function createFormHeader()
    {
        return new AeroFormHeader();
    }

    /**
     * @return AeroFormFooter|mixed
     */
    public function createFormFooter()
    {
        return new AeroFormFooter();
    }

    /**
     * @return FormField
     */
    public function createField() :FormField
    {
        return new AeroFormField();
    }
}
