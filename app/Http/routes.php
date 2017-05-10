<?php

  use App\Task;
  use Illuminate\Http\Request;

  /**
   * Вывести панель с задачами
   */
  Route::get('/', function () {
   return view('tasks');
  });

  /**
   * Добавить новую задачу
   */
  Route::post('/task', function (Request $request) {
      $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
    }

    // Создание задачи...
  });

  /**
   * Удалить задачу
   */
  Route::delete('/task/{task}', function (Task $task) {
    //
  });