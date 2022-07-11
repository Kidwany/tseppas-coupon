<?php


namespace App\Classes\FormBuilder\Elements\FormField;


/**
 * Class TextField
 * @package App\Classes\FormBuilder\Elements\TextField
 */
abstract class FormField
{
    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderTextField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderSearchField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderEmailField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderUrlField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderNumberField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderPasswordField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderDateTimeField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderDateField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderTimeField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderWeekField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderMonthField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderSelectField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderMultipleSelectField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderTextareaField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderColorField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderCheckboxField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderRadioField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderInlineRadioField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderFileField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderMultipleFileField($data = array());

    /**
     * @param array $data
     * @return mixed
     */
    abstract public function renderCkEditorField($data = array());
}
