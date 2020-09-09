@extends('layouts.app')

@section('content')
<div class="todos">
    <div class="row col-md-12 col-lg-12 justify-content-center" style="padding: 0;margin: auto">
        <div class="col-sm-10 col-md-4 col-lg-2 px-2" style="padding: 0; margin-bottom: 15px;">
            <div class="container-fluid border">
                <h5  style="margin: 0; padding: 10px 0">Bem vindo</h5>
            </div>
            <div class="container-fluid border-left border-bottom border-right py-2">
                <a class="h5" style="margin: 0" href="{{ route('todos.add') }}">Adicionar novo item</a>
            </div>
        </div>
        <div class="col-sm-10 col-md-8 col-lg-8 px-2" style="padding: 0;">
            <div class="border-right border-left ">
                <div class="container-fluid border-bottom"></div>
                <div class="container-fluid" style="padding: 0">
                    @if($todos->count() !== 0)
                        <h3 class="py-2 px-3 border-bottom" style="margin: 0">Lista de afazeres</h3>
                        @foreach($todos as $todo)
                            <div class="form-inline py-2" style="width: 100%; padding: 0 15px">
                                <div class="form-check justify-content-start py-2" style="margin-right:auto ">
                                    @if($todo->completed !== 0)
                                        <form id="{{ 'form-incomplete-'.$todo->id }}" method="POST" action="{{ route('todo.incomplete', $todo->id) }}">
                                        @csrf
                                        @method('delete')
                                            <span onclick="event.preventDefault(); document.getElementById('form-incomplete-{{ $todo->id }}').submit();">
                                                <svg style="color: rgb(106, 182, 245); cursor: pointer;" width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-check-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </svg>
                                            </span>
                                        </form>
                                        
                                        <label class="form-check-label h5 px-2"for="defaultCheck{{ $todo->id }}">
                                            <del>
                                                {{ $todo->title }}
                                            </del>
                                        </label>
                                    @else
                                        <form id="{{ 'form-complete-'.$todo->id }}" method="POST" action="{{ route('todo.complete', $todo->id) }}">
                                        @csrf
                                        @method('put')
                                            <span onclick="event.preventDefault(); document.getElementById('form-complete-{{ $todo->id }}').submit();">
                                                <svg  style="color: rgb(161, 161, 161); cursor: pointer;" width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-check-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                </svg>
                                            </span>
                                        </form>
                                        
                                        <label class="form-check-label h5 px-3"for="defaultCheck{{ $todo->id }}">
                                            {{ $todo->title }}
                                        </label>
                                    @endif
                                    
                                    
                                </div>
                                <div>
                                    <a class="h5 col-2 py-2" title="Ver detalhes" data-toggle="collapse" href="#Collapse{{ $todo->id }}" role="button" aria-expanded="false" aria-controls="Collapse{{ $todo->id }}" style="color: #3490dc; text-decoration: none; margin: 0 15px">Ver detalhes</a>
                                </div>
                                <a href="{{ route('todos.edit', $todo->id) }}" title="Editar" class="btn btn-info" style="margin: 0 5px; color: white">
                                    <svg style="padding-bottom: 2px" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                <form id="{{ 'form-delete-'.$todo->id }}" method="POST" action="{{ route('todo.delete', $todo->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button title="Excluir" onclick="event.preventDefault();
                                                        if(confirm('Tem certeza que quer excluir este item?')){
                                                            document.getElementById('form-delete-{{ $todo->id }}').submit();
                                                        }" 
                                                        class="btn btn-danger" style="margin-left: 5px">
                                        <svg style="padding-bottom: 2px" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                    </form>
                            </div>
                            <div class="col" style="padding: 0">
                                <div class="collapse" id="Collapse{{ $todo->id }}">
                                    <div class="border-top">
                                        <div class="container-fluid">
                                            <div class="row justify-content-between">
                                                <p class="h6 py-2 px-3" style="margin: 0">Descrição:</p>
                                                <p class="h6 py-2 px-3" style="margin: 0">Data de criação: {{ date('d/m/y H:i', strtotime($todo->created_at)) }}</p>
                                            </div>
                                            <p style="margin-bottom: 10px">{{ $todo->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid border-bottom"></div>
                        @endforeach
                    @else
                        <h5 class="border-bottom" style="padding: 10px 15px; margin: 0">Você ainda não possuie nenhuma tarefa criada</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
