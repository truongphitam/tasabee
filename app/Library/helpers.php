<?php
/**
 * Created by PhpStorm.
 * User: PhiTam
 * Date: 11/22/18
 * Time: 10:25 PM
 */

use App\Models\Admins;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
function link_sponsor(){
    $link = ['',
    'https://acecookvietnam.vn/',
    'https://www.idemitsu.com/index.html',
    'https://www.toyota.com.vn/',
    'https://www.mizuno.jp/',
    'https://lotte.com.vn/',
    'https://www.aeon.com.vn/',
    'https://www.panasonic.com/vn/',
    'https://www.ricoh.com.vn/vi-VN/',
    'http://tanita.vn/en/home-en/',
    'http://nipponkoeivn.com/',
    'https://runsystem.net/vi/',
    'https://www.pocarisweat.com.vn/',
    'http://koike-ya.vn/',
    '#',
    'https://www.thienha-kamedafood.com/',
    'https://vietnhatclub.org/',
    'https://www.alsok.com.vn/',
    'https://vn.yamaha.com/index.html',
    'http://meganart.vn/',
    'https://www.amthanoi.com.vn/',
    'https://www.facebook.com/HappyLifeAcademy.vn',
    'https://thangloigroup.vn/',
    'https://kv360.vn/',
    'https://dotrinhhoainam.com/',
    'https://senvangfashion.com/',
    'http://antoangiaothong.gov.vn/',
    'https://jcci.vn/vi/#pll_switcher',
    'https://packagecraft.org/',
    'https://brain-asia.com/',
    'https://www.frontale.co.jp/',
    'https://suntorypepsico.vn/']; 
    return $link;
}

if (!function_exists('generate_code_auto')) {
    function generate_code_auto($type)
    {
        $code = '1';
        $sign = '';
        switch ($type) {
            case 'orders':
                $sign = 'HD';
                $last = Orders::select('id')->orderBy('id', 'desc')->first();
                break; 
        };
        if ($last && $last->id) {
            $code = $last->id + 1;
        }

        return render_code($code, $sign);
    }
}

if (!function_exists('render_code')) {
    function render_code($code, $type)
    {
        $str = 7;
        $lengh = strlen($code);
        if ($lengh >= $str) {
            return $type . '0' . $code;
        }

        $flag = '';
        $max = (int)$str - (int)$lengh;
        for ($i = 0; $i < $max; $i++) {
            $flag .= '0';
        }
        return $type . $flag . $code;
    }
}

if (!function_exists('show_incoterms')) {
    function show_incoterms($active = '')
    {
        $data = ['EXW',	'FAS', 'FOB', 'FCA', 'CFR', 'CPT', 'CIF', 'CIP', 'DAT', 'DAP', 'DDP'];
        echo "<option value=''>Chọn Incoterms</option>";
        foreach ($data as $item) {
            if ($active == $item) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option value='$item' " . $selected . ">";
            echo $item;
            echo "</option>";

        }
    }
}

if (!function_exists('show_method')) {
    function show_method($active = '')
    {
        $data = ['TT', 'LC'];
        echo "<option value=''>Chọn Phương thức</option>";
        foreach ($data as $item) {
            if ($active == $item) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option value='$item' " . $selected . ">";
            echo $item;
            echo "</option>";

        }
    }
}

if (!function_exists('status_orders')) {
    function status_orders($active = '')
    {
        $data = ['Đơn hàng mới', 'Đang xử lý', 'Đang giao hàng', 'Đã giao hàng', 'Hoàn thành'];
        echo "<option value=''>Chọn Phương thức</option>";
        foreach ($data as $key => $item) {
            if ($active == $key) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option value='$key' " . $selected . ">";
            echo $item;
            echo "</option>";

        }
    }
}

if (!function_exists('show_vnd')) {
    function show_vnd($number, $show_vnd = true)
    {
        $_vnd = ' VNĐ';
        if(!$show_vnd){
            $_vnd = '';
        }
        $res = 0;
        if($number){
            $res = number_format($number, 0, ',', '.');
        }
        return  $res. $_vnd;
    }
}

if (!function_exists('format_data_by_locale')) {
    function format_data_by_locale($data = [])
    {
        if(is_object($data)){
            //echo ('1');
            if ($data instanceof \Illuminate\Database\Eloquent\Collection) {
                //echo ('2');
                $res = [];
                foreach ($data as $key => $item) {
                    if (is_object($item)) {
                        $_multilingual = $item->multilingual ? $item->multilingual  : [];
                        $_attributes = $item->getAttributes() ? $item->getAttributes() : [];
                        $_child = [];
                        foreach ($_attributes as $key_child => $item_child) {
                            if (in_array($key_child, $_multilingual)) {
                                $item_child = getLocaleValue($item_child);
                            }
                            $_child[$key_child] = $item_child;
                        }
                        array_push($res, $_child);
                    }
                }
                return $res;
            }else{
                //dd($data->multilingual);
                //echo ('3');
                $res = [];
                //dd($data->multilingual());
                $multilingual = $data->multilingual ? $data->multilingual  : [];
                if(!count($multilingual)){
                    if($data->getTable()){
                        $table = $data->getTable();
                        switch ($table){
                            case 'products':
                                $multilingual = ['title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
                                break;
                        };
                    }
                }
                $attributes = $data->getAttributes() ? $data->getAttributes() : [];
                // echo ('<pre>');
                // //print_r($data);
                // print_r($multilingual);
                // print_r($attributes);
                // echo ('</pre>');
                if($attributes){
                    foreach($attributes as $key => $item){
                        if($multilingual){
                            if(in_array($key, $multilingual)){
                                $item = getLocaleValue($item);
                            }
                        }else{
                            $item = getLocaleValue($item);
                        }
                        //
                        $res[$key] = $item;
                    }
                }
                return (object)$res;
            }
        }
    }
}

if (!function_exists('convertToYMDHIS')) {
    function convertToYMDHIS($date)
    {
        $date = str_replace('/', '-', $date);
        return date('Y-m-d H:i:s', strtotime($date));
    }
}

if (!function_exists('convertToDMYHIS')) {
    function convertToDMYHIS($date)
    {
        return date('d/m/Y H:i:s', strtotime($date));
    }
}

if (!function_exists('convertToYMD')) {
    function convertToYMD($date)
    {
        $date = str_replace('/', '-', $date);
        return date('Y-m-d', strtotime($date));
    }
}
if (!function_exists('convertToDMY')) {
    function convertToDMY($date)
    {
        return date('d/m/Y', strtotime($date));
    }
}

function get_link_detail_post($post_type = '', $slug){ 
    $_link = '';
    switch($post_type){
        case type_posts():
            $_link = 'detailNews';
            break;
        case type_achievements():
            $_link = 'detailAchievements';
            break;
        case type_event():
            $_link = 'detailEvents';
            break;
    }
    $link = $_link ? route($_link, $slug) : '#';
    return $link;
}

function hidden_categories_by_type($type = ''){
    $hidden = '';
    $list_hidden = [type_posts(), type_achievements(), type_purpose()];
    if($type && in_array($type, $list_hidden)){
        $hidden = 'hidden';
    }
    return $hidden;
}

function is_active_routes($route, $param = '', $output = "active"){
    if (Route::currentRouteName() == $route) {
        return $output;
    }
}

function are_active_routes(Array $routes, $param = '', $output = "active"){
    $type = request()->input('post_type') ? request()->input('post_type') : '';

    if($type){
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route && $type == $param) {
                return $output;
            }
        }
    }
}

function type_posts(){
    return 'posts';
};

function type_achievements(){
    return 'achievements';
};

function type_event(){
    return 'event';
};

function type_purpose(){
    return 'purpose';
};

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isActiveRoute($route, $output = "active")
{
    if (Route::currentRouteName() == $route) {
        return $output;
    }
}

function areActiveRoutes(Array $routes, $output = "active")
{
    foreach ($routes as $route) {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }
}

function ifActiveRoute($route, $output = "active", $else = "unactive")
{
    if (Route::currentRouteName() == $route) {
        return $output;
    } else {
        return $else;
    }
}

function format_money($value, $ext = ' VND')
{
    if ($value === null) {
        return '';
    }
    return number_format($value, 0, '', '.') . $ext;
}

function admin_ShowPostCate($parent = 0, $str = "", $type = '')
{
    if ($type != 'post') {
        $data = \App\Models\ProductsCate::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    } else {
        $data = \App\Models\Categories::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    }
    if (isset($data) && !empty($data)) {
        foreach ($data as $item) {
            echo "<tr>";
            echo "<td class='w-100 hidden'>";
            echo "<img src='$item->image' class='img-responsive'/>";
            echo "</td>";
            echo "<td class=''>";
            echo $str . "" . $item->title;
            echo "</td>";
            echo "<td>";
            echo $item->slug;
            echo "</td>";
            echo "<td>";
            echo "$item->created_at ";
            echo "</td>";
            echo "<td class='w-100 text-center'>";
            if ($type == 'products') {
                echo "<a href='" . route('products.cate.show', $item->id) . "' class='btn btn-success btn-xs'>";
            } else {
                echo "<a href='" . route('post.cate.show', $item->id) . "' class='btn btn-success btn-xs'>";
            }
            echo "<i class='fa fa-fw fa-edit'></i>";
            echo "</a>&nbsp;";
            if ($type == 'products') {
                echo "<a onclick='return confirmDelete();return false;' href='" . route('products.cate.destroy',
                        $item->id) . "' class='btn btn-danger btn-xs'>";
            } else {
                echo "<a onclick='return confirmDelete();return false;' href='" . route('post.cate.destroy',
                        $item->id) . "' class='btn btn-danger btn-xs'>";
            }
            echo "<i class='fa fa-fw fa-trash'></i>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
            admin_ShowPostCate($item->id, $str . "-- ", $type);
        }
    }
}

function cate_attributes($parent = 0, $str = "", $select = 0)
{
    $data = \App\Models\Attributes::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    if (isset($data) && !empty($data)) {
        foreach ($data as $item) {
            if ($select == $item->id) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option value='$item->id' " . $selected . ">";
            echo $str . "" . $item->title;
            echo "</option>";
            //cate_attributes($item->id, $str . "-- ", $select);
        }
    }
}

function admin_PostCateSelect($parent = 0, $str = "", $select = 0, $type = '')
{
    if ($type != 'post') {
        $data = \App\Models\ProductsCate::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    } else {
        $data = \App\Models\Categories::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    }
    if (isset($data) && !empty($data)) {
        foreach ($data as $item) {
            if ($select == $item->id) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option value='$item->id' " . $selected . ">";
            echo $str . "" . $item->title;
            echo "</option>";
            admin_PostCateSelect($item->id, $str . "-- ", $select, $type);
        }
    }
}

function categories($parent = 0, $str = "", $param = "", $type = '')
{
    if ($type != 'post') {
        $cate = \App\Models\ProductsCate::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    } else {
        $cate = \App\Models\Categories::where('parent_id', $parent)->orderBy('id', 'desc')->get();
    }
    if (isset($cate) && !empty($cate)) {
        foreach ($cate as $id => $item) {
            $check = "";
            if (isset($param) && !empty($param)) {
                if (in_array($item->id, $param, true)) {
                    $check = "checked";
                }
            }
            echo "<div class='checkbox'>";
            echo "<label>";
            echo $str . "<input type='checkbox' name='products_to_cate[]' value='" . $item->id . "' " . $check . ">" . $item->title;
            echo "</label>";
            echo "</div>";
            categories($item->id, $str . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $param, $type);
        }
    }
}

function getLocaleValue($value, $localeCode = null)
{
    if ($localeCode == null) {
        $localeCode = LaravelLocalization::getCurrentLocale();
    }

    $pattern = "/\[:{$localeCode}\]([^\[]+)\[:/";
    preg_match($pattern, $value, $matches);

    if (isset($matches[1])) {
        return $matches[1];
    } else {
        return '';
    }
}

function _class($route)
{
    $class = '';
    switch ($route) {
        case 'contact';
            $class = 'thong-bao-page';
            break;
        case 'notification';
            $class = 'thong-bao-page';
            break;
        case 'about';
            $class = 'thong-bao-page';
            break;
        case 'detailNotification';
            $class = 'thong-bao-page';
            break;
        default:
            $class = '';
            break;
    }
    return $class;
}

function showCategories($post_type, $select = '')
{
    $cate = \App\Models\Categories::where('post_type', $post_type)->orderBy('id', 'desc')->get();
    if (isset($cate) && !empty($cate)) {
        foreach ($cate as $item) {
            if ($select == $item->id) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option value='$item->id' " . $selected . ">";
            echo $item->title;
            echo "</option>";
        }
    }
}

function serviceIndex($total, $arr)
{
    $subs_arr = array();
    while (count($arr) > 4) {
        $sub = array_slice($arr, 0, 4, false);
        array_splice($arr, 0, 4);
        $subs_arr[] = $sub;
    }
    $subs_arr[] = $arr;
    return $subs_arr;
}

function showAchievements($select = '')
{
    $data = \App\Models\Achievements::orderBy('id', 'desc')->get();
    if (isset($data) && !empty($data)) {
        foreach ($data as $id => $item) {
            $check = "";
            if (isset($select) && !empty($select) && is_array($select)) {
                if (in_array($item->id, $select)) {
                    $check = "checked";
                }
            }
            echo "<div class='checkbox'>";
            echo "<label>";
            echo "<input type='checkbox' name='achievements[]' value='" . $item->id . "' " . $check . ">" . $item->title;
            echo "</label>";
            echo "</div>";
        }
    }
}

function admin_post_categories($parent = 0, $str = "", $post_type = '')
{
    $data = \App\Models\Categories::where('parent_id', $parent)->where('post_type', $post_type)->orderBy('id', 'desc')->get();
    if (isset($data) && !empty($data)) {
        foreach ($data as $item) {
            $route_edit = route('post.cate.show', $item->id).'?post_type='.$post_type;
            $route_delete = route('post.cate.destroy', $item->id);
            echo "<tr>";
            echo "<td class='w-100 hidden'>";
            echo "<img src='$item->image' class='img-responsive'/>";
            echo "</td>";
            echo "<td class=''>";
            echo $str . "" . $item->title;
            echo "</td>";
            echo "<td>";
            echo $item->slug;
            echo "</td>";
            echo "<td>";
            echo "$item->created_at ";
            echo "</td>";
            echo "<td class='w-100 text-center'>";
            echo "<a href='" . $route_edit . "' class='btn btn-success btn-xs'>";
            echo "<i class='fa fa-fw fa-edit'></i>";
            echo "</a>&nbsp;";
            echo "<a onclick='return confirmDelete();return false;' href='" . $route_delete . "' class='btn btn-danger btn-xs'>";
            echo "<i class='fa fa-fw fa-trash'></i>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
            admin_post_categories($item->id, $str . "-- ", $post_type);
        }
    }
}