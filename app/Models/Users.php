<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Users extends Model
{
    // use SoftDeletes;

    protected $table = 'users';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );
}
