<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\AdView;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Facades\Agent;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
          return view('home', ['user' => $request->user()]);
    }
    public function ads_list(Request $request) {
      
      if (Auth::check() && $request->user()->getType() == 'Seller') {
        return redirect()->route('/seller/ad');
      }

      $list = Ad::paginate(15);
      return view('ad.ads_list', ['items' => $list]);
    }

    public function ad(Request $request, $id) {
      $adView = new AdView();
      $adView->is_logged_in = Auth::check() ;
      if ($adView->is_logged_in) {
        $adView->user_id = ($request->user()->id);
      }

      $adView->from_url = $request->server()['HTTP_REFERER'];
      $adView->device = Agent::isMobile() ? 'Mobile' : 'Web';
      $adView->ad_id = $id;
      $adView->ip = $request->server()['REMOTE_ADDR'];
      $adView->landing_page_url = $request->server()['REQUEST_URI'];

      $adView->save();

      $ad = Ad::findOrFail($id);
      $editComment = null;
      if ($request['editComment']) {
        $editComment = Comment::find($request['editComment']);
      }

      return view('ad.single', ['ad' => $ad, 'editComment' => $editComment]);
    }
}
