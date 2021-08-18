<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['isadmin']);
    }
    
    public function index()
    {
        $users = User::paginate(6);

        return view('admin.users.index', compact('users'));
    }

    public function delete($id)
    {
        $user = User::find($id);

        if($user->delete()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Usuario eliminada con éxito']);
        endif;
        
    }
}
