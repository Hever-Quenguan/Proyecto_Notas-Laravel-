<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Notes/index', [
            'notes' => Note::latest()
                ->where('excerpt', 'LIKE', "%$request->q%")
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Notes/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'fechcre' => 'nullable|date',  // Validación para la fecha de creación
            'categoria' => 'required|string|in:Categoria 1,Categoria 2,Categoria 3,Categoria 4,Categoria 5',  // Validación para la categoría seleccionada
            'fecha_vencimiento' => 'nullable|date',  // Validación para la fecha de vencimiento
            'imagen' => 'nullable|string',  // Si tienes un campo para la imagen
        ]);

        // Crea una nueva instancia de Note y asigna los valores manualmente
        $note = new Note();
        $note->excerpt = $request->excerpt;
        $note->content = $request->content;
        $note->usu_id = auth()->id(); // Asigna el id del usuario actual
        $note->fechcre = $request->fechcre;  // Asigna la fecha de creación
        $note->categoria = $request->categoria;  // Asigna la categoría
        $note->fecha_vencimiento = $request->fecha_vencimiento;  // Asigna la fecha de vencimiento
        $note->imagen = $request->imagen;  // Asigna la imagen si se proporciona
        $note->save();

        return redirect()->route('notes.index', $note->id)->with('status', 'Nota creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    //$note = Note::findOrFail($id); // Encuentra la nota por su ID
    $note = Note::join('users', 'notes.usu_id', '=', 'users.id') // Join con la tabla 'users'
            ->where('notes.id', $id)                           // Condición para buscar por ID de la nota
            ->select('notes.id','notes.excerpt','notes.content','notes.usu_id','notes.fechcre','notes.categoria','notes.fecha_vencimiento','notes.imagen','users.name')// Selecciona los campos que deseas
            ->firstOrFail();                                   // Obtén el primer resultado o lanza una excepción si no se encuentra

    
    return Inertia::render('Notes/Show', [
        'note' => $note,
    ]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $note = Note::findOrFail($id); // Encuentra la nota por su ID
    return Inertia::render('Notes/Edit', [
        'note' => $note,
    ]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $userId = Auth::id();
        // Crear una nueva instancia de Note
        $note = Note::findOrFail($request->id);
        $note->excerpt = $request->input('excerpt');
        $note->content = $request->input('content');
        $note->fechcre = $request->input('fechcre');
        $note->categoria = $request->input('categoria');
        $note->fecha_vencimiento = $request->input('fecha_vencimiento');
        $note->imagen = $request->input('imagen');
        $note->usu_id = $userId;
        // Guardar la nueva instancia en la base de datos
        $note->save();
        return redirect()->route('notes.index')->with('status', 'Nota actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        // Eliminar los archivos asociados si existen
        if ($note->imagen) {
            Storage::delete($note->imagen);
        }
    
        // Eliminar la nota de la base de datos
        $note->delete();
    
        // Redirigir con mensaje de éxito
        return redirect()->route('notes.index')->with('success', 'Nota eliminada correctamente.');
    }
    


}
