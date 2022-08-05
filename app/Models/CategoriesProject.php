<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CategoriesProject extends Model
{
    use HasFactory;
    public $timestamps = false;

    static function catSave($proid, $catid) {
        DB::table('categories_projects')->insert(
            [
                'project_id' => $proid,
                'category_id' => $catid
            ]
        );
    }

    static function oldCatDelete ($proid, $catid) {
        DB::table('categories_projects')->where(
            [
                ['project_id', '=', $proid],
                ['category_id', '=', $catid]
            ]
        )->delete();
    }
}
