<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class UserController extends Controller
{
    public function index(Request $request) {

      if (isset($request['filter']) && $request['filter'] == 1) {
        if (isset($request['range']) && $request['range'] == 1) {
          $list = User::
            where(DB::raw('date(created_at)'), '>=',$request['date'])
            ->where(DB::raw('date(created_at)'), '<=', $request['to'])
            ->paginate(10);
        } else {
          $list = User::where(DB::raw('date(created_at)'), '=', $request['date'])->paginate(10);
        }
      } else {
        $list = User::paginate(10);
      }
      return view('user.list', ['items' => $list]);
    }
    //
}
