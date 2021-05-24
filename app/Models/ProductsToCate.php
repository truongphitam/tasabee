<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class ProductsToCate extends BaseModel
{
    //
    protected $table = 'products_to_cate';
    protected $fillable = ['user_id', 'cate_id', 'products_id'];

    public static function getNameMultiCate($pro_id)
    {
        $return = "";
        $data = ProductsToCate::where('products_id', $pro_id)->get();
        if (isset($data) && !empty($data)) {
            foreach ($data as $id => $item) {
                $cate = ProductsCate::find($item->cate_id);
                if($cate){
                    $return .= $cate->title;
                    if($id < count($data)-1){
                        $return .= " , ";
                    }
                }
            }
        }
        return $return;
    }
}
