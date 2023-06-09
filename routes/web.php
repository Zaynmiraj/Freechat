<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfile;
use App\Http\Livewire\EditProfile;
use App\Http\Livewire\Homepage;
use App\Http\Livewire\LoginPage;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Profile;
use App\Http\Livewire\NewsFeed;
use App\Http\Livewire\SignUp;
use App\Http\Livewire\ViewProfile;
use App\Http\Livewire\Chat;
use App\Http\Livewire\Chatbot;
use App\Http\Livewire\Showphoto;
use App\Http\Livewire\Viewpost;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', LoginPage::class);
Route::get('/signup', SignUp::class,)->name('signup');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/newsfeed', NewsFeed::class)->name('newsfeed');
    Route::get('/profile/viewprofile/{profile_id}', ViewProfile::class)->name('viewprofile');
    Route::get('/profile/edit/{profiles_id}', EditProfile::class)->name('editprofile');
    Route::get('/profile/chat/{chat_id}', Chat::class)->name('chat');
    Route::get('/chat/{receiver_id}', Chatbot::class)->name('chatbot');
    Route::get('/post/{post_id}', Viewpost::class)->name('viewpost');
    Route::get('/comment/{id}', [UserProfile::class, 'Comment'])->name('comment');
    Route::get('/newsfeed/{id}', [NewsFeed::class, 'finds'])->name('comments');
    Route::post('/addcomment', [UserProfile::class, 'AddComment'])->name('addcomment');
    Route::get('/photo/{photo_id}', Showphoto::class)->name('photo');
});

require __DIR__ . '/auth.php';
