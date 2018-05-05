<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Datatables;

class UsersController extends Controller
{
    //
    public function index(){
        return view('admin.users.index');
    }
    public function create(){
        return view('admin.users.add');
    }
    protected function store(AddUserRequest $request, User $user)
    {
         $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect('/adminPanel/users')->with('flash_message','تمت اضافة العضوية بنجاح');
    }
    public function edit($id, User $user){
        $user = $user->findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }
    public function update($id,User $user, Request $request){
        $user = $user->findOrFail($id);
        if($request->password == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user->update($input);
        return redirect('/adminPanel/users')->with('flash_message','تم تعديل العضوية بنجاح');
    }
    public function destroy($id)
    {
        //
        if($id != 1) {
            $user = User::findORFail($id);
            $user->delete();
            Session::flash('delete_msg_user', 'The User Has Been Deleted Successfully');
            return redirect('/adminPanel/users/')->with('flash_message','تم حذف العضوية بنجاح');
        }
        return redirect('/adminPanel/users')->with('flash_message','لا يمكن حذف هذه العضوية');
    }
    public function anyData(User $user){
        $users  = $user->all();
        return Datatables::of($users)
            ->editColumn('name',function ($model){
            return '<a href="/adminPanel/users/'.$model->id.'/edit">'.$model->name.'</a>';
            })
            ->editColumn('email',function ($model){
                $email = $model->email;
                return $email;
            })
            ->editColumn('is_admin',function ($model){
                return $model->is_admin == 0 ? '<span class="badge badge-info">عضو</span>': '<span class="badge badge-info">مدير</span>';
            })
            ->editColumn('control',function ($model){
                $all = '<a href="/adminPanel/users/'.$model->id.'/edit" class="btn btn-info"><i class="fa fa-edit"></i></a> ';
                if($model->id != 1) {
                    $all .= ' <a href="/adminPanel/users/' . $model->id . '/del" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>';
                }
                return $all;
            })
            ->make(true);
    }
    public function editInfo(){
        $user = Auth::user();
        return view('website.userEdit',compact('user'));
    }
    public function saveInfo(AddUserRequest $request){
        $user_id = Auth::user();
        $user = User::findOrFail($user_id);
        if($request->password == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user->update($input);
        return Redirect::back()->with('flash_message','تم تعديل العضوية بنجاح');

    }
}
