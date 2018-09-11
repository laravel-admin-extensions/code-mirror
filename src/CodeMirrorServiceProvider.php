<?php

namespace Jxlwqq\CodeMirror;

use Illuminate\Support\ServiceProvider;

class CodeMirrorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(CodeMirror $extension)
    {
        if (! CodeMirror::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-admin-code-mirror');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/code-mirror')],
                'laravel-admin-code-mirror'
            );
        }
    }
}
