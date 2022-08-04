<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $data['setting'] = Setting::where('id', '1')->first();
        return view('admin.setting.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'website_name' => 'required',
            'logo' => 'nullable',
            'favicon' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'required|string|max:200',
            'meta_description' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $setting = Setting::where('id', '1')->first();
        if ($setting) {
            $setting->website_name = $request->website_name;

            if ($request->hasFile('logo')) {

                $destination = 'images/setting/' . $setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $photo = $request->file('logo');
                $photo_name = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move('images/setting', $photo_name);
                $setting->logo = $photo_name;
            }

            if ($request->hasFile('favicon')) {

                $destination = 'images/setting/' . $setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $photo = $request->file('favicon');
                $photo_name = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move('images/setting', $photo_name);
                $setting->favicon = $photo_name;
            }

            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_description = $request->meta_description;
            $setting->meta_keyword = $request->meta_keyword;

            if ($setting->isDirty()) {
                $setting->save();
                return redirect()->route('settings.index')->with('success', 'Settings Updated successfully');
            }
            return back()->with('error', 'Nothing Changed !!');
        } else {
            // dd($request->website_name);
            $setting = new Setting();
            $setting->website_name = $request->website_name;

            if ($request->hasFile('logo')) {
                $photo = $request->file('logo');
                $photo_name = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move('images/setting', $photo_name);
                $setting->logo = $photo_name;
            }

            if ($request->hasFile('logo')) {
                $photo = $request->file('logo');
                $photo_name = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move('images/setting', $photo_name);
                $setting->logo = $photo_name;
            }

            if ($request->hasFile('favicon')) {
                $photo = $request->file('favicon');
                $photo_name = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move('images/setting', $photo_name);
                $setting->favicon = $photo_name;
            }

            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_description = $request->meta_description;
            $setting->meta_keyword = $request->meta_keyword;

            $setting->save();
            return redirect()->route('settings.index')->with('success', 'Settings Added Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
