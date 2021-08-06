<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::paginate(6);

        return view('admin.cards.index', compact('cards'));
    }

    public function create()
    {
        return view('admin.cards.create');
    }
    
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => ['required', 'string', 'max:50'],
            'tipo' => ['required'],
            'price' => ['required', 'numeric'],
            'descripcion' => ['required', 'string', 'max:80'],
        ]);

        //$fileExt = trim($request->photo->getClientOriginalExtension());
        //$upload_path = Config::get('filesystems.disks.uploads.root');
        //$name = Str::slug(str_replace($fileExt,'',$request->photo->getClientOriginalName()));

        //$filename= rand(1,999).'-logo-'.$name.'.'.$fileExt;

        //$final_file= $upload_path.'/'.$filename;

        if(is_null($request->limited)){
            $limited = 1;
        }else{
            $limited = 0;
        }

        $card = card::create([
            'name' => $request->nombre,
            'type' => $request->tipo,
            'description' => $request->descripcion,
            'description_pre' => $request->descripcion1,
            'price' => $request->price,
            'top' => $request->top,
            'limited' => $limited,
        ]);

        //$request->photo->storeAs('/', $filename, 'uploads');

        //$img = Image::make($final_file);
        
        
        // $img->resize(500, 300, function ($constraint){
        // $img->resizeCanvas(500, 300, function ($constraint){
        // $img->crop(500, 300, function ($constraint){
        // $img->trim(500, 300, function ($constraint){
        // $img->fit(500, 300, function ($constraint){
            //$constraint->upsize();
        //});

        //$img->save($upload_path.'/t_'.$filename);

        return redirect()->route('cards')->with(['icon' => 'small mdi-action-done green-text'])->with(['type' => 'green-text'])->with(['message' => 'Tarjeta creada con éxito']);

    }

    public function delete($id)
    {
        $card = Card::find($id);

        if($card->delete()):
            return back()->with(['icon' => 'small mdi-action-delete blue-text'])->with(['type' => 'blue-text'])->with(['message' => 'Tarjeta eliminada con éxito']);
        endif;
        
    }
}
