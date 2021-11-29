<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::get();
        // return Student::get()->sum('socre'); sum, average, max, min
        // return Student::get()->contains('name', 'Zhao Lusi'); 
        //return dd(Student::get()->contains('name', 'Zhao Lusi')); // dd: dump and die return TRUE or FALSE
        // return Student::get()->map->age; // Return all age of student
        // return Student::get()->pluck('score', 'name'); // Reutrn key and value
        // return Student::orderBy()->get(); get order by ID
        // return Student::get()->where('score', '>=', 50); //retun student who has score >= 50
        // return dd(Student::get()->sortBy('age')); // pi touch tv thom 
        // return dd(Student::get()->sortByDesc('age')); // pi thom tv touch 
        // return Student::get()->last(); get last value
        // return Student::get()->take(3); get first 3 value
        // return Student::latest()->take(3)->get(); get last 3 value 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->score = $request->score;
        $student->save();

        return response()->json(['massage'=>'Created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::findOrFail($id);
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
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->score = $request->score;
        $student->save();

        return response()->json(['massage'=>'Updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = Student::distroy($id);
        if($isDeleted == 1){
            return response()->json(['massage'=>'Deleted'], 200);
        }else{
            return response()->json(['massage'=>'Not Found'], 404);
        }
    }
}
