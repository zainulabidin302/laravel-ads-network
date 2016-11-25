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
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/seller/ad') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Express Your ad (Title)</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
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
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}"  autofocus>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description </label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control" rows="8" cols="40" required>
                                  {{ old('price') }}
                                </textarea>
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

                        <div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}">
                            <label for="parent" class="col-md-4 control-label">Parent Cateory (Optional) </label>

                            <div class="col-md-6">
                                <select class="form-control" name="category">
                                    <option value="0">Top Level</option>
                                  @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
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
