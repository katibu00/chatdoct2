<?php

namespace App\Http\Controllers;

use App\Models\Preferences;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{
    public function index()
    {
        $data['preferences'] = Preferences::find(1);
        return view('admin.preferences', $data);
    }
    public function store(Request $request)
    {
        $preferences = Preferences::where('id',1)->first();
        $preferences->commission = $request->commission;
        $preferences->welcome_bonus = $request->welcome_bonus;
        $preferences->update();
        return redirect()->route('preferences.index');
    }
}
