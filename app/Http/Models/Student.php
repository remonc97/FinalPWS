<?php
/**
 * Written by ChiaChintyaaa
 * Licensed under GNU General Public License v3.0
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nim','name','dateofbirth','address','phonenumber','gender','major'
    ];

    protected $guarded = ['id'];
}