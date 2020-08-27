<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
    
    /**
     * Return product send by GET
     * @return mixed
     */
    public function product()
    {
        $product = false;
        if(isset($this->product)){
            $product = Product::find($this->product);
        }
        return $product;
    }
}
