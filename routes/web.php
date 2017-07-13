<?php

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
use App\Exam;

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/exam', function () {
    return view('exams.index');
});

// TODO add category
Route::get('/exam/beginner/{id}', function ($id) {
    return json_encode(DB::table('exams')
                ->join('answers', 'exams.answer_id', '=', 'answers.id')
                ->select('exams.*', 'answers.*')
                ->where('exams.id', '=', $id)
                ->where('exams.category_id', '=', 1)
                ->first());
});

Route::get('/exam/intermediate/{id}', function ($id) {
    return json_encode(DB::table('exams')
                ->join('answers', 'exams.answer_id', '=', 'answers.id')
                ->select('exams.*', 'answers.*')
                ->where('exams.id', '=', $id)
                ->where('exams.category_id', '=', 2)
                ->first());
});

Route::get('/exam/senior/{id}', function ($id) {
    return json_encode(DB::table('exams')
                ->join('answers', 'exams.answer_id', '=', 'answers.id')
                ->select('exams.*', 'answers.*')
                ->where('exams.id', '=', $id)
                ->where('exams.category_id', '=', 3)
                ->first());
});


Route::get('/beginner/ids', function () {
    return json_encode(DB::table('exams')
            ->where('category_id', '=', 1)
            ->inRandomOrder()
            ->limit(10)
            ->select('id')
            ->get());   
});

Route::get('/intermediate/ids', function () {
    return json_encode(DB::table('exams')
            ->where('category_id', '=', 2)
            ->inRandomOrder()
            ->limit(10)
            ->select('id')
            ->get());   
});

Route::get('/senior/ids', function () {
    return json_encode(DB::table('exams')
            ->where('category_id', '=', 3)
            ->inRandomOrder()
            ->limit(10)
            ->select('id')
            ->get());   
});