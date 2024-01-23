<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CookiesBanner extends Component
{
    public function render()
    {
        return view('livewire.cookies-banner');
    }

    public function acceptCookies()
    {
        Cookie::queue('cookies_consent', true, 60 * 24 * 30 * 12);
    }

    public function denyCookies()
    {
        Cookie::queue('cookies_consent', false, 60 * 24 * 30 * 12);
    }
}
