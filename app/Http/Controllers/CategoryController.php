<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\Session;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $list = Category::paginate();
          return view('cat.list', ['items' => $list]);
          //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Category::all();

        return view('cat.create', ['items' => $list]);
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
        $cat = new Category();
        $cat->title = $request['title'];
        $cat->category_id = $request['parent'];
        $cat->save();
        Session::flash('created', 'Category created!');
        return redirect()->route('categories.create');
        //
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
      $current = null;

      $list = Category::all();
      foreach ($list as $row) {
        if ($row->id == $id) {
          $current = $row;
          break;
        }
      }


       return view('cat.edit', ['items' => $list, 'current' => $current]);
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
      $cat = Category::findOrFail($id);

      $cat->title = $request['title'];
      $cat->category_id = $request['parent'];
      $cat->save();
      Session::flash('created', 'Category updated!');
      return redirect()->route('categories.edit', $id);
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
      Category::destroy($id);
      return redirect()->route('categories.index');

        //
    }
}
