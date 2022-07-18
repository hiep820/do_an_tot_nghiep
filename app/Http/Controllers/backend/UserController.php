<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\user;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{


    function GetUser(){
        if(Gate::allows('is-admin')){
            $data['users'] = user::orderby('id', 'DESC')->paginate(3);
    	return view('backend.users.listuser', $data);
        }
        else{
            abort(403);
        }

    }

    function GetAddUser(){
        if(Gate::allows('is-admin')){

            return view('backend.users.adduser');
        }
        else{
            abort(403);
        }

    }
    function PostAddUser(AddUserRequest $r){
    	$user = new user;
        $user->email = $r->email;
        $user->password = bcrypt($r->password);
        $user->full = $r->full;
        $user->phone = $r->phone;
        $user->address = $r->address;
        $user->level = $r->level;
        $user->save();
        return redirect('/admin/user')->with('thongbao', 'Đã thêm thành công!');
    }
    function GetEditUser($id_user){
        if(Gate::allows('is-admin')){

            $data['user'] = user::find($id_user);
            return view('backend.users.edituser', $data);
        }
        else{
            abort(403);
        }

    }
    function PostEditUser(EditUserRequest $r, $id_user){
        $user = user::find($id_user);
        $user->email = $r->email;
        if($r->password != ""){
            $user->password = bcrypt($r->password);
        }
        $user->full = $r->full;
        $user->phone = $r->phone;
        $user->address = $r->address;
        $user->level = $r->level;
        $user->save();
        return redirect('/admin/user')->with('thongbao', 'Đã sửa thành công!');
    }
    function DeleteUser($id_user){
        user::destroy($id_user);
        return redirect()->back()->with('thongbao', 'Đã xóa Thành viên!');
    }
}
