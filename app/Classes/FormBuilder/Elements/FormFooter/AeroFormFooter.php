<?php


namespace App\Classes\FormBuilder\Elements\FormFooter;


/**
 * Class AeroFormHeader
 * @package App\Classes\FormBuilder\Elements\FormHeader
 */
class AeroFormFooter extends FormFooter
{
    /**
     * @return mixed|void
     */
    public function renderFormFooter()
    {
        return '
                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>';
    }
}
