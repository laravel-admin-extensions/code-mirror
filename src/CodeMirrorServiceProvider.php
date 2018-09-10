<?php

namespace Jxlwqq\CodeMirror;
use Encore\Admin\Admin;
use Encore\Admin\Form;
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

        Admin::booting(function () {
            Form::extend('code', Code::class);
        });
    }
}
