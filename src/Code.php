<?php

namespace Jxlwqq\CodeMirror;

use Encore\Admin\Admin;
use Encore\Admin\Form\Field;

class Code extends Field
{
    protected $view = 'laravel-admin-code-mirror::code_mirror';

    private $theme;
    private $lineNumbers;
    private $indentUnit;
    private $styleActiveLine;
    private $matchBrackets;
    private $lineWrapping;
    private $mode;

    public function __construct($column, array $arguments = [])
    {
        // theme, default darcula
        $this->theme = config('admin.extensions.code-mirror.config.theme', 'darcula');
        // show lineNumbers, default true
        $this->lineNumbers = config('admin.extensions.code-mirror.config.lineNumbers', true);
        // indentUnit, default 4
        $this->indentUnit = config('admin.extensions.code-mirror.config.indentUnit', 4);
        // lineWrapping, default true
        $this->lineWrapping = config('admin.extensions.code-mirror.config.lineWrapping', true);
        // styleActiveLine, default true
        $this->styleActiveLine = config('admin.extensions.code-mirror.config.styleActiveLine', true);
        // matchBrackets, default  true
        $this->matchBrackets = config('admin.extensions.code-mirror.config.matchBrackets', true);
        // mode
        $this->mode = 'application/x-httpd-php';

        array_push(Admin::$css, 'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/theme/' . $this->theme . '.css');
        if ($this->matchBrackets == true) {
            array_push(Admin::$js, 'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/addon/edit/matchbrackets.js');
        }
        if ($this->styleActiveLine) {
            array_push(Admin::$js, 'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/addon/selection/active-line.js');
        }

        parent::__construct($column, $arguments);
    }

    protected static $css = [
        // main css file
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/lib/codemirror.css',
    ];
    protected static $js = [
        // main js file
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/lib/codemirror.js',
        // x-httpd-php mode
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/htmlmixed/htmlmixed.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/xml/xml.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/javascript/javascript.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/css/css.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/clike/clike.js',
        'vendor/laravel-admin-ext/code-mirror/codemirror-5.40.0/mode/php/php.js',
    ];

    public function render()
    {
        $this->script = <<<EOT
var codeEditor = CodeMirror.fromTextArea(document.getElementById("{$this->id}"), {
    lineNumbers: {$this->lineNumbers},         
    indentUnit: {$this->indentUnit},           
    styleActiveLine: {$this->styleActiveLine}, 
    matchBrackets: {$this->matchBrackets},
    lineWrapping: {$this->lineWrapping},
    theme: "{$this->theme}",
    mode: "{$this->mode}",
});
EOT;
        return parent::render();
    }
}
