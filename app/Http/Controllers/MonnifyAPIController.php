<?php

namespace App\Http\Controllers;

use App\Models\MonnifyAPI;
use Illuminate\Http\Request;

class MonnifyAPIController extends Controller
{
    public function index()
    {
        $data['monnifyKeys'] = MonnifyAPI::find(1);
        return view('admin.monnify_settings', $data);
    }



public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'secret_key' => 'required',
        'public_key' => 'required',
        'contract_code' => 'required',
    ]);

    // Check if the record already exists
    $monnifyKeys = MonnifyAPI::first();

    if ($monnifyKeys) {
        // Record already exists, update the existing record
        $monnifyKeys->update($validatedData);
    } else {
        // Record does not exist, create a new record
        MonnifyAPI::create($validatedData);
    }

    // Redirect or show a success message
    // For example:
    return redirect()->route('monnify.api')->with('success', 'MOnnify API settings saved successfully.');
}

}
