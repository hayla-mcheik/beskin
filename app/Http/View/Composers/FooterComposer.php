<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Services;
use App\Models\DoctorsSchedule;

class FooterComposer
{
    public function compose(View $view)
    {
        $services = Services::all();
        $slots = DoctorsSchedule::all();

        $view->with(compact('services', 'slots'));
    }
}
