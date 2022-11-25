<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class DashboardController extends Controller
{
    //
    public function index()
    {

        return response()->view('cms.dashboard', [
        ]);
    }

    public function changeLanguage()
    {
        $newLocale = LaravelLocalization::getCurrentLocale() == 'en' ? 'ar' : 'en';
        App::setLocale($newLocale);
        LaravelLocalization::setLocale($newLocale);
        $url = LaravelLocalization::getLocalizedURL($newLocale, URL::previous(), null, true);
        return redirect()->to($url);
    }
}
