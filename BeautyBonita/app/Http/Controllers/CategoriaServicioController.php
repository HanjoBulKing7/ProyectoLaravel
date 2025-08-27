<?php

namespace App\Http\Controllers;

use App\Models\CategoriaServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriaServicioController extends Controller
{
    public function index()
    {
        $categorias = CategoriaServicio::all();
        return view('admin.categoriaservicios.index', compact('categorias'));
    }

    public function create()
    {
        return view('admin.categoriaservicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias_servicios,nombre',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'estado' => 'required|in:activa,inactiva'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nombre);

        // Manejar imagen
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('categorias-servicios', 'public');
            $data['imagen'] = $imagePath;
        }

        CategoriaServicio::create($data);

        return redirect()->route('admin.categoriaservicios.index')
                         ->with('success', 'Categoría creada correctamente');
    }

    public function show(CategoriaServicio $categoria)
    {
        return view('admin.categoriaservicios.show', compact('categoria'));
    }

    public function edit(CategoriaServicio $categoria)
    {
        return view('admin.categoriaservicios.edit', compact('categoria'));
    }

    public function update(Request $request, CategoriaServicio $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias_servicios,nombre,' . $categoria->id_categoria . ',id_categoria',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'estado' => 'required|in:activa,inactiva'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nombre);

        // Manejar imagen
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($categoria->imagen) {
                Storage::disk('public')->delete($categoria->imagen);
            }
            
            $imagePath = $request->file('imagen')->store('categorias-servicios', 'public');
            $data['imagen'] = $imagePath;
        }

        $categoria->update($data);

        return redirect()->route('admin.categoriaservicios.index')
                         ->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(CategoriaServicio $categoria)
    {
        // Verificar si hay servicios usando esta categoría
        if ($categoria->servicios()->count() > 0) {
            return redirect()->back()
                             ->with('error', 'No se puede eliminar la categoría porque tiene servicios asociados.');
        }

        // Eliminar imagen si existe
        if ($categoria->imagen) {
            Storage::disk('public')->delete($categoria->imagen);
        }

        $categoria->delete();

        return redirect()->route('admin.categoriaservicios.index')
                         ->with('success', 'Categoría eliminada correctamente');
    }
}