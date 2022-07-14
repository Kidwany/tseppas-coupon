<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\About;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function edit()
    {
        //Gate::authorize("updateContactInfo", Contact::class);

        $about = About::orderBy('created_at', 'desc')->first();
        return view('dashboard.about.edit', compact('about'));
    }


    public function update(Request $request)
    {
        //Gate::authorize("updateContactInfo", Contact::class);

        $input = $request->all();
        $this->validate($request,[
            'about_en'      => 'bail|required',
            'about_ar'      => 'bail|required',
        ]);

        $about = About::orderBy('created_at', 'desc')->first();
        $about->update($input);

        Session::flash('update', 'تم تعديل عن الشركة بنجاح');
        return redirect(adminUrl('about/edit'));
    }
}
