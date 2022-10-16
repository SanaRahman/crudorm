<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Auth\Access\Respone;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //make object of the model.
        $students=Student::all();
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        //

        $img=$r->file('file')->getClientOriginalName();
        $r->file->move(public_path('images'),$img);

        $student=new Student;
        $student->name=$r->name;
        $student->regno=$r->regno;
        $student->marks=$r->marks;
        $student->file=$img;
        $student->save();
        return redirect(route('home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $student=Student::find($id);
        return view('view_detail',['std'=>$student]);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $students=Student::all();
        return view('show',['std'=>$students]);
    }

    public function view_detail($id){
      
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
        
       if( Gate::authorize('admin')){
        $student=Student::find($id);
        return view('edit',['std'=>$student]);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        //
        $student=Student::find($id);

        $img=$r->file('file')->getClientOriginalName();
        $r->file->move(public_path('images'),$img);

        $student->name=$r->name;
        $student->regno=$r->regno;
        $student->marks=$r->marks;
        $student->file=$img;
        $student->save();
        return redirect(route('home'));

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
        Student::destroy($id);
         return redirect(route('home'));
    }
}
 