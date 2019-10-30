<?php
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
class LogAfterRequest {
    public function handle($request, \Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
      $url = $request->fullUrl();
      $ip = $request->ip();
      $r = new \App\Requests();
      $r->ip = $ip;
      $r->url = $url;
      $r->request = json_encode($request->all());
      $r->response = json_decode(json_encode($response->all()), true);
      $r->save();
    }
}

