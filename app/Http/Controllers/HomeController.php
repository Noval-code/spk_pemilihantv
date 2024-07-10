<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        $alternatives = Alternative::all();

        $totalCriterias = $criterias->count();
        $totalAlternatives = $alternatives->count();
        if (Auth::id()) {
            $usertype = Auth()->user()->user_type;

            if ($usertype == 'user') {
                return view('admin.adminhome', compact('totalCriterias', 'totalAlternatives'));
            } else if ($usertype == 'admin') {
                return view('admin.adminhome', compact('totalCriterias', 'totalAlternatives'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function post()
    {
        return view("post");
    }
}
