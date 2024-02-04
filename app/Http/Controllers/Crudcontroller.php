<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud; // add class for store image in database
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Crypt; //for data encrypt and decrypt
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\myMail;

class Crudcontroller extends Controller
{
    /////////////////////////////////////////////////////////////////////////////////////////////////
    public function dashboard()
    {
        $userdata = Crud::get();
        return view('crud.dashboard',['userdata' =>Crud::latest()->paginate(5)]); ////Crud::latest()->get()]////for getting latest added info//////
    }

    public function create()
    {
        return view('crud.create');
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function store(request $request)
    {
        $mailto=$request->email;
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'image' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $imagename = time() . '.' . $request->image->extension(); // name for image
        $request->image->move(public_path('CrudImages'), $imagename); //move photo in public folder


        $crud = new Crud;
        $crud->image = $imagename; //store in database table with this name
        $crud->name = $request->name;
        $crud->phone =$request->phone;
        $crud->email =$request->email;
        $crud->password =\Hash::make($request->password);
        // $crud->phone =Crypt::encrypt( $request->password);// transfer store data in encrypt  //////important///// add Crypt class on top
        $crud->save();
        Mail::to($mailto)->send(new myMail());

        return redirect()->route('crud.dashboard')->withsuccess('User Created and Email Notification'.$mailto);

    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function delete($id)
    {

        $data = crud::where('id', $id)->first();
        $data->delete();
        return back()->withsuccess('User Deleted...');
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit($id)
    {
        $editdata = Crud::where('id', $id)->first();
        return view('crud.edit', ['edit' => $editdata]);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'image' => 'nullable'
        ]);

        $update=Crud::where('id', $id)->first();

        if (isset($request->image)) {

            $photo = time() . '.' . $request->image->extension();
            $request->image->move(public_path('CrudImages'), $photo);
            $update->image =$photo;
        }

        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;

        // $password =Crypt::decrypt($request->password);
        $update->password =\Hash::make($request->password);
        $update->save();

        return back()->withSuccess('User Updated...');


    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function see($id)
    {
        $seedata = Crud::where('id', $id)->first();

        return view('crud.show', ['see' => $seedata]);
    }


}
