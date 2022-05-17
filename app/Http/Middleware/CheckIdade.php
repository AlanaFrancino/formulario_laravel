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
        $date = Carbon::createFromFormat('d/m/Y', $request->get('dt_nascimento'));
        $anos = $date->diffInYears(Carbon::now());

        if($anos < 21)
        return redirect()->route('cadastro.index')->with('error','Voce não possui idade para realizar o cadastro');
        
        return $next($request);
    }
}
