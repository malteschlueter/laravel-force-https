<?php

namespace Mschlueter\Routing\Middleware;

use Closure;

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

        if(!$request->secure()) {
            return redirect()->secure($this->getUri($request));
        }

        return $next($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    protected function getUri($request) {

        $uri = str_replace($request->getBaseUrl(), '', $request->getRequestUri());

        return $uri;
    }
}
