<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $remember_token
 * @property string $position
 * @property string $department
 * @property integer $ref_user_id
 * @property integer $reporting_user_id
 * @property integer $supervisor_user_id
 * @property string $last_company_name
 * @property string $last_company_position
 * @property string $joining_date
 * @property string $ending_date
 * @property decimal $per_month_pay
 * @property decimal $per_week_pay
 * @property string $paypal_email
*/
class User extends Authenticatable
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'email', 'password', 'date_of_birth', 'remember_token', 'ref_user_id', 'reporting_user_id', 'supervisor_user_id', 'last_company_name', 'last_company_position', 'joining_date', 'ending_date', 'per_month_pay', 'per_week_pay', 'expected_day_of_invoice', 'paypal_email', 'role_id', 'position_id', 'department_id'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPositionIdAttribute($input)
    {
        $this->attributes['position_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRefUserIdAttribute($input)
    {
        $this->attributes['ref_user_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setReportingUserIdAttribute($input)
    {
        $this->attributes['reporting_user_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSupervisorUserIdAttribute($input)
    {
        $this->attributes['supervisor_user_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setDepartmentIdAttribute($input)
    {
        $this->attributes['department_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateOfBirthAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date_of_birth'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['date_of_birth'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setJoiningDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['joining_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['joining_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateOfBirthAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getJoiningDateAttribute($input)
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
    public function setEndingDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['ending_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['ending_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEndingDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    public function scopeOfType($query, $type)
    {
        $role = ($type=='admin') ? 1 : 2;
        return $query->where('role_id', $role);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id')->withTrashed();
    }
    
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id')->withTrashed();
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id')->withTrashed();
    }

    public function ref_user()
    {
        return $this->belongsTo(User::class, 'ref_user_id')->withTrashed();
    }

    public function reporting_user()
    {
        return $this->belongsTo(User::class, 'reporting_user_id')->withTrashed();
    }

    public function supervisor_user()
    {
        return $this->belongsTo(User::class, 'supervisor_user_id')->withTrashed();
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'user_id');
    }
    
}
