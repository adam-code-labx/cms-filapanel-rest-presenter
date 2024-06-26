# Welcome to Filapanel

*Brought to you by [Ploi - a server management tool](https://ploi.io/?ref=filapanel-github)*

[https://filapanel.com](https://filapanel.com?ref=filapanel-github)

<p align="center"><a href="https://filapanel.com/?ref=filapanel-github" target="_blank"><img src="https://filapanel.com/img/og.png" width="100%" alt="Filapanel"></a></p>

Generated on: 2024-05-13 13:26:46 (UTC)

Filapanel is your dynamic, user-friendly tool for accelerating Laravel application development. Built on the Filament framework, it provides a seamless approach for creating, configuring, and managing resources and models.

## Installed packages

- [Filamentphp Spatie-Laravel-Media-Library-Plugin](https://github.com/filamentphp/spatie-laravel-media-library-plugin)
- [Xtend-Packages Rest-Presenter](https://github.com/xtend-packages/rest-presenter)

## Further installation

Now that you've got your project, it's time to finish up installation. Please make sure to run the following commands
either in your local project or in your deployment tool.

### Run composer install

```
composer install
```

### Create your `.env`

```
cp .env.example .env
```

Now create a new database and enter the credentials inside your environment file.

### Set your app key

```
php artisan key:generate
```

### Upgrade Filament

```
php artisan filament:upgrade
```

### Run migrations

```
php artisan migrate:fresh
```

### Create SQLite Database

```
touch database/database.sqlite
```

### Link storage

```
php artisan storage:link
```

### Install Package Dependencies

```
pnpm install && pnpm dev
```

### All as one command

```
composer install && 
cp .env.example .env &&
touch database/database.sqlite &&
php artisan key:generate && 
php artisan filament:upgrade &&
php artisan migrate:fresh &&
php artisan storage:link &&
pnpm install && pnpm dev
```
