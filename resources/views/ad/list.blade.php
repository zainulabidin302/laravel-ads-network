@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">
                Ads
            </div>

              <div class="panel-heading">
                    <a href="?date={{\Carbon\Carbon::now()->toDateString() }}&range=0&filter=1">Today</a> |
                    <a href="?date={{\Carbon\Carbon::now()->subDay()->toDateString() }}&range=0&filter=1">Yesterday</a> |
                    <a href="?date={{\Carbon\Carbon::now()->subWeek()->toDateString() }}&to={{\Carbon\Carbon::now()->toDateString()}}&range=1&filter=1">Last Week</a> |
                    <a href="?date={{\Carbon\Carbon::now()->subWeek(4)->toDateString() }}&to={{\Carbon\Carbon::now()->toDateString()}}&range=1&filter=1">Last Month</a> |
                    <a href="?date={{\Carbon\Carbon::now()->subWeek(52)->toDateString() }}&to={{\Carbon\Carbon::now()->toDateString()}}&range=1&filter=1">Last Year</a> |
                    <a href="?">Reset</a>

                    <form class="form-horizontal" style="display: inline;" action="?" method="get">
                        <input type="submit" name="submit" value="Submit" class="btn btn-default btn-sm pull-right">
                        <input type="hidden" name="filter" value="1">
                        <input type="hidden" name="range" value="0">
                         <input type="date" name="date" id="date-input" class="pull-right" style="margin-right: 10px; " >
                    </form>

                </div>
                <div class="panel-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          Title
                        </th>
                        <th colspan="2">
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
                          <a href="/seller/ad/{{$item->id}}/edit" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                          <form class="form-horizontal" role="form" method="POST" action="{{ url('/seller/ad') }}/{{$item->id}}">
                              {{ csrf_field() }}
                              {{ method_field('DELETE')}}
                              <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                          </form>
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
