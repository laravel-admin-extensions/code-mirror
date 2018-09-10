# Code editor extension for laravel-admin


这是一个`laravel-admin`扩展，用来将`CodeMirror`集成进`laravel-admin`的表单中。

## 截图

![CodeMirror](https://user-images.githubusercontent.com/2421068/45276361-5a038480-b4f4-11e8-8b49-932f001f073b.png)

## 安装

首先，安装依赖：
```bash
composer require jxlwqq/code-mirror
```

然后，发布资源目录：
```bash
php artisan vendor:publish --tag=laravel-admin-code-mirror
```

## 配置

在`config/admin.php`文件的`extensions`，加上属于这个扩展的一些配置
```php
'extensions' => [
    'code-mirror' => [
        // 如果要关掉这个扩展，设置为false
        'enable' => true,
        // 编辑器的配置
        'config' => [
            'lineNumbers' => true,
            'indentUnit' => 4,
            'styleActiveLine' => true,
            'matchBrackets' => true,
            'lineWrapping' => true,
            'theme' => 'darcula',
        ]
    ]
]
```

## 使用

在form表单中使用它：
```php
$form->code('content');
```

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
