<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Card;
use App\Models\Buy;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['isadmin']);
    }
    
    public function index()
    {
        $date = new Carbon('2021/12/10');

        $users = User::get();
        $card = Card::count();
        $counth= Buy::whereDate('created_at', '=', date('Y-m-d'))->count();
        $buysh= Buy::whereDate('created_at', '=', date('Y-m-d'))->where('estado', 2)->count();
        $count= Buy::whereDate('created_at', '>', $date)->count();
        $buys= Buy::where('estado', 2)->whereDate('created_at', '>', $date)->count();
        $buyms= Buy::where('estado', 2)->whereDate('created_at', '>', $date)->sum('valor');
        $buymsh= Buy::whereDate('created_at', '=', date('Y-m-d'))->where('estado', 2)->sum('valor');

        $cards = DB::select('SELECT tarjeta_id, count(tarjeta_id) c FROM buys WHERE estado = 2 AND created_at > ? GROUP BY tarjeta_id HAVING c > ?', [$date, 1]);
        
        $ventas = 0;
        $id = 0;

        foreach ($cards as $value) {
            if ($value->c > $ventas) {
                $ventas = $value->c;
                $id = $value->tarjeta_id;
            }
        }

        $cardvv = Card::find($id);

        $data = ['cardvv' => $cardvv, 'ventas' => $ventas, 'users' => $users, 'card' => $card, 'buysh' => $buysh, 'counth' => $counth, 'count' => $count, 'buys' => $buys, 'buyms'  => $buyms, 'buymsh'  => $buymsh];

        return view('admin.index', $data);
    }

    public function limpia()
    {
        $historial = Buy::where('estado', 0)->get();

        foreach ($historial as $h) {
            try {
                $h->delete();
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        return dd($historial);
    }

    public function config()
    {
        return view('admin.config.index');
    }

    public function store(Request $request)
    {

        $config = config_path('tienda.php');
        if(!file_exists($config)): 
            fopen($config, 'w');
        endif;
        $array = $request->except(['_token']);
        $file = fopen($config, 'w');
        fwrite($file, '<?php'.PHP_EOL);
        fwrite($file, ''.PHP_EOL);
        fwrite($file, 'return [ '.PHP_EOL);
        fwrite($file, ''.PHP_EOL);
        
        foreach ($array as $key => $value):
            if(is_null($value)): 
                fwrite($file, '"'.$key.'" => null,'.PHP_EOL);
            elseif(is_numeric($value)):
                fwrite($file, '"'.$key.'" => '.$value.','.PHP_EOL);
            else:
                fwrite($file, '"'.$key.'" => "'.$value.'",'.PHP_EOL);
            endif;

            fwrite($file, ''.PHP_EOL);
        endforeach;

        if (fwrite($file, '];'.PHP_EOL)):

        fclose($file);

        Artisan::call('config:cache');

        sleep(3);

        return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Configuraciones actualizadas con éxito']);

        endif;
    }
}
