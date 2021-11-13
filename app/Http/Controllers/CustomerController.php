<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Intervention\Image\Exception\NotReadableException;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $customers=Customer::where('status',1)->get();
        return view('customer',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required',
            'email' => 'required',
            'image' => 'image|mimes:png,jpg, jpeg',
            'phone' => 'required',
            'psw' => 'required',
            'mess' => 'required',
           
           
            
        ]);

        if($request->image){
            $imageName = date('y').'-'.date('m').time().'.'.$request->image->extension();
            Image::make($request->image)->resize(300, 300)->save( 'images/customer/'.$imageName);
         }

         $customer = new Customer();
         $customer->cname = $request->cname;
         $customer->email = $request->email;
         $customer->image = $request->image;
         $customer->phone = $request->phone;
         $customer->psw = $request->psw;
         $customer->mess = $request->mess;
        
         $customer->image = $imageName;
         $customer->save();
        //  toastr()->success('Employe  Data Created Successfully!');
         return redirect()->back();
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
