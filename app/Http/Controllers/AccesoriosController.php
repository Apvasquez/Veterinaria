<?php

namespace App\Http\Controllers;


use App\Models\Accesorios;
use App\Models\Imgaccesorios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AccesoriosController extends Controller
{
    public function index()
    {
    	$accesorios = Accesorios::select('id', 'nombre', 'precio', 'stock', 'imagenes', 'url')->with('imagenesaccesorios:nombre')->get();
 
        //$ib = accesorios::find(3)->imagenesaccesorios;
 
        //dd($ib);
 
        // $imagenes = Accesorios::find(3)->imagenesaccesorios;
 
        return view('admin.accesorios.index', compact('accesorios')); 
    }
 
    // Crear un Registro (Create) 
    public function crear()
    {
        $accesorios = Accesorios::all();
        return view('admin.accesorios.crear', compact('accesorios'));
    }
 
    // Proceso de Creación de un Registro 
    public function store(ItemCreateRequest $request)
    {
        $accesorios= new Accesorios;
        $accesorios->nombre = $request->nombre;        
        $accesorios->precio = $request->precio;        
        $accesorios->stock = $request->stock;
        $accesorios->imagenes = date('dmyHi');
        $accesorios->url = Str::slug($request->nombre, '-');  // Acá generamos la URL amigable a partir del nombre y la guardamos en la Base de Datos
 
        $accesorios->save();
 
        $ci = $request->file('img');
 
        // Validamos que el nombre y el formato de imagen esten presentes, tu puedes validar mas campos si deseas 
        $this->validate($request, [
 
            'nombre' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
 
        ]);        
 
        // Recibimos una o varias imágenes y las guardamos en la carpeta 'uploads'
        foreach($request->file('img') as $image)
            {
                $imagen = $image->getClientOriginalName();
                $formato = $image->getClientOriginalExtension();
                $image->move(public_path().'/uploads/', $imagen);
 
                // Guardamos el nombre de la imagen en la tabla 'img_accesorios'
                DB::table('img_accesorios')->insert(
				    [
				    	'nombre' => $imagen, 
				    	'formato' => $formato,
				    	'accesorios_id' => $accesorios->id,
				    	'created_at' => date("Y-m-d H:i:s"),
				    	'updated_at' => date("Y-m-d H:i:s")
				    ]
				);
 
            }         
 
        // Redireccionamos con mensaje 
        return redirect('admin/accesorios')->with('message','Guardado Satisfactoriamente !');
    }
 
    // Leer un Registro específico (Leer)
    public function show($id)
    {
        //
    }
 
    //  Actualizar un registro (Update)
    public function actualizar($id)
    {
        $accesorios = Accesorios::find($id);
 
        $imagenes = Accesorios::find($id)->imagenesaccesorios;
 
        return view('admin/accesorios.actualizar', compact('imagenes'), ['accesorios' => $accesorios]);
    }
 
    // Proceso de Actualización de un Registro (Update)
    public function update(ItemUpdateRequest $request, $id)
    {        
        $accesorios= Accesorios::find($id);
        $accesorios->nombre = $request->nombre;
        $accesorios->precio = $request->precio;
        $accesorios->stock = $request->stock;
        
        $accesorios->save();
 
        $ci = $request->file('img');
 
        // Si la variable '$ci' no esta vacia, actualizamos el registro con las nuevas imágenes
        if(!empty($ci)){
 
            // Validamos que el nombre y el formato de imagen esten presentes, tu puedes validar mas campos si deseas 
            $this->validate($request, [
 
                'nombre' => 'required',
                'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
 
            ]);        
 
            // Recibimos una o varias imágenes y las actualizamos 
            foreach($request->file('img') as $image)
                {
                    $imagen = $image->getClientOriginalName();
                    $formato = $image->getClientOriginalExtension();
                    $image->move(public_path().'/uploads/', $imagen);
 
                    // Actualizamos el nuevo nombre de la(s) imagen(es) en la tabla 'img_accesorios'
                    DB::table('img_accesorios')->insert(
                        [
                            'nombre' => $imagen, 
                            'formato' => $formato,
                            'accesorios_id' => $accesorios->id,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ]
                    );
 
                } 
 
        }
 
        // Redireccionamos con mensaje  
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin/accesorios');
    }
 
    // Eliminar un Registro
    public function eliminar($id)
    {
        $accesorios = Accesorios::find($id);
 
        // Selecciono las imágenes a eliminar 
        $imagen = DB::table('img_accesorios')->where('accesorios_id', '=', $id)->get();        
        $imgfrm = $imagen->implode('nombre', ',');  
        //dd($imgfrm);        
 
        // Creamos una lista con los nombres de las imágenes separadas por coma
        $imagenes = explode(",", $imgfrm);
        
        // Recorremos la lista de imágenes separadas por coma
        foreach($imagenes as $image){
            
            // Elimino la(s) imagen(es) de la carpeta 'uploads'
            $dirimgs = public_path().'/uploads/'.$image;
            
            // Verificamos si la(s) imagen(es) existe(n) y procedemos a eliminar  
            if(File::exists($dirimgs)) {
                File::delete($dirimgs);                
            }
 
        }    
 
        
        // Borramos el registro de la tabla 'accesorios'
        Accesorios::destroy($id); 
 
        // Borramos las imágenes de la tabla 'img_accesorios' 
        $accesorios->imagenesaccesorios()->delete();
 
        // Redireccionamos con mensaje 
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin/accesorios');
    }
 
    // Eliminar imagen de un Registro
    public function eliminarimagen($id, $bid)
    {
        $accesorios = Imgaccesorios::find($id);
 
        $bi = $bid;
 
        // Elimino la imagen de la carpeta 'uploads'
        $imagen = Imgaccesorios::select('nombre')->where('id', '=', $id)->get();
        $imgfrm = $imagen->implode('nombre', ', ');
        //dd($imgfrm);
        Storage::delete($imgfrm);
 
        Imgaccesorios::destroy($id);
 
        // Redireccionamos con mensaje 
        Session::flash('message', 'Imagen Eliminada Satisfactoriamente !');
        return Redirect::to('admin/accesorios/actualizar/'.$bi.'');
    }
 
    // Detalles del Producto
    public function detallesproducto($id)
    {
        // Seleccionar un registro por su 'id' 
        $accesorios = Accesorios::where('id','=', $id)->firstOrFail();
 
        // Seleccionamos las imágenes por su 'id' 
        $imagenes = Accesorios::find($id)->imagenesaccesorios;
 
        return view('admin/accesorios.detallesproducto', compact('accesorios', 'imagenes'));
    }
    public function pay($id){
        $accesorios = Accesorios::where('id','=', $id)->firstOrFail();
 
        // Seleccionamos las imágenes por su 'id' 
        $imagenes = Accesorios::find($id)->imagenesaccesorios;
        
        return view('admin/accesorios.pay', compact('accesorios','imagenes'));
    }
 //
}
