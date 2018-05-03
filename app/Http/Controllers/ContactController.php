<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Datatables;
class ContactController extends Controller
{
    //
    public function index(){
        return view('admin.contact.index');
    }
    public function store(ContactRequest $request, ContactUs $contactUs){
        $contactUs->create($request->all());
        return Redirect::back()->withFlashMessage('تم إرسال الرسالة بنجاح');
    }
    public function edit($id){
        $contact = ContactUs::findOrFail($id);
        $contact->fill(['view'=> 1])->save();
        return view('admin.contact.edit',compact('contact'));
    }
    public function update($id, ContactRequest $request){
        $contact = ContactUs::findOrFail($id);
        $contact->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('تم تعديل الرسالة بنجاح');
    }
    public function destroy($id)
    {
        //
        $bu = ContactUs::findORFail($id);
        $bu->delete();
        Session::flash('delete_msg_user', 'تم حذف الرسالة بنجاح');
        return redirect('/adminPanel/contact/')->withFlashMessage('تم حذف الرسالة بنجاح');
    }
    public function anyData(ContactUs $contact){
        $contacts  = $contact->all();
        return Datatables::of($contacts)
            ->editColumn('contact_name',function ($model){
                return '<a href="/adminPanel/contact/'.$model->id.'/edit">'.$model->contact_name.'</a>';
            })
            ->editColumn('contact_type',function ($model){
                return '<span class="badge badge-warning">'.contact()[$model->contact_type].'</span>';
            })
            ->editColumn('view',function ($model){
                return $model->view == 0 ? '<span class="badge badge-info">رسالة جديدة</span>': '<span class="badge badge-info">رسالة قديمة</span>';
            })
            ->editColumn('control',function ($model){
                $all = '<a href="/adminPanel/contact/'.$model->id.'/edit" class="btn btn-info"><i class="fa fa-edit"></i></a> ';
                $all .= ' <a href="/adminPanel/contact/' . $model->id . '/del" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>';
                return $all;
            })
            ->make(true);
    }
}
