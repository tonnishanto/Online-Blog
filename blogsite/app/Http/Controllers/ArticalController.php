<?php

namespace App\Http\Controllers;

use App\artical;
use App\category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articals=artical::orderBy('created_at','desc')->paginate(3);
        return view('admin.artical.index',compact('articals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::all();
        return view('admin.artical.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //for image
        $image=$request->file('image');
        $uploade='uploade/image';
        $filename=$image->getClientOriginalName();
        $succes=$image->move($uploade,$filename);

        if($succes) {

            $artical = new artical;
            $artical->user_id = $request->input('user_id');
            $artical->category_id = $request->input('category_id');
            $artical->title = $request->input('title');
            $artical->description = $request->input('description');
            $artical->tag = $request->input('tag');
            $artical->image = $filename;

            $artical->save();

            Session::flash('messege','category created succesfully');
            return Redirect::route('artical.index');

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
        $categories=category::all();
        $artical=artical::find($id);
        return view('admin.artical.edit',compact('artical'))->with('categories',$categories);
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
        //for image
        $image=$request->file('image');
        $uploade='uploade/image';
        $filename=$image->getClientOriginalName();
        $succes=$image->move($uploade,$filename);

        if($succes) {

            $artical=artical::find($id);
            $artical->user_id = $request->input('user_id');
            $artical->category_id = $request->input('category_id');
            $artical->title = $request->input('title');
            $artical->description = $request->input('description');
            $artical->tag = $request->input('tag');
            $artical->image = $filename;

            $artical->save();

            Session::flash('messege','Artical updated succesfully');
            return Redirect::route('artical.index');

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
        $artical=artical::find($id);
        $artical->delete();

        return Redirect::route('artical.index');
    }
}
