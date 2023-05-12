<?php //ルーティング（ブラウザから任意のURLにアクセスがあった場合、どのコントローラー処理を動かすのかを定義する）

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

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

//トップ画面（Casteria）を表示
Route::get('/', function () {
    return view('index');
});

//入力画面
Route::get('/contact', [FormController::class, 'showContact'])->name('contact');

//確認画面
Route::post('/confirm', [FormController::class,'showConfirmForm'])->name('confirm');

//DB登録
Route::post('/store', [FormController::class,'exeStore'])->name('store');

//完了画面
Route::get('/complete', [FormController::class, 'showComplete'])->name('complete');

//編集画面
Route::get('/edit/{id}/', [FormController::class, 'editData'])->name('edit');

//DB更新
Route::patch('/edit/{id}', [FormController::class, 'updateData'])->name('update');

//DB削除
Route::delete('/delete/{id}', [FormController::class, 'deleteData'])->name('destroy');