Page
====
db stored page

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist plusser/yii2-page "*"
```

or add

```
"plusser/yii2-page": "*"
```

to the require section of your `composer.json` file.

Simple configuration:

1. Add page module to your web and console config.

```
[
  ...
    'bootstrap' => [ ..., 'page', ]
    'modules' => [
      ...
        'page' => [
            'class' => 'page\Module',
            //'backendMode' => true, # for backend only
            'layoutList' => [
                '@frontend/views/layouts/main' => 'Main',
            ],
        ],
      ...
    ],
  ...
]
```
2. Run migrations:

```
php yii migrate/up

```
