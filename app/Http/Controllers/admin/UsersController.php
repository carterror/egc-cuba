<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Twilio\TwiML\Voice\Refer;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['isadmin']);
    }
    
    public function index($find=null)
    {
        if (is_null($find)) {
            $users = User::paginate(15);
        }else {
            $users = $find;
        }

        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $users = User::where('name', 'LIKE', '%'.$request->user.'%')->orWhere('email', 'LIKE', '%'.$request->user.'%')->orWhere('phone', 'LIKE', '%'.$request->user.'%')->paginate(30);
        
        return $this->index($users);
        // return view('admin.users.index', compact('users'));
    }

    public function export($id)
    {
        $referidos = User::where('master', $id)->get();
        $master = User::find($id);
        $file = fopen(storage_path("app/referidos-".$id.".txt"), 'w');
        fwrite($file, $master->name." - ".$master->email . PHP_EOL);
        fwrite($file, "" . PHP_EOL);
        foreach ($referidos as $user) :

            fwrite($file, "[".$user->created_at."]: ".$user->name." - ".$user->email . PHP_EOL);

        endforeach;

        if (fclose($file)) :
            return Response::download(storage_path("app/referidos-".$id.".txt"));
        endif;
        // return view('admin.users.index', compact('users'));
    }
    

    public function show($id)
    {
        if ($id == 'c' || $id == 'n') {
            if ($id == 'n') {
                $users = User::latest('rango')->paginate(15);
            } else {
                $users = User::latest('puntos')->paginate(15);
            }

            return view('admin.users.index', compact('users'));
        } else {
            $referidos = User::where('master', $id)->paginate(15);
            $cantirefer = User::where('master', $id)->count();
            $user = User::find($id);
            return view('admin.users.show', compact('referidos', 'user', 'cantirefer'));
        }

    }
    
    public function update(Request $request, $id)
    {
        
        $user = User::find($id);
        
        $user->puntos += $request->puntos; 
        // return $user;
        if($user->update()):
            return back()->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Puntos sumados con éxito']);
        endif;
        
    }
    public function delete($id)
    {
        $user = User::find($id);

        if($user->delete()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Usuario eliminada con éxito']);
        endif;
        
    }
}
