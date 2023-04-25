<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
 
    public function index(Request $request)
    {
        $allTodolists = Todolist::all();
        $todoListWithFilter = Todolist::all();

        if ( isset($_GET['projects']) && $_GET['projects'] !== '') {
            $todoListWithFilter = Todolist::where('projects', '=', $_GET['projects'])->get();
        }

        return view('home', [
            'todolists' => $allTodolists,
            'todoListWithFilter' => $todoListWithFilter,
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'taskName'=>'required',
            'projects'=>'required'
        ]);

        Todolist::create($data);
        return back();
    }

    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
