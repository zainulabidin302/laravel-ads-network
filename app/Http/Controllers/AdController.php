<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
use \App\Ad;
use \App\Fruit;
use \App\Apple;
use \App\AdGallery;
use \App\Category;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (isset($request['filter']) && $request['filter'] == 1) {
          if (isset($request['range']) && $request['range'] == 1) {
            $list = Ad::
              where(DB::raw('date(created_at)'), '>=',$request['date'])
              ->where(DB::raw('date(created_at)'), '<=', $request['to'])
              ->paginate(10);
          } else {
            $list = Ad::where(DB::raw('date(created_at)'), '=', $request['date'])->paginate(10);
          }
        } else {
          $list = Ad::paginate(10);
        }
        return view('ad.list', ['items' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('ad/create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ad = new Ad();

        $ad->title = $request['title'];
        $ad->description = $request['description'];
        $ad->price = $request['price'];
        $ad->category_id = $request['category'];
        $ad->save();
        $files = $request->file('file');
        if ($files) {
          foreach($files as $file) {
            $filename = md5($ad->id . (time() * rand())) . '.' . $file->extension() ;
            Storage::disk('public')->put($filename, File::get($file));
            $adGallery = new AdGallery();
            $adGallery->image_url = $filename;
            $adGallery->ad()->associate($ad);
            $adGallery->save();
          }
        }

        Session::flash('ad_created', 'Your ad has been created succesfully !');
        return redirect()->route('ad.create');

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
        $categories = Category::all();
        $item = Ad::FindOrFail($id);
        return view('ad.edit', ['item' => $item, 'categories' => $categories]);
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
        $ad = Ad::findOrFail($id);

        $ad->title = $request['title'];
        $ad->description = $request['description'];
        $ad->price = $request['price'];
        $ad->category_id = $request['category'];
        $ad->is_sold = $request['is_sold'] ? true : false;
        $ad->update();
        $files = $request->file('file');
        if ($files) {
          foreach($files as $file) {
            $filename = md5($ad->id . (time() * rand())) . '.' . $file->extension() ;
            Storage::disk('public')->put($filename, File::get($file));
            $adGallery = new AdGallery();
            $adGallery->image_url = $filename;
            $adGallery->ad()->associate($ad);
            $adGallery->save();
          }
        }


        if($request['delete_list']) {
          AdGallery::destroy($request['delete_list']);
        }
        Session::flash('ad_created', 'Your ad has been created succesfully !');
        return redirect()->route('ad.edit', $id);
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
        Ad::destroy($id);
        return redirect()->route('ad.index');
    }
}
