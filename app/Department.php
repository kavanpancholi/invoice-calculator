<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 *
 * @package App
 * @property string $name
 * @property string $department_head_user
*/
class Department extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name', 'department_head_user_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setDepartmentHeadUserIdAttribute($input)
    {
        $this->attributes['department_head_user_id'] = $input ? $input : null;
    }
    
    public function department_head_user()
    {
        return $this->belongsTo(User::class, 'department_head_user_id')->withTrashed();
    }
    
}
