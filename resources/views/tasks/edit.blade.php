@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center pb-3">Изменить задачу</h1>
        <form action="{{route('tasks.update', ['task' => $task])}}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label>Название</label>
                    <textarea class="form-control" name="task" style="display: inline-block">
                            {{$task->task}}
                        </textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
        </form>
        <button type="submit" class="btn btn-warning mt-3">
            <a href="{{route('tasks.index')}}">Назад</a>
        </button>
    </div>
@endsection
