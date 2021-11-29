<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;   
class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Story::orderBy('story_id', 'desc')->get();
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
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ]);

        // Move image to storage
        $request->file('image')->store('public/images');

        // Get original name
        $name = $request->file('image')->getClientOriginalName();

        // Get size
        $size = $request->file('image')->getsize();
        
        // Add to database
        $story = new Story();
        $story->title = $request->title;
        $story->image = $request->file('image')->hashName();
        $story->original_name = $name;
        $story->size = $size;
        $story->save();

        // Return message
        return response()->json(['message'=>'Created'], 201);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Story::findOrFail($id);
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
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ]);

        // Move image to storage
        $request->file('image')->store('public/images');

        // Get original name
        $name = $request->file('image')->getClientOriginalName();

        // Get size
        $size = $request->file('image')->getsize();
        
        // Add to database
        $story = Story::findOrFail($id);
        $story->title = $request->title;
        $story->image = $request->file('image')->hashName();
        $story->original_name = $name;
        $story->size = $size;
        $story->save();

        // Return message
        return response()->json(['message'=>'Updated'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Story::destroy($id);
        if ($story == 1){
            return response()->json(['massage'=>'Deleted'], 200);
        }else{
            return response()->json(['massage'=> 'Cannot delete empty id'], 404);
        }
    }
}
