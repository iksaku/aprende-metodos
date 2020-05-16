<?php

namespace App\Providers;

use App\Markdown\MarkdownConverter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\CommonMarkConverter;

class MarkdownServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('markdown', function () {
            return MarkdownConverter::makeConverter();
        });
        $this->app->alias('markdown', CommonMarkConverter::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('markdown', function ($expression) {
            if ($expression) {
                return "<?php echo markdown($expression) ?>";
            }

            return '<?php ob_start(); ?>';
        });

        Blade::directive('endmarkdown', function () {
            return '<?php echo markdown(ob_get_clean()); ?>';
        });
    }
}
