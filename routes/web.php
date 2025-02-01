<?php

use App\Events\NewsCreated;
use App\Events\NnewsHidden;
use App\Models\News;
use App\Models\Nnews;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [App\Http\Controllers\TestController::class, 'index']);
//Route::get('/user', [App\Http\Controllers\UserController::class, 'showUser']);
Route::get('/test1', [App\Http\Controllers\SimpleController::class, 'test']);
Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('store-user');
Route::get('/books', [App\Http\Controllers\EntityController::class, 'index'])->name('books');
Route::post('/books', [App\Http\Controllers\EntityController::class, 'store'])->name('save_book');
Route::get('/remove_book/{id}', [App\Http\Controllers\EntityController::class, 'delete'])->name('remove_book');

Route::get('/upload', [App\Http\Controllers\FileUploadController::class, 'index']);
Route::post('/upload', [App\Http\Controllers\FileUploadController::class, 'upload'])->name('upload_file');

Route::get('/library_user/{id}', [App\Http\Controllers\LibraryUserController::class, 'show'])->where(['id' => '[0-1]+']);

Route::get('/my_user', [App\Http\Controllers\MyUserController::class, 'showUser']);

Route::get('/redirect_test', App\Http\Controllers\TestRedirectController::class);
Route::get('/send_file', App\Http\Controllers\SendFileController::class);

Route::get('/userform', [App\Http\Controllers\FormProcessor::class, 'index']);
Route::post('/store_form', [App\Http\Controllers\FormProcessor::class, 'store']);

Route::get('/test_database', function () {
    //Код внутри колбэка
        $employee = new Employee();
        $employee->save();
    });

Route::get('/main', function (){
    return view('mainpage');
});

Route::get('/users_list', function(){
    $users = ['Ivan', 'Petr', 'Nikolai', 'Semen', 'Oleg'];
    return view('users', ['users' => $users]);
});

Route::get('/upper', function(){
    return view('testdir');
});

Route::get('/home', function(){
    $users = ['name'=>'Ivan', 'age'=>18, 'position'=>3, 'address'=>'Moscow'];
    return view('home', ['users' => $users]);
});

Route::get('/contacts', function(){
    $values = ['address'=>'Rostov', 'post_code'=>2143, 'email'=>'', 'phone'=>'987465'];
    return view('contacts', ['values' => $values]);
});

Route::post('/test_request', [App\Http\Controllers\RequestTestController::class, 'testRequest']);

Route::get('/testHeader', [App\Http\Controllers\TestHeaderController::class, 'getHeader']);

Route::get('/test_cookie', [App\Http\Controllers\TestCookieController::class, 'testCookie']);

Route::post('/json_parse', [App\Http\Controllers\JsonParseController::class, 'parseJson']);

Route::get('get-employee-data', [App\Http\Controllers\EmployeeController::class, 'index']);

Route::post('store-form', [App\Http\Controllers\EmployeeController::class, 'store']);

Route::put('/user/{id}', [App\Http\Controllers\EmployeeController::class, 'update']);

Route::get('/index', [App\Http\Controllers\BookController::class, 'index'])->name('book_add');
Route::post('/store', [App\Http\Controllers\BookController::class, 'store'])->name('book_store');

Route::get('/test_cookies', function(){
    return response('My first cookie')
    ->cookie('my_test_cookie', 'test content', 5)
    ->withHeaders(['X-HEADER-TEST3' => 'IT WORKS!',
     'X-HEADER-TEST4' => 'IT WORKS!',
     'X-HEADER-TEST5' => 'IT WORKS!'])
     ->withoutCookie('my_test_cookie2');
});

Route::get('/counter', function(){
    $counterValue = session('counter', 0);
    $counterValue++;
    session(['counter' => $counterValue]);
    return 'ok';
});
Route::get('/result_counter', function(){
    // $counterValue = session('counter', 0);
    // return $counterValue;

    // var_dump(session()->all());

    if(session()->has('counter')){
        session()->forget('counter');
    }
    var_dump(session()->all());
});

Route::get('/list_of_books', function(){
    $listOfBooks = session()->get('list_of_books', '');

    return response()->json(['status' => 'received', 'list_of_books' => $listOfBooks ? unserialize($listOfBooks) : 'the list is empty']);
});
Route::post('/list_of_books', function(Request $request){
    $listOfBooks = session()->get('list_of_books', '');
    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];
    $listOfBooks[] = ['author' => $request->get('author'), 'title' => $request->get('title')];

    session()->put('list_of_books', serialize($listOfBooks));

    return response()->json(['status' => 'saved', 'list_of_books' => $listOfBooks]);
});
Route::get('/list_of_books/{id}', function($id){
    $listOfBooks = session()->get('list_of_books', '');
    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];
    if(array_key_exists($id, $listOfBooks)){
        unset($listOfBooks[$id]);
    }

    return response()->json(['status' => 'deleted', 'list_of_books' => $listOfBooks]);
});

Route::get('/file_download', function(){
    //return response()->download(base_path() . '/test.txt', 'my_test');

    return response()->streamDownload(function(){
        echo file_get_contents('https://www.google.com/');
    });
});
Route::get('/file_show', function(){
    return response()->file(base_path() . '/test.txt');
});

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index']);
Route::post('/users_add', [App\Http\Controllers\UsersController::class, 'addUser'])->name('add_users');
Route::get('/users/{id}', [App\Http\Controllers\UsersController::class, 'getUser']);

Route::get('/check_di', [App\Http\Controllers\TestDiController::class, 'showUrl']);

Route::get('/logs', function(){
    return view('logs');
});

Route::get('/event', function(){
    NewsCreated::dispatch(\App\Models\News::first());
});
Route::get('/news_update', function(){
    // News::withoutEvents(function(){
    //     News::first()->update(['title' => 'Test 2']);
    // });
    News::first()->update(['title' => 'Test 3']);
    return 'News updated';
});

Route::get('/nnews', function(){
    $news = new Nnews();
    $news->title = 'Test news title 2';
    $news->body = 'Test news body 2';

    $news->save();
    return $news;
});
Route::get('/nnews/{id}', function($id){
    $news = Nnews::findOrFail($id);
    $news->hidden = true;
    $news->save();
    NnewsHidden::dispatch(\App\Models\Nnews::first());

    return 'News hidden';
});
