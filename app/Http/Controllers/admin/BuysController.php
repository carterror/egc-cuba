<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\BuyMail;
use Illuminate\Http\Request;
use App\Models\Buy;
use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

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

    public function delete()
    {
        
    }

    public function extern($id, $action)
    {

        $buy = Buy::find($id);

    if ($buy->estado == 1) {
            
        if ($action==2) {

            $buy->estado = 2;
            $msg = "Confirmado";

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

        } elseif ($action==1) {

            $msg = "Aceptado";

            $card = Card::find($buy->tarjeta_id);

            $rebaja = Config::get('tienda.'.$buy->currency, 50) - $buy->price;

            $array = [
                "msg" => 'Su orden fue aceptada y está en procedimiento. En cuanto esté lista será contactado mediante WhatsApp o Correo Electrónico. Para efectuar el pago usar el link que aparece a continuación. <a href="https://wa.me/message/GKYEWV4I7PUGF1">Link</a> y escribir "/orden"',
                'tarjeta' => $card->name,
                'valor' => $buy->valor,
                'currency' => $buy->currency,   
                'price' => $buy->price,
                'fecha' => $buy->created_at->format('d/m/Y'),
    
            ];
            
            $user = User::find($buy->user_id);

            Mail::to($user->email)->send(new BuyMail($array));

        } else {
            $buy->estado = 0;

            $card = Card::find($buy->tarjeta_id);

            $array = [
                "msg" => 'Su orden no puedes ser procesada en estos momentos. Pedimos disculpas por los molestias que esto puede ocasionar, puede probar más tarde, y si el problema persiste comuníquese con nosotros para una respuesta más exacta.',
                'tarjeta' => $card->name,
                'valor' => $buy->valor,
                'currency' => $buy->currency,   
                'price' => $buy->price,
                'fecha' => $buy->created_at->format('d/m/Y'),
    
            ];
            
            $user = User::find($buy->user_id);

            Mail::to($user->email)->send(new BuyMail($array));

            $msg = "Cancelado";
        }
    }else {
        $msg = "Antiguo";
    }

        if($buy->save()):
            return redirect()->route('buys')->with(['icon' => 'mdi-action-done blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Estado de compra '.$id.': '.$msg ]);
        endif;
        
    }
}
