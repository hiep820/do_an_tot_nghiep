<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\EditCategoryReaquest;
use App\models\category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    function GetCategory(){
    	$data['categorys'] = category::all()->toArray();
    	return view('backend.category.category', $data);
    }
    function PostCategory(CategoryRequest $r){
        if(getLevel(category::All()->toArray(), $r->parent, 1) > 2){
            return redirect()->back()->with('error', 'Giao diện Không hỗ trợ danh mục lớn hơn 2 cấp');
        }
    	$cate = new category;
        $cate->name = $r->name;
        $cate->slug = str::slug($r->name, '-');
        $cate->parent = $r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao', "Đã thêm tên danh mục: ".$r->name);
    }
    function GetEditCategory($id_category){
        $data['cate'] = category::find($id_category);
    	$data['categorys'] = category::all()->toArray();
    	return view('backend.category.editcategory', $data);
    }
    function PostEditCategory(EditCategoryReaquest $r, $id_category){
        if(getLevel(category::All()->toArray(), $r->parent, 1) > 2){
            return redirect()->back()->with('error', 'Giao diện Không hỗ trợ danh mục lớn hơn 2 cấp');
        }
        $cate = category::find($id_category);
        $cate->name = $r->name;
        $cate->slug = str::slug($r->name, '-');
        $cate->parent = $r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao', "Đã sửa tên danh mục: ".$r->name);
    }
    function GetDelCategory($id_category){
        $cate = category::find($id_category);
        category::where('parent', $id_category)->update(['parent' => $cate->parent]);
        category::destroy($id_category);
        return redirect()->back()->with('thongbao', 'Đã xóa danh mục!');
    }
}
