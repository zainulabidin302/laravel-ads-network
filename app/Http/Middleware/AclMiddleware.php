<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;


class AclMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


          $seller_routes = ['ad.create', 'ad.index', 'ad.edit', 'ad.update' , 'ad.store', 'ad.destroy'];
          $buyer_routes =  ['ad.comment.create', 'ad.comment.update', 'ad.comment.destroy'];
          $admin_routes =  ['ad.create', 'ad.index', 'ad.edit',
                            'ad.update' , 'ad.store', 'ad.destroy', 'admin.views',
                            'categories.create',
                            'categories.update',
                            'categories.edit',
                            'categories.store',
                            'categories.index',
                            'categories.destroy',

                            'admin.user.list',
                            'admin.views.cateogries'



                          ];
          //dd(Route::currentRouteName());
          $common_routes = [];

          if ( $request->user()->getType() == 'Admin') {
            if (in_array(Route::currentRouteName(), array_merge ($common_routes, $admin_routes)))
              return $next($request);
          }

          if ( $request->user()->getType() == 'Seller') {
            if (in_array(Route::currentRouteName(), array_merge ($common_routes, $seller_routes)))
              return $next($request);

          }

          if ( $request->user()->getType() == 'Buyer') {
            if (in_array(Route::currentRouteName(), array_merge ($common_routes, $buyer_routes)))
              return $next($request);

          }

        return redirect('/logout');

    }
}
