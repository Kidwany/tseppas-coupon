<?php


namespace App\Classes\FormBuilder;


class InputTypes
{
    public static function get()
    {
        return [
            'text'              => 'Text Input',
            'search'            => 'Search Input',
            'email'             => 'Email Input',
            'url'               => 'URL Input',
            'number'            => 'Number Input',
            'password'          => 'Password Input',
            'dateTime'          => 'Date & Time',
            'date'              => 'Date',
            'time'              => 'Time',
            'week'              => 'Week',
            'month'             => 'Month',
            'select'            => 'Select Input',
            'multipleSelect'    => 'Multiple Select',
            'textarea'          => 'Text area',
            'ckEditor'          => 'CKEditor',
            'color'             => 'Color',
            'checkbox'          => 'Checkbox',
            'radio'             => 'Radio Button',
            'inlineRadio'       => 'Inline Radio Button',
            'file'              => 'File Input',
            'multipleFile'      => 'Multiple File Upload',
        ];
    }
}
