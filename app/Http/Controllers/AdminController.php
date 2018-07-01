<?php

namespace App\Http\Controllers;

use App\Bu;
use App\ContactUs;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index(User $user, Bu $bu, ContactUs $contact){
        $bu_count_active = get_count_active(0);
        $bu_count_unactive = get_count_active(1);
        $usersCount = $user->count();
        $contactCount = $contact->count();
        $mapping = $bu->select('bu_langtuide','bu_latituide','bu_name')->get();
        $bu_created = $bu->select(DB::raw('COUNT(*) as counting , month'))->where('year',date('Y'))->groupBy('month')->orderBy('month','asc')->get()->toArray();
        $array = [];
        if(isset($bu_created[0]['month'])){
            for($i = 1 ;$i < $bu_created[0]['month']; $i++ ){
                $array[] = 0;
            }
        }
        $new = array_merge($array , $bu_created);
        $lastUser = $user->take(8)->orderBy('id','desc')->get();
        $lastBu = $bu->take(10)->orderBy('id','desc')->get();
        $lastMsg = $contact->take(7)->orderBy('id','desc')->get();
        return view('admin.home.index',
            compact('bu_count_active','bu_count_unactive','usersCount','contactCount',
                'mapping','new','lastUser','lastBu','lastMsg'));
    }
    public function showYear(Bu $bu){
        $year = date('Y');
        $bu_created = $bu->select(DB::raw('COUNT(*) as counting , month'))->where('year',date('Y'))->groupBy('month')->orderBy('month','asc')->get()->toArray();
        $array = [];
        if(isset($bu_created[0]['month'])){
            for($i = 1 ;$i < $bu_created[0]['month']; $i++ ){
                $array[] = 0;
            }
        }
        $new = array_merge($array , $bu_created);
        return view('admin.home.statics',compact('year','new'));
    }
    public function selectYear(Request $request , Bu $bu){
        $year =$request->year;
        $bu_created = $bu->select(DB::raw('COUNT(*) as counting , month'))->where('year',$year)->groupBy('month')->orderBy('month','asc')->get()->toArray();
        $array = [];
        if(isset($bu_created[0]['month'])){
            for($i = 1 ;$i < $bu_created[0]['month']; $i++ ){
                $array[] = 0;
            }
        }
        $new = array_merge($array , $bu_created);
        return view('admin.home.statics',compact('year','new'));

    }
}
