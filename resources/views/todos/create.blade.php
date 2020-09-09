@extends('layouts.app')

@section('content')

<div class="row col-md-12 col-lg-12 justify-content-center" style="padding: 0;margin: auto">
        
    <div class="col-sm-10 col-md-8 col-lg-7 px-2" style="padding: 0;">
        <div class="border-right border-left ">
            <div class="container-fluid border-bottom"></div>
            <div class="container-fluid" style="padding: 0">
                <div class="container-fluid py-3">
                    <div class="container-fluid row justify-content-between align-content-center border-bottom  px-2" style="margin:0 auto 10px;">
                        <h2 style="margin: 0">Adicionar uma nova tarefa</h2>
                        <a class="btn btn-info" style="color: white; margin: 0 0 15px" href="{{ route('todos.index') }}">Voltar</a>
                    </div>
                    <div class="container-fluid justify-content-center px-2">
                        <form action="{{ route('todo.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="h5" for="title">Titulo da tarefa</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Digite aqui um titúlo">
                            </div>
                            <div class="form-group">
                                <label class="h5" for="description">Descrição</label>
                                <textarea class="form-control" name="description" placeholder="Opicional" id="description" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </form>
                    </div>
                </div>
                <div class="container-fluid border-bottom"></div>
            </div>
        </div>
    </div>
</div>

@endsection
