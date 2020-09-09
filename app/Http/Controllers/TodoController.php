<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //Retorna todos os itens cadastrados na lista, em ordem descendente 
    public function index(){
        $todos = Todo::orderBy('completed', 'desc')->get();
        return view('todos.index', ['todos'=> $todos]);
    }

    //Retorna a tela de cadastro de um novo item
    public function add(){
        return view('todos.create');
    }

    //Retorna a tela de edição de um item já cadastrado
    public function edit(Todo $todo){
        return view('todos.edit', ['todo' => $todo]);
    }

    //Efetua a inserção de um novo item na lista
    public function store(Request $request){
        $user_id = (auth()->user()->id);
        $request['user_id'] = $user_id;
        Todo::create($request-> all());
        return redirect()->route('todos.index');
    }

    //Efetua a alteração dos dados do item selecionado
    public function update(Todo $todo, Request $request){
        $todo->update($request->all());
        return redirect()->route('todos.index');
    }

    //Realiza a alteração do status de realização do item para completo
    public function complete(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->back();
    }

    //Realiza a alteração do status de realização do item para imcompleto
    public function incomplete(Todo $todo){
        $todo->update(['completed' => false]);
        return redirect()->back();
    }

    //Realiza a deleção do item presente na lista
    public function delete(Todo $todo){
        $todo->delete();
        return redirect()->route('todos.index');
    }
}

