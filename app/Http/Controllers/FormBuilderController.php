<?php

namespace App\Http\Controllers;

use App\Classes\FormBuilder\DashboardForm;
use App\Classes\FormBuilder\InputTypes;
use App\Classes\FormBuilder\Templates\AeroFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FormBuilderController extends Controller
{

    /**
     * @var array
     */
    private $formFields = [];
    /**
     * @var
     */
    private $uploads;
    /**
     * @var
     */
    private $method;

    public function index()
    {
        $factory = new AeroFactory();
        return response()->json($factory->render());
    }

    public function create()
    {
        $fieldsTypes = InputTypes::get();
        return view('builder.create', compact('fieldsTypes'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        $namespace = 'App\Classes\FormBuilder\Templates\\';
        $class = $namespace . ucfirst(config('form_builder.template') . 'Factory');
        $factory = new $class;
        //return $factory->render($request);
        $input =  $request->all();
        $folderPath = base_path('resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR  . $input['folder']);
        $filePath = $folderPath . DIRECTORY_SEPARATOR . $input['blade'] . '.blade.php';
        if(!File::isDirectory($folderPath)){
            File::makeDirectory($folderPath);
            $blade = fopen($filePath, 'w') or die('Unable to open file');
            fwrite($blade, $factory->render($request));
        }
        return redirect('users/create');
    }

    public static function bladeContent($form)
    {
        return $formLayout = "";
        //return $formLayout;
    }

    /**
     * @return array
     */
    public function getFormFields(): array
    {
        return $this->formFields;
    }

    /**
     * @param array $formFileds
     */
    public function setFormFields(array $formFields): void
    {
        $this->formFields = $formFields;
    }

    /**
     * @param string $uploads
     */
    public function setUploads(string $uploads): void
    {
        $this->uploads = $uploads;
    }

    /**
     * @return string
     */
    public function getUploads(): string
    {
        return $this->uploads;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public  function formHead()
    {
        if ($this->getUploads() == 1 )
        {
            $upload = 'enctype="multipart/form-data"';
        }
        elseif ($this->getUploads() == 0)
        {
            $upload = '';
        }

        if ($this->getMethod() == 'store')
        {
            $method = '';
        }
        elseif ($this->getMethod() == 'update')
        {
            $method = '@method("patch")';
        }

        $formHead = ' <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right" method="post" action="#" ' . $upload .'>

                ' . $method . '
                    @csrf
                    <div class="m-portlet__body">

                        <div class="form-group m-form__group row">';

        return $formHead . "\n";

    }

    public function formFooter()
    {
        $formFooter = ' </div>

                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid m-form__actions--right">
                            <div class=" form-group m-form__group row">
                                <div class="col-lg-12 d-flex justify-content-end">
                                    <button type="reset" class="btn btn-secondary">
                                        الغاء
                                    </button>
                                    <a href="javascript:;"  class="btn btn-success" id="showtoast">
                                        حفظ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->';

        return $formFooter;
    }

    public function form()
    {
        $formHead = $this->formHead();
        $formFooter = $this->formFooter();

        $formFields = $this->getFormFields();

        $field = '';

        $name           = array_keys($formFields['name']);
        $input_type     = array_keys($formFields['input_type']);
        $placeholder    = array_keys($formFields['placeholder']);
        $label          = array_keys($formFields['label']);
        $columns        = array_keys($formFields['columns']);

        $min = min(count($name), count($input_type));

        for($i = 0; $i < $min; $i++) {
            $nameField           = $formFields['name'][$name[$i]];
            $input_type_field    = $formFields['input_type'][$input_type[$i]];
            $placeholderField    = $formFields['placeholder'][$placeholder[$i]];
            $labelField          = $formFields['label'][$label[$i]];
            $columnsField        = $formFields['columns'][$columns[$i]];

            if ($input_type_field == 'text')
            {
                $field .= "\n" . '<!------------------ ' .$nameField. ' Field --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-text-input" class="col-8 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" placeholder="'.$placeholderField.'" type="text"
                                     id="example-text-input" name="' . $nameField . '">
                                </div>
                            </div> ';
            }
            elseif ($input_type_field == 'search')
            {
                $field .= "\n" . '<!------------------ Field Name: ' .$nameField. ' type:search --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-search-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" placeholder="'.$placeholderField.'" type="search"
                                           id="example-search-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'email')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ' type:email--------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-email-input" class="col-10 col-form-label">
                                     ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" placeholder="'.$placeholderField.'" type="email"
                                           id="example-email-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'url')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ' type:url--------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-email-input" class="col-10 col-form-label">
                                     ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" placeholder="'.$placeholderField.'" type="url"
                                           id="example-email-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'number')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ' type:number--------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-email-input" class="col-10 col-form-label">
                                     ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" placeholder="'.$placeholderField.'" type="number"
                                           id="example-email-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'password')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ', type:password --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-email-input" class="col-10 col-form-label">
                                     ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" placeholder="'.$placeholderField.'" type="password"
                                           id="example-email-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'color')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ', type:password --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-email-input" class="col-10 col-form-label">
                                     ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" placeholder="'.$placeholderField.'" type="color"
                                           id="example-email-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'file')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ', type:password --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-email-input" class="col-10 col-form-label">
                                     ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="' . $nameField . '">
                                            <label class="custom-file-label" for="customFile">
                                                Choose file
                                            </label>
                                        </div>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'date_time')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" type="datetime-local"  placeholder="'.$placeholderField.'"
                                            id="example-datetime-local-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'date')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" type="date"  placeholder="'.$placeholderField.'"
                                            id="example-datetime-local-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'time')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" type="time"  placeholder="'.$placeholderField.'"
                                            id="example-datetime-local-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'week')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" type="week"  placeholder="'.$placeholderField.'"
                                            id="example-datetime-local-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'month')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <input class="form-control m-input" type="month"  placeholder="'.$placeholderField.'"
                                            id="example-datetime-local-input" name="' . $nameField . '">
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'select')
            {
                $field .= "\n" .'<!------------------ Field Name:  ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <select class="form-control m-input" id="exampleSelect1" name="'.$nameField.'">
                                        <option>
                                            Choose '.$labelField.' from the menu...
                                        </option>
                                        <option value=""></option>
                                     </select>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'multiple_select')
            {
                $field .= "\n" .'<!------------------ Field Name:  ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                     <select multiple="" class="form-control m-input" id="exampleSelect2" name="'.$nameField.'">
                                        <option>
                                            Choose '.$labelField.' From the menu...
                                        </option>
                                        <option value=""></option>
                                     </select>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'grouped_select')
            {
                $field .= "\n" .'<!------------------ Field Name:  ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                     <select class="form-control" name="'.$nameField.'">
                                         <option>
                                            Choose '.$labelField.' From the menu...
                                        </option>
                                        <optgroup label="Category 1">
                                            <option value="1">
                                                Choice 1
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'select_search')
            {
                $field .= "\n" .'<!------------------ Field Name:  ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                     <select class="form-control m-select2" id="m_select2_1" name="'.$nameField.'">
                                        <option>
                                            Choose '.$labelField.' From the menu...
                                        </option>
                                        <option value="AK">
                                            Alaska
                                        </option>
                                    </select>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'grouped_select_search')
            {
                $field .= "\n" .'<!------------------ Field Name:  ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                     <select class="form-control m-select2" id="m_select2_2" name="'.$nameField.'">
                                        <option>
                                            Choose '.$labelField.' From the menu...
                                        </option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">
                                                Alaska
                                            </option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'tags_multiple_select')
            {
                $field .= "\n" .'<!------------------ Field Name:  ' .$nameField. ', type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                     <select class="form-control m-select2" id="m_select2_3" name="'.$nameField.'" multiple="multiple">
                                            <option>
                                                Choose '.$labelField.' From the menu...
                                            </option>
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK" selected>
                                                    Alaska
                                                </option>
                                                <option value="HI">
                                                    Hawaii
                                                </option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                            </optgroup>

                                    </select>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'textarea')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ' , type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                     <textarea class="form-control m-input" id="exampleTextarea" rows="3" name="'.$nameField.'" placeholder="'.$placeholderField.'"></textarea>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'checkbox')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ' , type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <div class="m-checkbox-list">
                                        <label class="m-checkbox m-checkbox--success">
                                            <input type="checkbox" name="'.$nameField.'">
                                            Success state
                                            <span></span>
                                        </label>
                                        <label class="m-checkbox m-checkbox--brand">
                                            <input type="checkbox" name="'.$nameField.'">
                                            Brand state
                                            <span></span>
                                        </label>
                                        <label class="m-checkbox m-checkbox--primary">
                                            <input type="checkbox" name="'.$nameField.'">
                                            Primary state
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'radio')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ' , type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <div class="m-radio-list">
                                        <label class="m-radio">
                                            <input type="radio" name="'.$nameField.'" value="1">
                                            Option 1
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="'.$nameField.'" value="2">
                                            Option 2
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'inline_radio')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ' , type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <div class="m-radio-inline">
                                        <label class="m-radio">
                                            <input type="radio" name="'.$nameField.'" value="1">
                                            Option 1
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="'.$nameField.'" value="2">
                                            Option 2
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="'.$nameField.'" value="3">
                                            Option 3
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="m-form__help">
                                        Some help text goes here
                                    </span>
                                </div>
                            </div>';
            }
            elseif ($input_type_field == 'switch')
            {
                $field .= "\n" .'<!------------------ Field Name: ' .$nameField. ' , type: '.$input_type_field.' --------------------->
                            <div class="col-lg-'.$columnsField.'">
                                <label for="example-datetime-local-input" class="col-10 col-form-label">
                                    ' . $labelField . '
                                </label>
                                <div class="col-12">
                                    <span class="m-switch m-switch--lg m-switch--icon">
                                        <label>
                                            <input type="checkbox" name="'.$nameField.'">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>';
            }

        }

        $form = $formHead . "\n" . $field . "\n" . $formFooter ;
        return $form;
    }
}
