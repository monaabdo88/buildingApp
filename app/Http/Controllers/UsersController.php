<?php

namespace App\Http\Controllers;

use App\Bu;
use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function edit($id, User $user,Bu $bu){
        $user = $user->findOrFail($id);
        $activeBu = $bu->where('user_id',$id)->where('bu_status',0)->paginate(10);
        $unactiveBu = $bu->where('user_id',$id)->where('bu_status',1)->paginate(10);
        return view('admin.users.edit',compact('user','activeBu','unactiveBu'));
    }
    public function update($id,User $user, EditUserRequest $request){
        $user = $user->findOrFail($id);
        if($request->email != $user->email){
            $checkemail = $user->where('email',$request->email)->count();
            if($checkemail > 0){
                return Redirect::back()->with('flash_message','البريد الإلكتروني الذي أدخلته مستخدم بالفعل');
            }
        }
        if($request->name != $user->name){
            $checkname = $user->where('name',$request->name)->count();
            if($checkname > 0){
                return Redirect::back()->with('flash_message','أسم المستخدم الذي أدخلته مستخدم بالفعل');
            }
        }
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
    public function editInfo(){
        $user = Auth::user();
        return view('website.userEdit',compact('user'));
    }
    public function saveInfo(EditUserRequest $request){
        $user = Auth::user();
        if($request->email != $user->email){
            $checkemail = $user->where('email',$request->email)->count();
            if($checkemail > 0){
                return Redirect::back()->with('flash_message','البريد الإلكتروني الذي أدخلته مستخدم بالفعل');
            }
        }
        if($request->name != $user->name){
            $checkname = $user->where('name',$request->name)->count();
            if($checkname > 0){
                return Redirect::back()->with('flash_message','أسم المستخدم الذي أدخلته مستخدم بالفعل');
            }
        }
        if($request->password == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user->update($input);
        return Redirect::back()->with('flash_message','تم تعديل العضوية بنجاح');

    }
    public function changePass(EditUserRequest $request){
        $user = Auth::user();
        if(Hash::check($request->email,$user->email)){
            $new_pass = Hash::make($request->new_pass);
            $user->fill(['password'=>$new_pass])->save();
            return Redirect::back()->withFlashMessage(' تم تعديل كلمة المرور بنجاح');
        }else{
            return Redirect::back()->withFlashMessage('الباسورد القديم غير مطابق للباسورد المسجل لدينا');
        }
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
            ->editColumn('myBu',function($model){
                return '<a href="/adminPanel/bu/'.$model->id.'">عقارات العضو</a>';
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

}
