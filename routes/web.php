<?php

use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Symfony\Component\HttpKernel\Event\RequestEvent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('show', function () {
    // $tasks = DB::table('tasks')->get();
    $tasks = Task::all();
    // dd($tasks);
    return view('show', compact('tasks'));
});
Route::post('store', function (Request $r) {
    // DB::table('tasks')->insert([
    //     'title' => $r->title
    // ]);
    $task = new Task();
    $task->title = $r->title;
    $task->save();
    return redirect()->back();
});
Route::post('del/{id}', function ($id) {
    $del = Task::find($id);

    $del->delete();
    return redirect()->back();
});
