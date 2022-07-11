<?php


namespace App\Classes\FormBuilder\Elements\FormField;


/**
 * Class AeroTextField
 * @package App\Classes\FormBuilder\Elements\TextField
 */
class AeroFormField extends FormField
{
    /**
     * @param array $data
     * @return mixed|string
     */
    public function renderTextField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="text" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderSearchField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="search" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderEmailField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="email" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderUrlField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="url" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderNumberField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="number" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderPasswordField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="password" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderDateTimeField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="datetime" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderDateField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="date" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderTimeField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="time" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderWeekField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="week" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderMonthField($data = array())
    {
        return '
                                <div class="col-lg-'.$data['cols'].' col-md-12 col-sm-12">
                                        <label for="email_address"> '.$data['label'].' </label>
                                        <div class="form-group">
                                            <input type="month" name="'.$data['name'].'" value="{{old("'.$data['name'].'")}}" id="email_address" class="form-control" placeholder="'.$data['placeholder'].'">
                                        </div>
                                    </div>
                                    ';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderSelectField($data = array())
    {
        return '<div class="col-lg-'.$data['cols'].' col-md-6" id="service_provider" >
                                        <label> '.$data['label'].'</label>
                                        <select name="'.$data['name'].'" class="form-control show-tick ms select2" data-placeholder="'.$data['placeholder'].'">
                                            <option value="">'.$data['placeholder'].'</option>
                                        </select>
                                    </div>';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderMultipleSelectField($data = array())
    {
        return '<div class="col-lg-'.$data['cols'].' col-md-6">
                                        <label> '.$data['label'].'</label>
                                        <select multiple name="'.$data['name'].'[]" class="form-control show-tick ms select2" data-placeholder="'.$data['placeholder'].'">
                                            <option value="">'.$data['placeholder'].'</option>
                                        </select>
                                    </div>';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderTextareaField($data = array())
    {
        return '<div class="col-sm-'.$data['cols'].'">
                                    <label for="email_address"> '.$data['label'].' </label>
                                    <div class="form-group">
                                        <textarea rows="4" name="'.$data['name'].'" class="form-control no-resize" placeholder="'.$data['placeholder'].'">{{old("'.$data['name'].'")}}</textarea>
                                    </div>
                                </div>';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderColorField($data = array())
    {
        return '<div class="col-md-'.$data['cols'].'">
                                        <div class="mb-3">
                                            <label>'.$data['label'].'</label>
                                            <div class="input-group colorpicker">
                                                <input type="color" class="form-control" value="{{old("'.$data['name'].'")}}" name="'.$data['name'].'">
                                            </div>
                                        </div>
                                    </div>';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderCheckboxField($data = array())
    {
        return '<div class="col-lg-'.$data['cols'].' col-md-6">
                                        <label for="email_address">'.$data['label'].'</label>
                                        <div class="checkbox">
                                            <input id="'.$data['name'].'" name="'.$data['name'].'" type="checkbox" value="1">
                                            <label for="'.$data['name'].'">
                                                '.$data['placeholder'].'
                                            </label>
                                        </div>
                                    </div>';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderRadioField($data = array())
    {
        return '<div class="col-lg-'.$data['cols'].' col-md-6">
                                        <div class="form-group">
                                        <div class="radio m-r-20">
                                            <input type="radio" name="'.$data['name'].'" id="'.$data['name'].'" class="with-gap" value="1">
                                            <label for="'.$data['name'].'"> '.$data['label'].'</label>
                                        </div>
                                        <div class="radio m-r-20">
                                            <input type="radio" name="'.$data['name'].'" id="'.$data['name'].'" class="with-gap" value="2">
                                            <label for="'.$data['name'].'"> '.$data['label'].'</label>
                                        </div>
                                        <div class="radio m-r-20">
                                            <input type="radio" name="'.$data['name'].'" id="'.$data['name'].'" class="with-gap" value="3">
                                            <label for="'.$data['name'].'"> '.$data['label'].'</label>
                                        </div>
                                    </div>
                                    </div>';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderInlineRadioField($data = array())
    {
        // TODO: Implement renderInlineRadioField() method.
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderFileField($data = array())
    {
        return '<div class="col-lg- '.$data['cols'].' col-md-12 col-sm-3">
                                        <label for="email_address">'.$data['label'].'</label>
                                        <div class="form-group">
                                            <input type="file" name="'.$data['name'].'" id="email_address" class="form-control" placeholder=" '.$data['placeholder'].'">
                                        </div>
                                    </div>';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderMultipleFileField($data = array())
    {
        return '<div class="col-lg- '.$data['cols'].' col-md-12 col-sm-3">
                                        <label for="email_address">'.$data['label'].'</label>
                                        <div class="form-group">
                                            <input multiple type="file" name="'.$data['name'].'" id="email_address" class="form-control" placeholder=" '.$data['placeholder'].'">
                                        </div>
                                    </div>';
    }

    /**
     * @param array $data
     * @return mixed|void
     */
    public function renderCkEditorField($data = array())
    {
        return '<div class="col-sm-'.$data['cols'].'">
                                    <label for="email_address"> '.$data['label'].' </label>
                                    <div class="form-group">
                                        <textarea id="ckeditor" name="'.$data['name'].'" class="form-control no-resize" placeholder="'.$data['placeholder'].'">{{old("'.$data['name'].'")}}</textarea>
                                    </div>
                                </div>';
    }
}
