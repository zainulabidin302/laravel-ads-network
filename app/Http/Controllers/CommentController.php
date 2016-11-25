<?php

namespace App\Http\Controllers;
use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function save(Request $request) {
      $comment = new Comment();
      $comment->comment = $request['comment'];
      $comment->ad_id = $request['ad_id'];
      $comment->user_id = Auth::user()->id;
      $comment->save();


      return redirect()->route('ad.single', $request['ad_id']);
    }
    public function destroy(Request $request, $id) {
      Comment::destroy($id);
      return redirect()->route('ad.single', $request['ad_id']);
    }
    public function update(Request $request, $id) {
      $comment = Comment::findOrFail($id);;
      $comment->comment = $request['comment'];
      $comment->save();

      return redirect()->route('ad.single', $request['ad_id']);
    }
    //
}
