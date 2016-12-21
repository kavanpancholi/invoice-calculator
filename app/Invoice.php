<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class Invoice
 *
 * @package App
 * @property string $user
 * @property decimal $per_week_pay
 * @property string $from_date
 * @property string $to_date
 * @property string $last_invoice_at
 * @property integer $no_of_weeks
 * @property integer $total_amount
 * @property string $paypal_email
*/
class Invoice extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['per_week_pay', 'from_date', 'to_date', 'last_invoice_at', 'no_of_weeks', 'total_amount', 'paypal_email', 'user_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFromDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['from_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['from_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFromDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setToDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['to_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['to_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getToDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setLastInvoiceAtAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['last_invoice_at'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['last_invoice_at'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getLastInvoiceAtAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    public static function generate($user_id){
        $user = User::find($user_id);
        $per_week = $user->per_week_pay;
        if($user->invoice->isEmpty()){
            $start_date = Carbon::createFromFormat(config('app.date_format'), $user->joining_date);
        }
        else{

        }
        $end_date= Carbon::parse('last friday of '.date('F').' '.date('Y'));
        $working_days = $start_date->diffInDays($end_date)+1;
        // Note: diffInDays does not count start_date or end_date so result+1
        $weeks = round($working_days/7);
        $holidays_after_limit = 0;
        $subtotal = $per_week * $weeks;
        $remaining = 0;
        $bonus = 0;
        $total_excluding_holidays = ($subtotal+$remaining+$bonus)-($per_week/7)*$holidays_after_limit;
        $paypal_email = $user->paypal_email;
        $data = [
            'per_week' => $per_week,
            'weeks' => $weeks,
            'start_date' => $start_date->format(config('app.date_format')),
            'end_date' => $end_date->format(config('app.date_format')),
            'holidays_after_limit' => $holidays_after_limit,
            'subtotal' => $subtotal,
            'remaining' => $remaining,
            'bonus' => $bonus,
            'total_excluding_holidays' => $total_excluding_holidays,
            'paypal_email' => $paypal_email
        ];
        Excel::create('invoice', function($excel) use ($data) {
            $excel->sheet('New sheet', function($sheet) use ($data) {
                $sheet->loadView('invoices.excel.sheet')->with('data',$data);
            });
        })->store('xls', public_path('exports'));
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
    
}
