<?php

namespace App\Http\Controllers;

use App\Models\partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index(Request $request)
    {
        if($request->ajax()){

            // $partners = Partner::get();
            // // return response()->json($partners);
            // dd($partners->name);
        }
        return view('partners.index');

    }

    public function storpartner(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'image'=>'required'
        ]);

        $profile = $request->file('image');
        $image = '';
        if (!empty($profile)) {
            $profileName = $profile->getClientOriginalName();
            $profile->storeAs('partnerIMG', $profileName, "public"); // store in storage
            $image = 'storage/photos/' . $profileName;
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image
        ];

        partner::create($data);

        return response()->json('Partner created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(partner $partenr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(partner $partenr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, partner $partenr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(partner $partenr)
    {
        //
    }
}
