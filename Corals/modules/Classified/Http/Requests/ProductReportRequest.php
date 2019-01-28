<?php

namespace Corals\Modules\Classified\Http\Requests;

use Corals\Foundation\Http\Requests\BaseRequest;
use Corals\Modules\Classified\Models\Product;
use Corals\Modules\Utility\Models\Category\Category;

class ProductReportRequest extends BaseRequest
{
    public $categoryAttributes = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return user()->can('Classfied::product.report');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'report_body' => 'required|max:255',
            'email' => 'required|email',
            'name' => 'required',
        ];

        return $rules;
    }


}
