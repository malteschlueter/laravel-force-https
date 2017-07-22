<?php

namespace Mschlueter\Routing\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class ForceHttps {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if(App::environment('production') && !$request->secure()) {
            return redirect()->secure($this->getUri($request));
        }

        return $next($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    protected function getUri($request) {

        $uri = str_replace($request->getBaseUrl(), '', $request->getRequestUri());

        return $uri;
    }
}
