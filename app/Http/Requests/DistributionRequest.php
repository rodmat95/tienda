<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistributionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        /* $supplier = Supplier::find($this->supplier_id);

        if($supplier && $supplier->user_id == auth()->user()->id){
            return true;
        }
        else
        {
            return false;
        } */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $distribution = $this->route()->parameter('distribution');

        $rules = [
            'product_id' => 'required',
            'slug' => 'required|unique:distributions',
            'status' => 'required|in:1,2'
        ];

        if($distribution)
        {
            $rules['slug'] = 'required|unique:distributions,slug,' . $distribution->id;
        }

        if($this->status == 2)
        {
            $rules = array_merge($rules, [
                'price' => 'required',
                'stock' => 'required',
            ]);
        }

        return $rules;
    }
}