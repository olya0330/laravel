@extends('layouts.app')
@section('content')

  <!-- Bootstrap шаблон... -->

  <div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->

<form action="{{ url('task') }}" method="POST" role="form">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Название товара</label>
        <input type="text" class="form-control" name="name" id="name" >
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input type="price" class="form-control" name="price" id="price">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Добавить товар</button>
</form>
  </div>

  <!-- TODO: Текущие задачи -->
  <!-- Текущие задачи -->
  
  
  @if (count($tasks) > 0)
  <table class="table">
      <tr>
          <th>Название товара</th>
          <th>Цена</th>
          <th class="col-md-1 col-sm-1">Удаление</th>
      </tr>
      @foreach ($tasks as $task)
      <tr>
          <td>
              {{ $task->name }}
              <span title="{{ $task->description }}"></span>
          </td>
          <td>{{ $task->price }}</td>
          <td>
              <form action="{{ url('task/'.$task->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                            Удалить
                        </button>
               </form>
          </td>
      </tr>
      @endforeach
  </table>
@endif
@endsection