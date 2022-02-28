<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Artikel_viewer extends Model
{
    use SoftDeletes;

    protected $table = 'artikel_viewer';
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required'
    );

    public function kategori() {
        return $this->belongsTo('App\Models\Artikel_category', 'id', 'category_id');
    }

    public function artikel() {
        return $this->belongsTo('App\Models\Artikel', 'id', 'artikel_id');
    }
    // Serverside


}
