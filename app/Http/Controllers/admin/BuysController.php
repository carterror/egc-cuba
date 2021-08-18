<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;
use App\Models\User;
use Illuminate\Support\Facades\Config;

class BuysController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['isadmin']);
    }

    public function index()
    {
        $buys = Buy::with(['usert','card'])->latest('Updated_at')->paginate(6);
        return view('admin.buys.index', compact('buys'));
    }

    public function delete($id, $action)
    {

        $buy = Buy::find($id);

        if ($action==2) {
            $buy->estado = 2;
            $msg = "Aceptado";

            $user = User::find($buy->user_id);
            $user->puntos += $buy->valor*Config::get('tienda.bono', 1);
            $user->save();

            $master = User::find($user->master);
            if (!is_null($master)) {
            $master->puntos += $buy->valor*0.5;
            $master->save();
            }


        } else {
            $buy->estado = 0;
            $msg = "Cancelado";
        }

        if($buy->save()):
            return back()->with(['icon' => 'mdi-action-done blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Estado de compra: '.$msg ]);
        endif;
        
    }

    public function extern($id, $action)
    {

        $buy = Buy::find($id);

    if ($buy->estado == 1) {
            
        if ($action==2 ) {

            $buy->estado = 2;
            $msg = "Aceptado";

            $user = User::find($buy->user_id);

            if ($user->rango >= 5) {
                $user->puntos +=  $buy->valor*Config::get('tienda.bono', 1);
            }else {
                $user->puntos += $buy->valor*0.75;
            }

            $user->save();

            if (!is_null($user->master)) {
                $master = User::findOrFail($user->master);

                if ($master->rango >= 20) {
                    $master->puntos += $buy->valor*Config::get('tienda.bonopla', 0.75);
                }else {
                    $master->puntos += $buy->valor*0.5;
                }

                $compras = Buy::where('user_id', $user->id)->where('estado', 2)->count();
                
                if (!$compras) {

                    $master->rango++;

                    switch ($master->rango) {
                        case '1':
                            $master->puntos += 100;
                            break;
                        case '5':
                            $master->puntos += 375;
                            break;
                        case '10':
                            $master->puntos += 450;
                            break;
                        case '20':
                            $master->puntos += 950;
                            break;
                    }
                }

                $master->save();
            }

        } else {
            $buy->estado = 0;
            $msg = "Cancelado";
        }
    }else {
        $msg = "antiguo";
    }

        if($buy->save()):
            return redirect()->route('buys')->with(['icon' => 'mdi-action-done blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Estado de compra '.$id.': '.$msg ]);
        endif;
        
    }
}
