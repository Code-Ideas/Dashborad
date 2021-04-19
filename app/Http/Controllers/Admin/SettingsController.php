<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * @var Setting
     */
    private $setting;

    public function __construct()
    {
        $this->middleware('admin');
        $this->setting = Setting::first();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.settings.edit', ['setting' => $this->setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->setting->update($request->input());

        return redirect()->route('admin.settings.edit')->with('success', 'تم تحديث إعدادات الموقع');
    }
}
