<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class Cerrada
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $date = Config::get('tienda.hasta', "23:59");
        $date =  Carbon::parse($date);
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        if(Config::get('tienda.cerrada', 1) == 0):
            return back()->with(['icon' => 'small mdi-alert-error red-text'])->with(['type' => 'red-text'])->with(['message' => 'Tienda cerrada, intente más tarde...']);
        elseif(date('Y-m-d H:i:s') < $date):
            return back()->with(['icon' => 'small mdi-alert-error red-text'])->with(['type' => 'red-text'])->with(['message' => 'Tienda cerrada hasta: '.$date->format('d \\d\\e ').$meses[$date->format('m')-1]." a las ".$date->format('h:i A')]);
        else:
            return $next($request);
        endif;
    }
}
