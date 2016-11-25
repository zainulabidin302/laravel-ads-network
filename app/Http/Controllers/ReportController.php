<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ad;
class ReportController extends Controller
{
    public function adViews(Request $request) {

      if (isset($request['filter']) && $request['filter'] == 1) {
        if (isset($request['range']) && $request['range'] == 1) {
          $list = Ad::where(DB::raw('date(created_at)'), '>=',$request['date'])
            ->where(DB::raw('date(created_at)'), '<=', $request['to'])
            ->paginate(10);
        } else {
          $list = Ad::where(DB::raw('date(created_at)'), '=', $request['date'])->paginate(10);
        }
      } else {
        $list = Ad::paginate(10);
      }

      return view('ad.ads_list_with_stats_categories', ['items' => $list]);
    }

    public function adViewsByCategory(Request $request) {

      if (isset($request['filter']) && $request['filter'] == 1) {
        if (isset($request['range']) && $request['range'] == 1) {

          $list =  DB::table('ads')
                  ->join('adscategory' , 'ads.category_id', '=', 'adscategory.id')
                  ->join('adsview', 'ads.id', '=', 'adsview.ad_id')
                  ->select(DB::raw('COUNT(adsview.id) as  c'), 'adscategory.*')
                  ->groupBy('adscategory.id')
                  ->where(DB::raw('date(adsview.created_at)'), '>=',$request['date'])
                  ->where(DB::raw('date(adsview.created_at)'), '<=', $request['to'])
                  ->paginate(10);
        } else {

          $list =  DB::table('ads')
                  ->join('adscategory' , 'ads.category_id', '=', 'adscategory.id')
                  ->join('adsview', 'ads.id', '=', 'adsview.ad_id')
                  ->select(DB::raw('COUNT(adsview.id) as  c'), 'adscategory.*')
                  ->groupBy('adscategory.id')
                  ->where(DB::raw('date(adsview.created_at)'), '=', $request['date'])
                  ->groupBy('adscategory.id')
                  ->paginate(10);
        }
      } else {
        $list = $data = DB::table('ads')
                ->join('adscategory' , 'ads.category_id', '=', 'adscategory.id')
                ->join('adsview', 'ads.id', '=', 'adsview.ad_id')
                ->select(DB::raw('COUNT(adsview.id) as  c'), 'adscategory.*')
                ->groupBy('adscategory.id')
                ->paginate(10);
      }




      return view('ad.ads_list_with_stats', ['items' => $list]);
    }
    //
}
