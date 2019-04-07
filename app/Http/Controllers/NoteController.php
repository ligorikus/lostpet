<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return Response::json(['data' => ['notes' => $notes]], 500);
    }
}
