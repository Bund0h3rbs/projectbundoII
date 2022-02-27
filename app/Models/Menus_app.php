<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class Menus_app extends Model
{
    use SoftDeletes;

    protected $table = 'menus_app';
    protected $guarded = ['id'];

    public static $rules = array(
        // 'code' => 'required',
        'name' => 'required'
    );


    public function parent($id){
        $query = $this->find($id);
        return $query;
    }


    public function setName($value) {
        $this->attributes['name'] = $value;
    }

    public function setCode($value) {
        $this->attributes['id'] = $value;
    }

    public function parentsmenu() {
        return $this->belongsTo('App\Models\Menus_app', 'id', 'parent');
    }

    public function parents() {
        return $this->hasOne('App\Models\Menus_app', 'id', 'parent');
    }

    public static function nestedSelect() {

        $tmp_depts = Menus_app::select(['*']);
        $user = \Auth::user();
        $tmp_depts = $tmp_depts->get();
        $depts = array();
        foreach ($tmp_depts as $key => $val) {
            $pi = $val->getParentsIndex();
            $prefix = '';
            for ($i = 0; $i < $val->level - 1; $i++) {
                $prefix .= '- ';
            }

            $val->setName($prefix . $val->name);
            $depts[$pi . '#id_' . $val->id] = $val->name;
        }
        ksort($depts);
        $result = array();
        foreach ($depts as $key => $r) {
            $key = substr($key, strpos($key, "#id_") + 4);
            $result[$key] = $r;
        }
        return $result;
    }

    public function getParentsIndex() {
        $parentalIndex = "#" . str_pad($this->id, 3, '0', STR_PAD_LEFT);
        $this->level = 1;

        if ($this->parent !== null && $this->parent != 0 && $this->parents()) {
            $p = Menus_app::find($this->parent);
            if ($p) {
                $parentalIndex = str_pad($p->getParentsIndex(), 3, '0', STR_PAD_LEFT) . "_" . $parentalIndex;
                $this->level += $p->level;
            }
        }
        $this->parentalIndex = $parentalIndex;
        return $parentalIndex;
    }

    public static function getChildRecursive($id) {
        $menus = Menus_app::find($id);
        if ($menus) {
            return $menus->getChilds($menus, [$menus->id]);
        } else {
            return [$id];
        }
    }

    public function getChilds($data, $ids = []) {
        if (isset($data->childs)) {
            if (count($data->childs) > 0) {
                foreach ($data->childs as $ch) {
                    $ids[] = $ch->id;
                    $ids = $ch->getChilds($ch, $ids);
                }
            }
        }

        return $ids;
    }

    public static function menusTurunan() {

        $tmp_depts = Menus_app::select(['*']);
        $user = \Auth::user();
        $tmp_depts = $tmp_depts->get();
        $depts = array();
        foreach ($tmp_depts as $key => $val) {
            $pi = $val->getParentsIndex();
            $prefix = '';
            for ($i = 0; $i < $val->level - 1; $i++) {
                $prefix .= '- ';
            }

            if($val->status == 'Y'){
                $status = "Publish";
            }else{
                $status = "Draf";
            }

            $val->setName($prefix . $val->name);
            $depts[$pi . '#id_' . $val->id] = $val->name .' ( '. $status .' )';
        }
        ksort($depts);
        $result = array();
        foreach ($depts as $key => $r) {
            $key = substr($key, strpos($key, "#id_") + 4);
            $result[$key] = $r;
        }
        return $result;
    }

    // Serverside

    public function totaldata($request){
        if (!empty($request->search['value'])) {
            $value = $request->search['value'];
            $data = Menus_app::where('id', 'LIKE', '%' . $value . '%')
                    ->orWhere('name', 'LIKE', '%' . $value . '%')
                    ->orWhere('modul', 'LIKE', '%' . $value . '%')
                    ->orWhere('link', 'LIKE', '%' . $value . '%')
                    ->count();
          }else {
                 $data = Menus_app::count();
        }
        return $data;
    }

    public function filterlist($request){
        if (!empty($request->search['value'])){
            $value = $request->search['value'];
                $data =  Menus_app::where('id', 'LIKE', '%' . $value . '%')
                ->orWhere('name', 'LIKE', '%' . $value . '%')
                ->orWhere('modul', 'LIKE', '%' . $value . '%')
                ->orWhere('link', 'LIKE', '%' . $value . '%');
         }else {
                $data = Menus_app::select(['*']);
        }
        return $data;
    }


}
