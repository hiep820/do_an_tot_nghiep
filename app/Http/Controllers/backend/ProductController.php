<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\models\Product;
use App\models\category;
use Illuminate\Support\Str;
use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    function GetProduct()
    {



        $data['products'] = product::with("prd_order")

            // ->join("product_order","product.id","=","product_order.product_id")
            // ->join("order","product_order.order_id","=","order.id")
            ->orderby('id', 'DESC')->paginate(5);


        // foreach ($data['products'] as $product) {
        //     $soluong = 0;
        //     $total = 0;
        //     foreach ($product->orders->where('state', 1) as $order) {
        //         $total += $order->prd_order->where('product_id', $product->id)->sum('quantity');
        //         $product->soluong = $product->soluong -  $total;
        //     }
        //         $product->save();
        // }



        return view('backend.product.listproduct', [

            'products'=>  $data['products'],
            //    'total' => $total,
            //    'soluong'=>$soluong
            ]);
    }
    function GetAddProduct()
    {
        $data['categorys'] = category::All()->toArray();
        return view('backend.product.addproduct', $data);
    }
    function PostAddProduct(ProductRequest $r)
    {
        $product = new product;
        $product->category_id = $r->category;
        $product->code = $r->code;
        $product->name = $r->name;
        $product->slug = str::slug($r->name, '-');
        $product->price = $r->price;
        $product->soluong = $r->soluong;
        $product->featured = $r->featured;
        $product->state = $r->state;
        if ($r->hasFile('img')) {
            $file = $r->img;
            $file_name = str::slug($r->name) . '.' . $file->getClientOriginalExtension();
            $file->move('backend/images', $file_name);
            $product->img = $file_name;
        } else {
            $product->img = 'no-img.jpg';
        }

        $product->info = $r->info;
        $product->describe = $r->describe;
        $product->save();
        return redirect('/admin/product')->with('thongbao', 'Đã thêm thành công Sản phẩm: ' . $r->name);
    }

    function GetEditProduct($id_product)
    {
        $data['categorys'] = category::All()->toArray();
        $data['product'] = product::find($id_product);
        return view('backend.product.editproduct', $data);
    }

    function PostEditProduct(EditProductRequest $r, $id_product)
    {
        // dd($r->all);
        $product = product::find($id_product);
        $product->category_id = $r->category;
        $product->code = $r->code;
        $product->name = $r->name;
        $product->slug = str::slug($r->name, '-');
        $product->price = $r->price;
        $product->soluong = $r->soluong;
        $product->featured = $r->featured;
        $product->state = $r->state;
        if ($r->hasFile('img')) {
            if ($product->img != 'no-img.jpg') {
                unlink('backend/images/' . $product->img);
            }
            $file = $r->img;
            $file_name = str::slug($r->name) . '.' . $file->getClientOriginalExtension();
            $file->move('backend/images', $file_name);
            $product->img = $file_name;
        }
        $product->info = $r->info;
        $product->describe = $r->describe;
        $product->save();
        return redirect('/admin/product')->with('thongbao', 'Đã sửa thành công Sản phẩm: ' . $r->name);
    }
    function DeleteProduct($id_product)
    {
        product::destroy($id_product);
        return redirect()->back()->with('thongbao', 'Đã xóa sản pẩm!');
    }
}
