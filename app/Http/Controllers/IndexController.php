<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\Buy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index($id)
    {
        switch ($id) {
            case 'all':
                $cards = Card::paginate(Config::get('tienda.product_pag', 9));
                break;
            case '10':
                $cards = Card::where('price', 10)->paginate(Config::get('tienda.product_pag', 9));
                break;
            case '15':
                $cards = Card::where('price', 15)->paginate(Config::get('tienda.product_pag', 9));
                break;
            case '20':
                $cards = Card::where('price', 20)->paginate(Config::get('tienda.product_pag', 9));
                break;
            case '100':
                $cards = Card::where('price', 100)->paginate(Config::get('tienda.product_pag', 9));
                break;
            case '200':
                $cards = Card::where('price', 200)->paginate(Config::get('tienda.product_pag', 9));
                break;     
            
            default:
                $cards = Card::where('name', 'LIKE', '%'.$id.'%')->paginate(Config::get('tienda.product_pag', 9));
                break;
        }
        $conteo=$cards->count();
        return view('index', compact('cards', 'conteo', 'id'));
    }

    public function search(Request $request)
    {
        return redirect()->route('dashboard', $request->buscar);
    }

    public function card($id)
    {
        $card = Card::find($id);

        if (!$card->limited) {
            $valor = [];
            for ($i=$card->price; $i <= $card->top; $i++) { 
                array_push($valor, $i);
            }
        }else {
            $valor = [15, 20, 50, 100, 200];
        }

        return view('card.index', compact('card', 'valor'));
    }


    public function buyCard(Request $request, $id)
    {
        $users = User::where('rango', '<', 20)->get();

        return $users;
        
        $request->validate([
            'currency' => ['required'],
        ]);

        $card = Buy::create([
            'user_id' => Auth::user()->id,
            'tarjeta_id' => $id,
            'estado' => 1,
            'valor' => $request->valor,
            'currency' => $request->currency,   
            'price' => $request->valor*Config::get('tienda.'.$request->currency, 50),
        ]);

        //email


        $user = User::find(Auth::user()->id);
        $user->puntos += $request->valor*Config::get('tienda.bono', 1);
        $user->save();

        $master = User::find($user->master);
        $master->puntos += $request->valor*0.5;
        $master->save();

        return redirect()->route('dashboard', 'all')->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Compra exitosa, Estado: en Espera. Asegurese de haber completado su información...']);
    }

    public function info()
    {
        return view('users.index');
    }

    public function edit_info(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'lastname' => 'required',
            'phone' => 'required'
        ]);

        $user = User::find(Auth::id());

        $user->name=$request->nombre;
        $user->last_name=$request->lastname;
        $user->phone=$request->phone;

        if($user->save()):
            return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Información actualizadas']);
        endif;
        
    }
    
    public function edit_pass(Request $request)
    {

        $request->validate([
            'passa' => 'required|min:8',
            'pass' => 'required|min:8',
            'passc' => 'required|same:pass'
        ]);

        $user = User::find(Auth::id());

            if (Hash::check($request->passa, $user->password)):
                $user->password = Hash::make($request->pass);
            else: 
                return back()->with(['icon' => 'small mdi-alert-error red-text'])->with(['type' => 'red-text'])->with(['message' => 'Su contraseña actual es incorrecta']);
            endif;

            if($user->save()):
                return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Contraseña Actualizada']);
            endif;
        
    }
}
