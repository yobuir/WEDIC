<?php

use App\Http\Controllers\Dashboard\Blog\HomeController as BlogHomeController;
use App\Http\Controllers\Dashboard\Events\HomeController as EventsHomeController;
use App\Http\Controllers\Dashboard\Projects\HomeController as ProjectsHomeController;
use App\Http\Controllers\Dashboard\Category\HomeController as CategoryHomeController;
use App\Http\Controllers\Dashboard\Trainings\HomeController as TrainingHomeController;
use App\Http\Controllers\Dashboard\Courses\HomeController as CoursesHomeController;
use App\Http\Controllers\Dashboard\Team\HomeController as TeamHomeController;
use App\Http\Controllers\Dashboard\Users\HomeController as UsersHomeController;
use App\Http\Controllers\Dashboard\Messages\HomeController  as MessageHomeController;
use App\Http\Controllers\Dashboard\Partners\HomeController  as PartnersHomeController;
use App\Http\Controllers\Dashboard\Applicants\HomeController  as  ApplicantsHomeController;
use App\Http\Controllers\Dashboard\Testimonials\HomeController as TestimonialsHomeController;
use App\Http\Controllers\Dashboard\Album\HomeController as AlbumsHomeController;
use App\Http\Controllers\Dashboard\Mailing\HomeController as MailingsHomeController;
use App\Http\Controllers\Dashboard\Payment\HistoryController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\NewsController;
use App\Http\Middleware\adminMiddleware;
use App\Http\Middleware\IsUserActive;
use App\Http\Middleware\marketingMiddleware;
use App\Models\Album;
use App\Models\Blog;
use App\Models\Training;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;


Route::get('/locale/{locale}', [LocalizationController::class, 'localize']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [App\Http\Controllers\Website\EventsController::class, 'index'])->name('events');
Route::get('/event/{slug}', [App\Http\Controllers\Website\EventsController::class, 'view'])->name('event.show');
Route::get('/event/{slug}/ticket', [App\Http\Controllers\Website\EventsController::class, 'view'])->name('event.tickets');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{category}/categories', [NewsController::class, 'category'])->name('news.category');
Route::get('/news/view/{slug}', [NewsController::class, 'view'])->name('news.view');

Route::get('/testimonials', [App\Http\Controllers\Website\ProjectsController::class, 'index'])->name('projects');
Route::get('/achievement/{slug}', [App\Http\Controllers\Website\ProjectsController::class, 'view'])->name('project');

Route::get('/contact-us', [App\Http\Controllers\Website\ContactsController::class, 'index'])->name('contactUs');
Route::post('/contact-us', [App\Http\Controllers\Website\ContactsController::class, 'store'])->name('contactUs.store');

Route::get('/about-us', [App\Http\Controllers\Website\AboutUsController::class, 'index'])->name('aboutUs');
Route::get('/gallery', [App\Http\Controllers\Website\GalleryController::class, 'index'])->name('gallery');
Route::get('/expertise/areas', [App\Http\Controllers\Website\ExpertiseController::class, 'index'])->name('expertise');

route::get('services', [App\Http\Controllers\Website\ServicesController::class, 'index'])->name('services');

route::get('/store', [App\Http\Controllers\Website\StoreController::class, 'index'])->name('store');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blog');



Route::get('blog/view/{id}/{slug}', function ($id, $slug) {
    $blog = Blog::findOrFail($id);
    return view('articles', compact('blog'));
})->name('blog.view');

Route::get('/trainings', function () {
    return view('trainings');
})->name('training');

Route::get('/trainings_apply/view/{id}/{slug}', function ($id, $slug) {
    $training = Training::findOrFail($id);
    return view('trainings_apply', compact('training'));
})->name('training.apply');



Route::get('/apply/{id}/{slug}', function ($id, $slug) {
    $training = Training::findOrFail($id);

    return view('website.trainings.app', compact(['training']));
})->name('trainings.apply');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->middleware([IsUserActive::class])->group(function () {

        Route::get('/', function () {
            return view('dashboard');
        })->name('');

        Route::prefix('{id}/pay-admission/fee')->name('payment.')->group(function () {
            route::get('/', [ApplicantsHomeController::class, 'admissionFee'])->name('');
        });
        Route::get('clnt/payment/callback', [PaymentController::class, 'handlePaymentCallback'])->name('payment.callback');
        Route::get('{id}/clnt/settings', [ApplicantsHomeController::class, 'settings'])->name('settings');

        Route::get('history', [HistoryController::class, 'index'])->name('p.history');

        Route::middleware([marketingMiddleware::class])->group(function () {
            Route::prefix('blog')->name('blog.')->group(function () {
                Route::get('/', [BlogHomeController::class, 'index'])->name('');
                Route::get('/new', [BlogHomeController::class, 'new'])->name('new');
                Route::get('/edit/{id}', [BlogHomeController::class, 'edit'])->name('edit');
                Route::POST('/edit/{id}', [BlogHomeController::class, 'update'])->name('edit.update');
            });

            Route::prefix('event')->name('event.')->group(function () {
                Route::get('/', [EventsHomeController::class, 'index'])->name('');
                Route::get('/new', [EventsHomeController::class, 'new'])->name('new');
                Route::get('/edit/{id}', [EventsHomeController::class, 'edit'])->name('edit');
                Route::POST('/edit/{id}', [EventsHomeController::class, 'update'])->name('edit.update');
            });

            Route::prefix('project')->name('project.')->group(function () {
                Route::get('/', [ProjectsHomeController::class, 'index'])->name('');
                Route::get('/new', [ProjectsHomeController::class, 'new'])->name('new');
                Route::get('/edit/{id}', [ProjectsHomeController::class, 'edit'])->name('edit');
                Route::POST('/edit/{id}', [ProjectsHomeController::class, 'update'])->name('edit.update');
            });

            Route::prefix('category')->name('category.')->group(function () {
                Route::get('/', [CategoryHomeController::class, 'index'])->name('');
                Route::get('/edit/{id}', [CategoryHomeController::class, 'edit'])->name('edit');
            });

            Route::prefix('training')->name('training.')->group(function () {
                Route::get('/', [TrainingHomeController::class, 'index'])->name('');
                Route::get('/edit/{id}', [TrainingHomeController::class, 'edit'])->name('edit');
                Route::post('/edit/{id}', [TrainingHomeController::class, 'update'])->name('edit.update');

                Route::prefix('applicants')->name('applicants.')->group(function () {
                    route::get('/', [ApplicantsHomeController::class, 'index'])->name('');
                    route::get('/{id}', [ApplicantsHomeController::class, 'view'])->name('view');
                });
            });

            Route::prefix('course')->name('course.')->group(function () {
                Route::get('/', [CoursesHomeController::class, 'index'])->name('');
                Route::get('/edit/{id}', [CoursesHomeController::class, 'edit'])->name('edit');
                Route::post('/edit/{id}', [CoursesHomeController::class, 'update'])->name('edit.update');
            });
            Route::prefix('message')->name('message.')->group(function () {
                Route::get('/', [MessageHomeController::class, 'index'])->name('');
            });
        });


        Route::middleware([adminMiddleware::class])->group(function () {

            Route::prefix('partners')->name('partners.')->group(function () {
                Route::get('/', [PartnersHomeController::class, 'index'])->name('');
                Route::get('/edit/{id}', [PartnersHomeController::class, 'edit'])->name('edit');
            });

            Route::prefix('testimonials')->name('testimonials.')->group(function () {
                Route::get('/', [TestimonialsHomeController::class, 'index'])->name('');
                Route::get('/edit/{id}', [TestimonialsHomeController::class, 'edit'])->name('edit');
            });


            Route::prefix('album')->name('albums.')->group(function () {
                Route::get('/', [AlbumsHomeController::class, 'index'])->name('');
                Route::get('/edit/{id}', [AlbumsHomeController::class, 'edit'])->name('edit');
            });


            Route::prefix('team')->name('team.')->group(function () {
                Route::get('/', [TeamHomeController::class, 'index'])->name('');
                Route::get('/edit/{id}', [TeamHomeController::class, 'edit'])->name('edit');
            });

            Route::get('/mailing', [MailingsHomeController::class, 'index'])->name('mailing');

            Route::prefix('users')->name('users.')->group(function () {
                Route::get('/', [UsersHomeController::class, 'index'])->name('');
                Route::get('/edit/{id}', [UsersHomeController::class, 'edit'])->name('edit');
            });
        });
    });
});


Route::get('optimize', function () {
    try {
        $startTime = microtime(true);
        $results = [];

        // Array of safe commands to run
        $commands = [
            'cache:clear',
            'config:clear',
            'route:clear',
            'view:clear',
            'config:cache',
            'route:cache',
            'view:cache',
            'optimize:clear'
        ];

        // Execute each command and collect results
        foreach ($commands as $command) {
            try {
                Artisan::call($command);
                $results[] = [$command => trim(Artisan::output())];
            } catch (\Exception $e) {
                Log::warning("Failed to execute {$command}: " . $e->getMessage());
                $results[] = [$command => "Failed: " . $e->getMessage()];
            }
        }

        // Handle storage link manually
        try {
            $targetPath = storage_path('app/public');
            $linkPath = public_path('storage');

            // If the storage link doesn't exist
            if (!file_exists($linkPath)) {
                // First try to create directory if it doesn't exist
                if (!file_exists(dirname($linkPath))) {
                    File::makeDirectory(dirname($linkPath), 0755, true);
                }

                // Try multiple approaches to create the link
                $linked = false;

                // Try PHP's symlink first
                if (function_exists('symlink')) {
                    try {
                        $linked = symlink($targetPath, $linkPath);
                    } catch (\Exception $e) {
                        Log::warning("Symlink creation failed: " . $e->getMessage());
                    }
                }

                // If symlink failed, try copying the directory
                if (!$linked) {
                    try {
                        File::copyDirectory($targetPath, $linkPath);
                        $results[] = ['storage:link' => 'Created storage directory copy as fallback'];
                    } catch (\Exception $e) {
                        throw new \Exception("Failed to create storage link or copy directory: " . $e->getMessage());
                    }
                } else {
                    $results[] = ['storage:link' => 'Storage link created successfully'];
                }
            } else {
                $results[] = ['storage:link' => 'Storage link or directory already exists'];
            }

            // Ensure proper permissions
            chmod($linkPath, 0755);
        } catch (\Exception $e) {
            Log::error("Storage link creation failed: " . $e->getMessage());
            $results[] = ['storage:link' => "Failed: " . $e->getMessage()];
        }

        // Clear PHP opcache if available
        if (function_exists('opcache_reset')) {
            opcache_reset();
            $results[] = ['opcache' => 'PHP opcache cleared'];
        }

        $executionTime = round(microtime(true) - $startTime, 2);

        return response()->json([
            'success' => true,
            'message' => 'System optimization completed',
            'execution_time' => $executionTime . ' seconds',
            'results' => $results
        ]);
    } catch (\Exception $e) {
        Log::error("System optimization failed: " . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'System optimization failed: ' . $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ], 500);
    }
})->name('system.optimize')->middleware(['web']);
