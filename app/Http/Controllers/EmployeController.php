<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
// Use Image;
use Intervention\Image\Exception\NotReadableException;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $employes=Employe::where('status',1)->get();
       return view('employe', compact('employes'));
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
            'ename' => 'required',
            'email' => 'required',
            'image' => 'image|mimes:png,jpg, jpeg',
            'ephone' => 'required',
            'epassword' => 'required',
            'erepassword' => 'required',
            'edept' => 'required',
           
            
        ]);
        if($request->image){
            $imageName = date('y').'-'.date('m').time().'.'.$request->image->extension();
            Image::make($request->image)->resize(300, 300)->save( 'images/employe/'.$imageName);
         }

         $employe = new Employe();
         $employe->ename = $request->ename;
         $employe->email = $request->email;
         $employe->ephone = $request->ephone;
         $employe->epassword = $request->epassword;
         $employe->erepassword = $request->erepassword;
         $employe->edept = $request->edept;
        
         $employe->image = $imageName;
         $employe->save();
         toastr()->success('Employe  Data Created Successfully!');
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
        $request->validate([
            'ename' => 'required',
            'email' => 'required',
            'image' => 'image|mimes:png,jpg, jpeg',
            'ephone' => 'required',
            'epassword' => 'required',
            'erepassword' => 'required',
            'edept' => 'required',
 
        ]);
        if($request->image){  
            $employe = Employe::find($id);
            $filepath = 'images/employe/'. $employe->image;
            if(File::exists($filepath)){
                File::delete($filepath);
            }
            $imageName = date('y').'-'.date('m').time().'.'.$request->image->extension();
            Image::make($request->image)->resize(300, 300)->save( 'images/employe/'.$imageName);
            
         $employe = Employe::find($id);
         $employe->ename = $request->ename;
         $employe->email = $request->email;
         $employe->ephone = $request->ephone;
         $employe->epassword = $request->epassword;
         $employe->erepassword = $request->erepassword;
         $employe->edept = $request->edept;
        
         $employe->image = $imageName??$employe->image;
         $employe->save();
         return redirect()->back();
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employe::find($id);
       
        $filepath = 'images/employe/'. $employe->image;
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $employe->delete();
        toastr()->error('Employe Data deleted Successfully!');
        return redirect()->back();
    }
}
