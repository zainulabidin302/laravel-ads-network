@extends('layouts.guest')
@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name', 'Laravel') }}
                </div>
                <div class="m-b-md">

                    <h3>Let me </h3>
                </div>

                <div class="links">
                    <a href="/login">Sign in</a>
                    <a href="/register">Sign up</a>
                    <a href="/home">Lateast Ads</a>
                    <a href="#">What is {{config('app.name', 'No App name')}}</a>
                    <a href="#">Support</a>
                </div>
            </div>


        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Latest Ads Go to <a href="/ads" class="btn btn-primary btn-sm pull-right">Full list</a>

                        </div>
                        <div class="panel-body">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>
                                  Title
                                </th>
                                <th>
                                  Description
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
                                  {{str_limit($item->description, 40, '...')}}
                                </td>
                                <td>
                                  <a href="/ad/{{$item->id}}" class="btn btn-primary">View </a>
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
