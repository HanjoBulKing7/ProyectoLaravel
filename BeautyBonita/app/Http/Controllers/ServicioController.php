<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\CategoriaServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with('categoria')->get();
        return view('admin.servicios.index', compact('servicios'));
        
    }

    public function create()
    {
        $categorias = CategoriaServicio::where('estado', 'activa')->get();
        return view('admin.servicios.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_servicio' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'duracion_minutos' => 'required|integer|min:1',
            'id_categoria' => 'required|exists:categorias_servicios,id_categoria',
            'estado' => 'required|in:activo,inactivo',
            'descuento' => 'nullable|numeric|min:0|max:100',
            'caracteristicas' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('servicios', 'public');
            $data['imagen'] = $imagePath;
        }

        Servicio::create($data);

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio creado correctamente');
    }

    public function show(Servicio $servicio)
    {
        return view('admin.servicios.show', compact('servicio'));
    }

    public function edit(Servicio $servicio)
    {
        $categorias = CategoriaServicio::where('estado', 'activa')->get();
        return view('admin.servicios.edit', compact('servicio', 'categorias'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'nombre_servicio' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'duracion_minutos' => 'required|integer|min:1',
            'id_categoria' => 'required|exists:categorias_servicios,id_categoria',
            'estado' => 'required|in:activo,inactivo',
            'descuento' => 'nullable|numeric|min:0|max:100',
            'caracteristicas' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Manejar la imagen si se sube una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($servicio->imagen) {
                Storage::disk('public')->delete($servicio->imagen);
            }
            
            $imagePath = $request->file('imagen')->store('servicios', 'public');
            $data['imagen'] = $imagePath;
        }

        $servicio->update($data);

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio actualizado correctamente');
    }

    public function destroy(Servicio $servicio)
    {
        // Eliminar imagen si existe
        if ($servicio->imagen) {
            Storage::disk('public')->delete($servicio->imagen);
        }

        $servicio->delete();

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio eliminado correctamente');
    }
}