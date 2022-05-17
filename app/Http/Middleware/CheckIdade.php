<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckIdade
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $date = Carbon::createFromFormat('d/m/Y', $request->input('dt_nascimento'));
        $anos = $date->diffInYears(Carbon::now());

        dd($anos);

        if($anos >= 21)
        
        return $next($request);
    }
}
