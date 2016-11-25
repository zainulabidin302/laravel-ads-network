@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

      @if($user->getType() == 'Buyer')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">
                Welcome <small>({{$user->email}})</small>
              </div>
              <div class="panel-heading">
              Account Type :   {{$user->getType()}}
              </div>

                <div class="panel-heading">
                  <a href="/ads">
                    Find Latest Ads
                  </a>
                </div>

            </div>
        </div>
      @endif



      @if($user->getType() == 'Seller')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">
                Welcome <small>({{$user->email}})</small>
              </div>
              <div class="panel-heading">
              Account Type :   {{$user->getType()}}
              </div>

                <div class="panel-heading">
                  <a href="/seller/ad/create">
                    Create a new Ad
                  </a>
                </div>
                <div class="panel-heading">
                  <a href="/seller/ad">
                    View Ads
                  </a>
                </div>


            </div>
        </div>
      @endif

      @if($user->getType() == 'Admin')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">
                Welcome <small>({{$user->email}})</small>
              </div>
              <div class="panel-heading">
              Account Type :   {{$user->getType()}}
              </div>

                <div class="panel-heading">
                  <a href="/seller/ad">
                    View Ads
                  </a>
                </div>
                <div class="panel-heading">
                  <a href="/admin/views">
                     Ads Statistics
                  </a>
                </div>
                <div class="panel-heading">
                  <a href="/admin/views/categories">
                     Categories Statistics
                  </a>
                </div>
                <div class="panel-heading">
                  <a href="/admin/users">
                    View / Update Users
                  </a>
                </div>
                <div class="panel-heading">
                  <a href="/admin/categories/create">
                    Create a Category
                  </a>
                </div>
                <div class="panel-heading">
                  <a href="/admin/categories">
                    View / Update Categories
                  </a>
                </div>


            </div>
        </div>
      @endif


    </div>
</div>
@endsection
