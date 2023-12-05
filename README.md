# Whitecube Laravel Preset

This preset will install and setup everything that is needed for new Laravel projects at Whitecube.

To start a new project:

1. Create the new Laravel project

```shellsession
laravel new my-project
cd my-project
```

2. Install the preset

```shellsession
composer require whitecube/laravel-preset
```

3. Activate the preset

```shellsession
php artisan ui whitecube
```

4. You're done! You can now compile, watch, etc!

```shellsession
yarn dev
yarn watch
yarn icons
yarn watch-icons
```

Everything you'd expect should be there, and you can get to work right away.

## Setting up new Hiker projects

After doing the above commands, do the following:

1. In `composer.json`, add the hiker and trail repositories:

```json
{
    "repositories": {
        "hiker": {
            "type": "vcs",
            "url": "https://github.com/whitecube/hiker.git"
        },
        "trail": {
            "type": "vcs",
            "url": "https://github.com/whitecube/trail.git"
        }
    }
}
```

2. Create a `composer.local.json` file containing:

```json
{
    "repositories": {
        "hiker": {
            "type": "path",
            "url": "../hiker/",
            "options": {
                "symlink": true
            }
        },
        "trail": {
            "type": "path",
            "url": "../trail/",
            "options": {
                "symlink": true
            }
        }
    }
}
```

3. Run the following terminal commands in the project's folder

```shellsession
composer require whitecube/hiker
php artisan hiker:install
```

## Creating new publishable components

In order to add new publishable components to this package (available with `php artisan publish:component`), please open a PR after completing the following steps:

1. Create a new component publisher located in `./src/Components/Publishers/MyComponent.php`. This class should implement `Whitecube\LaravelPreset\Components\PublisherInterface` ;
2. Inside its `handle()` method, register and return the files that should be created (take a look at the existing examples);
