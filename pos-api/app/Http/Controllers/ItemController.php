<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Item::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'min:3|max:10',
            'price' => 'min:1|max:100',
        ]);
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();
        return response()->json(['message'=>'created', 'data'=> $item], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return item::findOrFail($id);
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
            'name'=>'min:3|max:15',
            'price'=>'min:1|max:100'
        ]);

        $itme = Item::findOrFail($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();

        return response()->json(['massage'=>'Update', 'data'=> $itme], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = Item::distroy($id);
        if($isDeleted == 1){
            return response()->json(['massage'=>'Deleted'], 200);
        }else{
            return response()->json(['massage'=>'Not Found'], 404);
        }
    }

    /**
     * Search for item name
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        return Item::where('name', 'like', '%'.$name.'%')->get();
    }
}