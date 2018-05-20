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
        $bu_created = $bu->select(DB::raw('COUNT(*) as counting , month'))->groupBy('month')->orderBy('month','asc')->get();
        return view('admin.home.index',
            compact('bu_count_active','bu_count_unactive','usersCount','contactCount','mapping','bu_created'));
    }
}
