<?php


namespace App\Classes\FormBuilder\Templates;

use Illuminate\Http\Request;

/**
 * Class GUIFactory
 * @package App\Classes\FormBuilder\Templates
 */
abstract class GUIFactory
{
    /**
     * @return mixed
     */
    abstract public function createLayouts();

    /**
     * @return mixed
     */
    abstract public function createBladeContent();

    /**
     * @return mixed
     */
    abstract public function createFormHeader();

    /**
     * @return mixed
     */
    abstract public function createFormFooter();

    /**
     * @return mixed
     */
    abstract public function createField();

    /**
     * @param Request $request
     * @return mixed
     */
    public function render(Request $request)
    {
        $form = "";
        // Form Header
        $form .= $this->createFormHeader()->renderFormHeader($request->{'method'}, $request->action);
        $name           = array_keys($request->name);
        $input_type     = array_keys($request->input_type);

        $min = min(count($name), count($input_type));
        // Loop on fields
        for($i = 0; $i < $min; $i++) {
            $fieldName      = $request->name[$i];
            $inputType      = $request->input_type[$i];
            $placeholder    = $request->placeholder[$i];
            $label          = $request->label[$i];
            $cols           = $request->columns[$i];

            $data = [
                "name"          => $fieldName,
                "placeholder"   => $placeholder,
                "label"         => $label,
                "cols"          => $cols,
            ];

            $method = "render". ucfirst($inputType) . "Field";
            $form.= $this->createField()->{$method}($data);
        }

        // Form Footer
        $form .= $this->createFormFooter()->renderFormFooter();

        $content = $this->createBladeContent()->renderBladeContent($form, $request->breadcrumbs);
        return $layouts = $this->createLayouts()->renderLayouts($request->title, $content);
    }
}
