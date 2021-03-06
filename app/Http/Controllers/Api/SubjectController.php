<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\className;
use App\Models\Subject;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Subject::with('clsname')->get());
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
        'name' => 'required|unique:subjects|max:255',
        'code' => 'required|unique:subjects|max:255',
         ]);
         Subject::create($request->all());
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
         //$data=className::where('id',$id)->first();
         return response()->json(Subject::where('id',$id)->first());
    
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
        'name' => 'required|unique:subjects|max:255',
        'code' => 'required|unique:subjects|max:255',
         ]);
         $sub=Subject::findOrFail($id);
         $sub->update($request->all());
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
        Subject::where('id',$id)->delete();
         return response()->json(['msg'=>'data deleted success'],200);
    }
}
