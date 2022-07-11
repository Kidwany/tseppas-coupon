<?php

namespace App\Classes\FormBuilder;

use App\Classes\FormBuilder\Templates\GUIFactory;

class DashboardForm
{
    private $factory;

    public function __construct(GUIFactory $factory)
    {
        $this->factory = $factory;
    }

    public function createTextField()
    {
        return $this->factory->createTextField();
    }
}
