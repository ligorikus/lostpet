<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with('images')->get();
        return Response::json(['data' => ['notes' => $notes]], 500);
    }

    public function view(Note $note)
    {
        return Response::json(['data' => ['note' => $note->load('images')]], 500);
    }

    public function store(NoteRequest $request)
    {
        $note = Note::create([
            'title' => $request->title ?? null,
            'description' => $request->description ?? null,
            'address' => $request->address
        ]);

        foreach ($request->images as $image) {
            $note->images()->attach($image);
        }

        return Response::json(['data' => ['note' => $note]], 500);
    }
}
