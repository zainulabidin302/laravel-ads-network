@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      @if (Session::get('created'))
        <div class="alert alert-success">
          {{Session::get('created', '')}}
        </div>
      @endif

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create a new Category
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/admin/categories') }}/{{$current->id}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Category Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $current->title }}" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}">
                            <label for="parent" class="col-md-4 control-label">Parent Cateory (Optional) </label>

                            <div class="col-md-6">
                                <select class="form-control" name="parent">
                                    <option value="0">Top Level</option>
                                  @foreach ($items as $item)
                                    @if ($item->id == $current->category_id)
                                      <option value="{{$item->id}}" selected>{{$item->title}}</option>
                                    @else
                                      <option value="{{$item->id}}">{{$item->title}}</option>
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
                                    Create a Category
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
