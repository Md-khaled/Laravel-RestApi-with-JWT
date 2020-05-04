<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\Section;
use App\Models\Subject;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Student::with('clsname','section')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validatedData = $request->validate([
        'class_name_id' => 'required',
        'section_id' => 'required',
        'name' => 'required|unique:sections|max:255',
        'phone' => 'required|digits:11',
        'email' => 'required|string|email|unique:students',
        'password' => 'required|string|min:8',
        'image' => 'bail|required',
        'gender' => 'required',
         ]);
           $path='public/admin/img/profile';
            if(!Storage::exists($path)){
                Storage::makeDirectory($path);
            }
            $product_name='';
            $form_data = $request->except(['_token','_method']);
            if ($request->file('image')) {
            $img=$request->file('image');
            $product_name=uniqid('img_',true).$img->getClientOriginalName();
            $img->storeAs($path,$product_name);
            $form_data['image']='storage/app/'.$path.'/'.$product_name;
            }
 //return response()->json($form_data);
            $form_data['password']= Hash::make($request->password);
         Student::create($form_data);
         return response()->json(['msg'=>'data inserted success'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Student::where('id',$id)->first());
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
        
          $validatedData = $request->validate([
        'class_name_id' => 'required',
        'section_id' => 'required',
        'name' => 'required|unique:sections|max:255',
        'phone' => 'required|digits:11',
        'email' => 'required',
        'password' => 'required|string|min:8',
        'image' => 'bail|required',
        'gender' => 'required',
         ]);
           $path='public/admin/img/profile';
            if(!Storage::exists($path)){
                Storage::makeDirectory($path);
            }
            $product_name='';
            $form_data = $request->except(['_token','_method']);
            if ($request->file('image')) {
            $img=$request->file('image');
            $product_name=uniqid('img_',true).$img->getClientOriginalName();
            $img->storeAs($path,$product_name);
            $form_data['image']='storage/app/'.$path.'/'.$product_name;
            }
 //return response()->json($form_data);
            $form_data['password']= Hash::make($request->password);
         //$sub=Subject::findOrFail($id);
         //$sub->update($form_data);
            Student::whereId($id)->update($form_data);
         return response()->json(['msg'=>'data inserted success'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Student::where('id',$id)->delete();
         return response()->json(['msg'=>'data deleted success'],200);
    }
}
