# Ecommerce skeleton website with Laravel Framework

This repository is developed for Laravel 10.

Contents
* [Installation](#installation)
* [Dependencies](#dependencies)
* [Publish dependency configuration](#publish-dependency-configuration)
* [Configuration](#configuration)
    * [Modify the main composer file](#modify-the-main-composer-file)
    * [Providers](#providers)
    * [Facades](#facades)
    * [Authentication](#authentication)
    * [Routes](#routes)
    * [Views](#views)
    * [Middlewares](#include-custom-middleware)
    * [Include custom JSON Exceptions](#include-custom-json-exceptions)
    * [Publish files](#publish-files)
    * [Migrations](#migrations)
    * [Default credentials](#default-credentials)



## Installation
* Create a new Laravel project with the following command:
    ```shell
    composer create-project laravel/laravel project-name
    ```
* If you have file/photo fields, run
    ```shell
    php artisan storage:link
    ```
* Open your project installation root directory in the terminal and run:
    ```shell
    git clone git@github.com:mpernia/ecommerce-skeleton.git src
    ```

## Dependencies
This repository requires the following dependencies:

* yajra/laravel-datatables-oracle
* nuovo/spreadsheet-reader
* spatie/laravel-medialibrary
* laravel/ui
* darkaonline/l5-swagger
* artesaos/seotools

To install the required libraries in the terminal move to the root dir and run this commands:

*
    ```shell
      composer require yajra/laravel-datatables-oracle nuovo/spreadsheet-reader spatie/laravel-medialibrary darkaonline/l5-swagger artesaos/seotools
    ```
*
    ```shell
    composer require laravel/ui --dev
    ```

### publish dependency configuration

* Seotools
    ```shell
    php artisan vendor:publish --provider="Artesaos\SEOTools\Providers\SEOToolsServiceProvider"
    ```

## Configuration

### Modify the main composer file

Edit the file `composer.json` and put this code:

```json
{
    "autoload": {
        "psr-4": {
            "Ecommerce\\": "src/"
        },
        "files": [
            "src/BoundedContext/Shared/Infrastructure/Helpers/helpers.php",
            "src/Shared/Infrastructure/Helpers/helpers.php"
        ]
    },
    "autoload-dev": {
        "psr-4": {
            "Ecommerce\\Tests\\": "src/Tests/"
        }
    }
}
```

### Providers
Edit the file `config/app.php` and put this code:

```php
'providers' => [
    Ecommerce\Shared\Infrastructure\Providers\RouteServiceProvider::class,
    Ecommerce\Shared\Infrastructure\Providers\SourceServiceProvider::class,
    Ecommerce\Shared\Infrastructure\Providers\EventServiceProvider::class,
];
```

### Facades
In the same file `config/app.php` below add the Facade alias:

```php
'aliases' => [
    'Ecommerce' => Ecommerce\Shared\Infrastructure\Facades\Ecommerce::class,
],
```

### Authentication
Edit the file `config/auth` and change the model class in providers array:

#### Authentication Guards

Add this guards to use on API middleware 

```php
[
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api_users' => [
            'driver' => 'sanctum',
            'provider' => 'api_users',
        ],
    ],
]
```

#### Providers

Add this providers' configuration:

```php
[
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\User::class
        ],
        'api_users' => [
            'driver' => 'eloquent',
            'model' => \Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\ApiUser::class,
        ],
    ],
];
```

### Routes
You can see the routes inside `src/Shared/Infrastructure/Routes` directory.

### Views

Edit `config/view.php` and change the **paths** value:

```php
'paths' => [
    base_path('src/BoundedContext/Shared/Infrastructure/Resources/views')
],
```

### Include custom Middleware
Edit the file `app/Http/Kernel.php` and put this code:

```php
    protected $middlewareGroups = [
        'web' => [
            \Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares\AuthGates::class,
            \Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares\SetLocale::class,
            \Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares\ApprovalRegistration::class,
            \Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares\EmailVerification::class,
        ],
        'api' => [
            \Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares\AuthGates::class,
            \Ecommerce\BoundedContext\Backend\Infrastructure\Middlewares\WhiteList::class,
        ],
    ];

    protected $routeMiddleware = [
        '2fa' => \Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares\TwoFactorMiddleware::class,
        'admin' => \Ecommerce\BoundedContext\Backoffice\Infrastructure\Middlewares\IsAdmin::class,
    ];
```

### Include custom JSON Exceptions

Edit the file `app/Exceptions/Handler.php` and put this code:

```php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

use Ecommerce\BoundedContext\Backend\Infrastructure\Traits\JsonExceptionHandler;

class Handler extends ExceptionHandler
{
    use JsonExceptionHandler;

    public function render($request, Throwable $e): JsonResponse|Response|RedirectResponse
    {
        if($request->expectsJson()) {
           return $this->onJsonException($request, $e);
        }
    
        return parent::render($request, $e);
    }
}
```

### Publish files

The **vendor:publish** command is used to publish any assets that are available from third-party vendor packages.

The following commands lists and describes each of:

* Config
    ```shell
    php artisan vendor:publish --tag=ecommerce.config
    ```

* Seeders
    ```shell
    php artisan vendor:publish --tag=ecommerce.seeders
    ```
* Assets
    ```sh
    php artisan vendor:publish --tag=ecommerce.assets
    ```
* Languages
    ```sh
    php artisan vendor:publish --tag=ecommerce.lang
    ```

**Publish all**, you can publish all in one command:

```sh
php artisan vendor:publish --provider="Ecommerce\Shared\Infrastructure\Providers\SourceServiceProvider"
```

**Note:** add this flag `--force` to overwrite any existing files. This flag is necessary to publish the seeders

### Migrations

* Run this command to create all tables and insert the initial data:

    ```sh
    php artisan migrate --seed` command. 
    ```

**Notice:** seed is important, because it will create the first admin user for you.

And that's it, go to your domain and login:

### Default credentials

* **Username:** admin@admin.com
* **Password:** password

