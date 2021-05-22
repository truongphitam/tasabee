<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use View, DB, App;
use App\Models\Slider;
use App\Models\Settings;
use App\Models\CustomCode;
use App\Models\Categories;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //
        $settings = Settings::find(1);
        $customeCode = CustomCode::find(1);
        $slider = Slider::orderBy('id', 'desc')->get();
        $cateEvents = Categories::select('title', 'slug')->where('post_type', 'event')->get();
        View::share([
            'current_locale' => App::getLocale(),
            'supported_locales' => LaravelLocalization::getSupportedLocales(),
            'slider' => $slider,
            'settings' => $settings,
            'customeCode' => $customeCode,
            'cateEvents' => $cateEvents
        ]);

        Blade::directive('e', function ($expression) {
            list($textVi, $textEn) = explode(';', str_replace(['(', ')', "'"], '', $expression));
            $text = '[:vi]' . $textVi . '[:en]' . $textEn . '[:]';
            return "<?php echo getLocaleValue('$text', \$current_locale); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() === 'local') {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
