@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Your ads
                </div>
                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          Title
                        </th>
                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>
                    <thead>
                      @foreach ($items as $item)
                      <tr>
                        <td>
                          {{$item->title}}
                        </td>
                        <td>
                          <a href="/ad/{{$item->id}}" class="btn btn-primary">View</a>
                        </td>
                      </tr>
                    @endforeach
                    </thead>
                  </table>
                </div>

            </div>
            @if (count($items) > 0)
            {{$items->links()}}
          @endif
        </div>

    </div>

@endsection
