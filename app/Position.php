<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 *
 * @package App
 * @property string $name
*/
class Position extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name'];
    
    
}
