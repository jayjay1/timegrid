<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Log;

class LanguageController extends Controller
{
    /**
     * Switch Language
     * @param  string  $lang    Language iso code
     * @param  Session $session Session Facade
     * @param  Log     $log     Log class
     * @return Redirect         HTTP Redirect
     */
    public function switchLang($lang, Session $session, Log $log)
    {
        $log::info("Language switch Request to $lang");
 
        if (array_key_exists($lang, Config::get('languages'))) {
            $log::info('Language Switched');
            $session::set('applocale', $lang);
            $locale = \Locale::parseLocale($lang);
            $session::set('language', $locale['language']);
        }
 
        return Redirect::back();
    }
}
