<?php


namespace App\Classes\FormBuilder\Elements\Layouts;


abstract class Layouts
{
    /**
     * @param $title
     * @param $content
     * @param null $scripts
     * @return mixed
     */
    abstract public function renderLayouts($title, $content, $scripts = null);
}
