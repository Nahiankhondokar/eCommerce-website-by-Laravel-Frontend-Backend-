<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    
    /**
     *  English language
     */
    public function English(){
        Session() -> get('language');
        Session() -> forget('language');
        Session() -> put('language', 'english');

        return redirect() -> back();
    }

    /**
     *  English language
     */
    public function Hindi(){
        Session() -> get('language');
        Session() -> forget('language');
        Session() -> put('language', 'hindi');

        return redirect() -> back();
    }
}
