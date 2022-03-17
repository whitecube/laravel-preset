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

