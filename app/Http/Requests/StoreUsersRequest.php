<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'required',
            'date_of_birth' => 'required',
            'position_id' => 'required',
            'department_id' => 'required',
            'joining_date' => 'required',
            'per_month_pay' => 'required',
            'per_week_pay' => 'required',
            'paypal_email' => 'required|email',
        ];
    }
}
