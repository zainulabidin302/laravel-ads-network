@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>{{$ad->title}}</h3>
                </div>
                <div class="panel-body">
                    {{$ad->description}}

                </div>

                <div class="panel-body">
                  @foreach ($ad->adgallery as $row)
                    <img src="{{URL::to('/images')}}/{{$row->image_url}}" style="width: 60px; height: 60px" alt="">
                  @endforeach
                </div>


                <div class="panel-body">
                    <b>Price (Range)</b> :{{$ad->price}}
                </div>
                <div class="panel-body">
                    <b>Sold</b>  :{{$ad->is_sold == true ? "Yes" : 'No'}}
                </div>
                <div class="panel-body">
                    <b>Date Posted</b>  :{{$ad->created_at }}
                </div>
                <div class="panel-body">
                    <b>Last Updated</b>  :{{$ad->updated_at}}
                </div>

                @if (Auth::check() && Auth::user()->getType() == 'Buyer')
                  <div class="panel-body">
                    <form class="" action="/ad/comment" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="ad_id" value="{{$ad->id}}">
                        <input type="text" name="comment" class="form-control">
                        <br>
                        <input type="submit" class="pull-right btn btn-sm btn-default" name="sumbit" value="Comment">
                    </form>

                  </div>
                @endif

                @foreach ($ad->comments as $comment)

                      <div class="panel-body">

                        <div class="col-lg-8">
                          <b>{{$comment->user->name}} </b> Commented :<br>
                          @if (Request::get('editComment') && $comment->id == Request::get('editComment'))
                            <form class="" action="/ad/comment/{{$editComment->id}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="ad_id" value="{{$ad->id}}">
                                        <input type="text" name="comment" value="{{$editComment->comment}}" class="form-control">
                                <br>
                                <input type="submit" class="pull-right btn btn-sm btn-default" name="sumbit" value="Update">
                            </form>



                          @else
                            {{$comment->comment}}
                          @endif



                        </div>
                        <div class="col-lg-4">

                          <div class="pull-right">

                            @if(Auth::user()->id ==  $comment->user_id)

                              <a href="/ad/{{$ad->id}}?editComment={{$comment->id}}" class="btn btn-primary btn-sm"> Edit </a>


                                <form class="form-horizontal" style="display: inline" action="/ad/comment/destroy/{{$comment->id}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="ad_id" value="{{$ad->id}}">

                                    <input type="submit" class="btn btn-sm btn-danger" name="sumbit" value="Delete">
                                </form>


                            @endif
  </div>
                                {{$comment->created_at}}


                        </div>








                        </div>
                        <hr>



                @endforeach



              </div>
            </div>
          </div>
        </div>

@endsection
