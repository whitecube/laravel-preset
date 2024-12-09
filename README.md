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

1. Add the Hiker repository to the `composer.json` file:

```shellsession
composer config repositories.hiker composer https://repo.hiker.dev
```

2. The, run the following terminal commands:

```shellsession
composer require hiker-dev/hiker
```

3. When prompted, add your Hiker.dev user & license. You can store these credentials in a `auth.json`, but don't forget to add this file to the project's `.gitignore`!

4. Finally, run Hiker's installation command:

```shellsession
php artisan hiker:install
```

## Creating new publishable components

In order to create a publishable component, one should simply create a new "Publisher" class inside `src/Components/Publishers` and implement `Whitecube\LaravelPreset\Components\PublisherInterface` : 

```php
namespace Whitecube\LaravelPreset\Components\Publishers;

use Whitecube\LaravelPreset\Components\File;
use Whitecube\LaravelPreset\Components\FilesCollection;
use Whitecube\LaravelPreset\Components\PublisherInterface;

class Wysiwyg implements PublisherInterface
{
    /**
     * Get the component's displayable name.
     */
    public function label(): string
    {
        return 'WYSIWYG section';
    }

    /**
     * Let the publisher prompt for eventual extra input
     * and return a collection of publishable files.
     */
    public function handle(): FilesCollection
    {
        $style = File::makeFromStub(
            stub: 'components/wysiwyg/part.scss',
            destination: resource_path('sass/parts/_wysiwyg.scss'),
        );

        $view = File::makeFromStub(
            stub: 'components/wysiwyg/view.blade.php',
            destination: resource_path('views/components/wysiwyg.blade.php'),
        );

        return FilesCollection::make([$style, $view]);
    }

    /**
     * Get the component's usage instructions
     */
    public function instructions(): ?string
    {
        return "1. Add `@import 'parts/wysiwyg';` to `resources/sass/app.scss`\r\n2. Use the blade component: `<x-wysiwyg><p>Some content</p></x-wysiwyg>`";
    }
}
```

Most of the heavy-lifting will be achieved inside the publisher's `handle()` method. For instance, it's a great place to prompt for additional component-specific information and configure the publishable files accordingly.

The `handle()` method's main purpose is to collect and return the publishable files, that's why this package provides a `File` class with several useful methods and features. First, you can choose to create a `File` instance using one of these methods:

- `File::makeFromStub(string $destination, string $stub)`: useful when working with existing files ;
- `File::make(string $destination, string $content, ?string $origin = null)`: useful when creating files from scratch.

Most of the time, `File::makeFromStub` should be used in order to keep a clear commit history on the component's original files somewhere in this package's `components/[your-component]` directory.

These `File` instances can be manipulated before publication with a few useful methods:
- `$sassFile->replaceVariableValue('wysiwyg_width_columns', 10)`;
- `$sassFile->replaceBemBase('wysiwyg', 'foo')`;
- `$bladeFile->replaceBemBase('wysiwyg', 'foo')`;

Of course, Laravel Prompts can be used anywhere inside a publisher's `handle()` method, which is useful for file configuration:

```php
use function Laravel\Prompts\text;

$style = File::makeFromStub(
    stub: 'components/wysiwyg/part.scss',
    destination: resource_path('sass/parts/_wysiwyg.scss'),
);

$width = text(
    label: 'How many columns should the WYSIWYG\'s container width be?',
    default: 10,
    hint: 'Based on a 12 columns grid',
);

$style->replaceVariableValue('wysiwyg_width_columns', $width);
```