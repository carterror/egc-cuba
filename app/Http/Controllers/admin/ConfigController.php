<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Card;
use App\Models\Buy;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{
    public function index()
    {
        $users = User::count();
        $card = Card::count();
        $counth= Buy::whereDate('created_at', '=', date('Y-m-d'))->count();
        $buysh= Buy::whereDate('created_at', '=', date('Y-m-d'))->where('estado', 2)->count();
        $count= Buy::count();
        $buys= Buy::where('estado', 2)->count();
        $buyms= Buy::where('estado', 2)->sum('valor');
        $buymsh= Buy::whereDate('created_at', '=', date('Y-m-d'))->where('estado', 2)->sum('valor');

        $data = ['users' => $users, 'card' => $card, 'buysh' => $buysh, 'counth' => $counth, 'count' => $count, 'buys' => $buys, 'buyms'  => $buyms, 'buymsh'  => $buymsh];

        return view('admin.index', $data);
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