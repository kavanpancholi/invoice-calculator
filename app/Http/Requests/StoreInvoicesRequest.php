<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoicesRequest extends FormRequest
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
            'user_id' => 'required',
            'per_week_pay' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'no_of_weeks' => 'required',
            'total_amount' => 'required',
            'paypal_email' => 'required|email',
        ];
    }
}
