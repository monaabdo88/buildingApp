<?php

namespace App\Http\Controllers;

use App\Bu;
use App\Http\Requests\BuRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BuController extends Controller
{
    //
    public function index(Request $request){
        $user_id = $request->id !== null ? '?user_id='.$request->id : null;
        return view('admin.bu.index',compact('user_id'));
    }
    public function create(){
        return view('admin.bu.add');
    }
    public function show(){

    }
    protected function store(BuRequest $request, Bu $bu)
    {
        $user = Auth::user();
        if($file = $request->file('image')){
            $name = upload_img($file,'/public/upload/bu/');
            if(!$name){
                return Redirect::back()->withFlashMessage('أبعاد الصورة أكبر من الأبعاد المسموح بها الرجاء اختيار صورة عرض أقل من 500 بكسل وطول أقل من 300 بكسل');
            }
            $image = $name;
        }
        $data = [
            'bu_name'   => $request->bu_name,
            'bu_price'  => $request->bu_price,
            'bu_rent'   => $request->bu_rent,
            'bu_square' => $request->bu_square,
            'bu_type'   => $request->bu_type,
            'bu_small_disc' => $request->bu_small_disc,
            'bu_meta' => $request->bu_meta,
            'bu_langtuide' => $request->bu_langtuide,
            'bu_latituide' => $request->bu_latituide,
            'bu_large_disc' => $request->bu_large_disc,
            'bu_status' => $request->bu_status,
            'rooms_num' => $request->rooms_num,
            'bath_num' => $request->bath_num,
            'user_id' => $user->id,
            'image'=> $image,
            'month' => date('m')
        ];
        $bu->create($data);
        return redirect('/adminPanel/bu')->withFlashMessage('تم إضافة العقار بنجاح');
    }
    public function edit($id, User $user){
        $bu = Bu::findOrFail($id);
        if($bu->user_id == 0){
            $user = '';
        }else{
            $users = $user->where('id',$bu->user_id)->get()[0];
        }
        $edit = 'edit';
        return view('admin.bu.edit',compact('bu','users','edit'));
    }
    public function update($id, BuRequest $request){
        $bu = Bu::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('image')){
            $name = upload_img($file,'/public/upload/','500','250',base_path().'/public/upload/'.$bu->image);
            if(!$name){
                return Redirect::back()->withFlashMessage('أبعاد الصورة أكبر من الأبعاد المسموح بها الرجاء اختيار صورة عرض أقل من 500 بكسل وطول أقل من 300 بكسل');
            }
            $input['image'] = $name;
        }
        $bu->update($input);
        return redirect('/adminPanel/bu')->withFlashMessage('تم تعديل العقار بنجاح');
    }
    public function destroy($id)
    {
        //
            $bu = Bu::findORFail($id);
            $bu->delete();
            Session::flash('delete_msg_user', 'تم حذف العقار بنجاح');
            return redirect('/adminPanel/bu/')->withFlashMessage('تم حذف العقار بنجاح');
       //   return redirect('/adminPanel/bu')->withFlashMessage('لا يمكن حذف هذه العقار');
    }
    public function anyData(Request $request,Bu $bu){
        if($request->user_id){
            $bus  = $bu->where('user_id',$request->user_id)->get();
        }else{
            $bus  = $bu->all();
        }
        return Datatables::of($bus)
            ->editColumn('bu_name',function ($model){
                return '<a href="/adminPanel/bu/'.$model->id.'/edit">'.$model->bu_name.'</a>';
            })
            ->editColumn('bu_price',function ($model){
                $price = $model->bu_price;
                return $price;
            })
            ->editColumn('bu_type',function ($model){
                $type = bu_type();
                return '<span class="badge badge-info">'.$type[$model->bu_type].'</span>';
            })
            ->editColumn('bu_status',function ($model){
                return $model->bu_status == 0 ? '<span class="badge badge-info"> مفعل</span>': '<span class="badge badge-info">غير مفعل</span>';
            })
            ->editColumn('control',function ($model){
                $all = '<a href="/adminPanel/bu/'.$model->id.'/edit" class="btn btn-info"><i class="fa fa-edit"></i></a> ';
                $all .= ' <a href="/adminPanel/bu/' . $model->id . '/del" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>';

                return $all;
            })
            ->make(true);
    }
    public function show_all_enable(Bu $bu){
        $bu_all = $bu->where('bu_status',0)->orderBy('id','desc')->paginate(15);
        return view('website.all',compact('bu_all'));

    }
    public function for_rent(Bu $bu){
        $bu_all = $bu->where('bu_status',0)->where('bu_rent',1)->orderBy('id','desc')->paginate(15);
        return view('website.all',compact('bu_all'));

    }
    public function for_buy(Bu $bu){
        $bu_all = $bu->where('bu_status',0)->where('bu_rent',0)->orderBy('id','desc')->paginate(15);
        return view('website.all',compact('bu_all'));

    }
    public function showByType($type,Bu $bu){
         if(in_array($type,['0','1','2','3'])){
             $bu_all = $bu->where('bu_status',0)->where('bu_type',$type)->orderBy('id','desc')->paginate(15);
             return view('website.all',compact('bu_all'));
         }else{
             return redirect()->back();
         }
    }
    public function search(Request $request,Bu $bu){
        $request_all = array_except($request->toArray(),['submit','_token','page']);
        $query = DB::table('bu')->select('*');
        $array = [];
        $count = count($request_all);
        $i = 0;
        foreach ($request_all as $key=>$req){
            $i++;
            if($req != ''){
                if($key == 'bu_from' && $request->bu_to == ''){
                    $query->where('bu_price','>=',$request->bu_from);
                }elseif($key == 'bu_to' && $request->bu_from == ''){
                    $query->where('bu_price','<=',$request->bu_to);
                }else{
                    if($key != 'bu_from' && $key != 'bu_to'){
                        $query->where($key,$req);
                    }
                }
                $array[$key] = $req;
            }elseif($count == $i && $request->bu_from != '' && $request->bu_to != ''){
                $query->whereBetween('bu_price',[$request->bu_from,$request->bu_to]);
                $array[$key] = $req;
            }
        }
        $bu_all = $query->paginate(15);
        return view('website.all',compact('bu_all','array'));
    }
    public function show_bu($id, Bu $bu){
        $buInfo = $bu->findOrFail($id);
        $msgTitle = "عقار بإنتظار التفعيل";
        $msgBody = "   هذا العقار".$buInfo->bu_name." مسجل لدينا وبإنتظار التفعيل في مدة أقصاها 24 ساعة ";
        if($buInfo->bu_status == 1){
            return view('website.noper',compact('buInfo','msgTitle','msgBody'));
        }
        $same_rent = $bu->where('bu_rent',$buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
        $same_type = $bu->where('bu_type',$buInfo->bu_type)->orderBy(DB::raw('RAND()'))->take(3)->get();
        return view('website.show',compact('buInfo','same_rent','same_type'));
    }
    public function getAjaxInfo(Request $request , Bu $bu){
        return $bu->findOrFail($request->id)->toJson();
    }
    public function userAddView(){
        return view('website.userAdd');
    }
    public function userStore(BuRequest $request , Bu $bu){
        $user = Auth::user() ? Auth::user()->id : 0;
        if($file = $request->file('image')){
            $name = upload_img($file,'/public/upload/bu/');
            if(!$name){
                return Redirect::back()->withFlashMessage('أبعاد الصورة أكبر من الأبعاد المسموح بها الرجاء اختيار صورة عرض أقل من 500 بكسل وطول أقل من 300 بكسل');
            }
            $image = $name;
        }else{
            $image = '';
        }
        $data = [
            'bu_name'   => $request->bu_name,
            'bu_price'  => $request->bu_price,
            'bu_rent'   => $request->bu_rent,
            'bu_square' => $request->bu_square,
            'bu_type'   => $request->bu_type,
            'bu_small_disc' => strip_tags(str_limit($request->bu_large_disc,160)),
            'bu_meta' => $request->bu_meta,
            'bu_langtuide' => $request->bu_langtuide,
            'bu_latituide' => $request->bu_latituide,
            'bu_large_disc' => $request->bu_large_disc,
            'rooms_num' => $request->rooms_num,
            'bath_num' => $request->bath_num,
            'user_id' => $user,
            'image'=> $image,
            'bu_status' => 1,
            'month' => date('m')
        ];
        $bu->create($data);
        return view('website.done');

    }
    public function showBu($bu_status , Bu $bu){
        $user = Auth::user();
        $bu_all = $bu->where('user_id',$user->id)->where('bu_status',$bu_status)->paginate(10);
        return view('website.showBu',compact('bu_all','user'));
    }
    public function editBu($id){
        $user = Auth::user();
        $bu = Bu::findOrFail($id);
        if($user->id != $bu->user_id){
            $msgTitle = "عقار مخصص لعضو أخر";
            $msgBody = "   هذا العقار ".$bu->bu_name." لم تقم بإضافته وليس لديك صلاحية التعديل عليها ";
            return view('website.noper',compact('buInfo','msgTitle','msgBody'));
        }elseif($bu->bu_status == 0){
            $msgTitle = "عقار مفعل لا يمكن التعديل عليه";
            $msgBody = "   هذا العقار ".$bu->bu_name."لا يمكن التعديل عليه ";
            return view('website.noper',compact('buInfo','msgTitle','msgBody'));

        }
        $edit = 'edit';
        return view('website.editBu',compact('bu','user','edit'));
    }
    public function saveChanges(BuRequest $request){
        $bu = Bu::findOrFail($request->bu_id);
        $input = $request->all();
        if($file = $request->file('image')){
            $name = upload_img($file,'/public/upload/','500','250',base_path().'/public/upload/'.$bu->image);
            if(!$name){
                return Redirect::back()->withFlashMessage('أبعاد الصورة أكبر من الأبعاد المسموح بها الرجاء اختيار صورة عرض أقل من 500 بكسل وطول أقل من 300 بكسل');
            }
            $input['image'] = $name;
        }
        $bu->update($input);
        return Redirect::back()->with('flash_message','تم تعديل العقار بنجاح');
    }
    public function change_status($id,$status,Bu $bu){
        $buUpdate = $bu->findOrFail($id);
        $buUpdate->fill(['bu_status'=>$status])->save();
        return Redirect::back()->with('flash_message','تم تعديل حالة العقار بنجاح');
    }
}
