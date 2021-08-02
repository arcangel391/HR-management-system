<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Model\User;
use App\Model\Post;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/chart', function () {

    $chart = (new ArielMejiaDev\LarapexCharts\LarapexChart())->pieChart()
    ->setTitle('Gender of employees')
    ->addData([
        \App\Models\User::where('gender', '=', 'Male')->count(),
        \App\Models\User::where('gender', '=', 'Female')->count()
    ])
    ->setColors(['#ffc63b', '#ff6384'])
    ->setLabels(['Male', 'Female'])
    ->toVue();

    
    for ($x = 0; $x <= 11; $x++) {
        $months[$x] = \App\Models\User::WhereMonth('created_at',date($x+1))->count();
      } 
 
    $chart2 = (new ArielMejiaDev\LarapexCharts\LarapexChart())->barChart()
    ->setTitle('Employees per month')
    ->addData('Number of Employee/s',$months)
    ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
    ->toVue();

    for ($x = 0; $x <= 11; $x++) {
        $pmonths[$x] = \App\Models\Post::WhereMonth('created_at',date($x+1))->count();
      } 

    $chart3 = (new ArielMejiaDev\LarapexCharts\LarapexChart())->horizontalBarChart()
    ->setTitle('Post per months')
    ->addData('Number of Post/s',$pmonths)
    ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
    ->toVue();


    $chart4 = (new ArielMejiaDev\LarapexCharts\LarapexChart())->polarAreaChart()
    ->setTitle('Employees per position')
    ->addData([
        \App\Models\User::where('position', '=', 'HR')->count(),
        \App\Models\User::where('position', '=', 'IT')->count(),
        \App\Models\User::where('position', '=', 'Finance')->count(),
        \App\Models\User::where('position', '=', 'Administration')->count(),
        \App\Models\User::where('position', '=', 'Manager')->count(),
        \App\Models\User::where('position', '=', 'CEO')->count()
    ])
    ->setLabels(['HR', 'IT', 'Financce', 'Administration', 'Manager', 'CEO'])
    ->toVue();



    return Inertia::render('Charts', compact('chart','chart2','chart3','chart4'));
})->name('chart');
Route::middleware(['auth:sanctum', 'verified'])->resource('users', UserController::class);
Route::middleware(['auth:sanctum', 'verified'])->resource('posts', PostController::class);