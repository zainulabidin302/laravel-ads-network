@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @if (Session::get('ad_created'))
        <div class="alert alert-success">
          {{Session::get('ad_created', '')}}
        </div>
      @endif

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create a new Ad
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/seller/ad') }}/{{$item->id}}">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Express Your ad (Title)</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $item->title }}" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price (Optional)</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ $item->price }}"  autofocus>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('is_sold') ? ' has-error' : '' }}">
                            <label for="is_sold" class="col-md-4 control-label">Sold (Optional)</label>

                            <div class="col-md-6">
                                <input id="is_sold" type="checkbox" name="is_sold" {{$item->is_sold == true ? 'checked' : ''}}  autofocus>
                                @if ($errors->has('is_sold'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_sold') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description </label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control" rows="8" cols="40" required>{{$item->description}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file" class="col-md-4 control-label">Gallery </label>

                            <div class="col-md-6">
                                <input id="file" type="file" multiple  class="form-control" name="file[]" value="{{ old('file') }}" >
                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                              @foreach($item->adgallery as $row)
                                <input type="checkbox" name="delete_list[]" value="{{$row->id}}">
                                <img src="{{URL::to('/')}}/images/{{$row->image_url}}" class='thumbnail-size' alt="">


                            @endforeach

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}">
                            <label for="parent" class="col-md-4 control-label">Parent Cateory (Optional) </label>

                            <div class="col-md-6">
                                <select class="form-control" name="category">
                                    <option value="0">Top Level</option>
                                  @foreach ($categories as $r)
                                    @if ($r->id == $item->category_id )
                                      <option value="{{$r->id}}" selected>{{$r->title}}</option>
                                    @else
                                      <option value="{{$r->id}}">{{$r->title}}</option>
                                    @endif


                                  @endforeach
                                </select>

                                @if ($errors->has('parent'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create and Boom !
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            </div>
        </div>


    </div>

@endsection
