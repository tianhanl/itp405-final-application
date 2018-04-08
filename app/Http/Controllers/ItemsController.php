<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = DB::table('items')->get();
        return view('items-view', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = DB::table('categories')->get();
        return view('items-create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make([
            'itemname' => $request->input('itemname'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'releasedate' => $request->input('releasedate'),
            'category' => $request->input('category')
        ], [
            'itemname' => 'required:min:3',
            'price' => 'numeric:min:1',
            'description' => 'required:min:5',
            'cateogry' => 'numeric:min:1'
        ]);

        if ($validation->passes()) {
            DB::table('items')->insert([
                'name' => $request->input('itemname'),
                'price' => $request->input('price'),
                'img_url' => $request->input('imgurl'),
                'description' => $request->input('description'),
                'release_date' => $request->input('releasedate'),
                'category_id' => $request->input('category')
            ]);
            return redirect('/items');
        } else {
            return redirect('/items/new')
                ->withInput()
                ->withErrors($validation);
        }
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
        $item = DB::table('items')->where('id', '=', $id)->first();
        $categories = DB::table('categories')->get();
        return view('items-edit', [
            'item' => $item,
            'categories' => $categories,
            'id' => $id
        ]);

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
        $validation = Validator::make([
            'itemname' => $request->input('itemname'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'releasedate' => $request->input('releasedate'),
            'category' => $request->input('category')
        ], [
            'itemname' => 'required:min:3',
            'price' => 'numeric:min:1',
            'description' => 'required:min:5',
            'cateogry' => 'numeric:min:1'
        ]);

        if ($validation->passes()) {
            DB::table('items')->where('id', '=', $id)->update([
                'name' => $request->input('itemname'),
                'price' => $request->input('price'),
                'img_url' => $request->input('imgurl'),
                'description' => $request->input('description'),
                'release_date' => $request->input('releasedate'),
                'category_id' => $request->input('category')
            ]);
            return redirect('/items');
        } else {
            return redirect("/items/$id/edit")
                ->withInput()
                ->withErrors($validation);
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
        //
        DB::table('items')->where('id', '=', $id)->delete();
        return redirect('/items');
    }
}
