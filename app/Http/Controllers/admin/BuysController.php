<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;

class BuysController extends Controller
{
    public function index()
    {
        $buys = Buy::with(['user','card'])->paginate(6);

        return view('admin.buys.index', compact('buys'));
    }

    public function delete($id)
    {
        $user = Buy::find($id);

        if($user->delete()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Usuario eliminada con éxito']);
        endif;
        
    }
}
