<?php

namespace Jxlwqq\CodeMirror;

use Encore\Admin\Extension;

class CodeMirror extends Extension
{
    const ASSETS_PATH = 'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/';

    public $name = 'code-mirror';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';
}
