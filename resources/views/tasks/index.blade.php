@extends('layouts.base')
@section('content')
    <div class="row text-center mt-5">
        <form action="{{route('sessions.delete')}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-outline-danger">Выйти-LOGOUT</button>
        </form>
    </div>
    <div class="text-center mt-4">
        @include('notifications.alerts')
        <h1 class="text" style="display: inline-block">Задачи</h1>
        <div class="mt-3 mx-3">
            <div class="tasks">
                <h3>Добавить задачу</h3>
                <form action="{{route('tasks.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Название</label>
                        <textarea class="form-control" name="task" style="display: inline-block">
                            {{old('task')}}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Создать</button>
                </form>
            </div>
            <div class="tasks-all-delete">
                <form action="{{route('tasks.delete-all')}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger mt-2">Удалить все задачи</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 pb-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$task->task}}</td>
                        <td>
                            <a href="{{route('tasks.edit', ['task' => $task])}}">
                                <button class="btn btn-warning" style="display: inline-block">
                                    Изменить
                                </button>
                            </a>
                            <form action="{{route('tasks.destroy', ['task' => $task])}}" method="post"
                                  style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" style="display: inline-block">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
