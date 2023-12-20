## Livewire Synthesizer

> [!WARNING]
> In development, in no way near ready to use in production.

Simple classes when using simple objects via Livewire Synthesizers – saves some time instead of having to write custom synthesizers from scratch.

This package tries to hydrate and dehydrate all properties on the resource.

> [!NOTE]
> Livewire already ships with synthesizers for simple objects such as collections and arrays, this package is when you need to use custom objects.

### Resource

Represents your custom class/object. All you have to do is extend `Olssonm\LivewireSynthesizer\Resources\GenericResource`.

```php
<?php

namespace App\Resources;

use Olssonm\LivewireSynthesizer\Resources\GenericResource;

class Post extends GenericResource
{
    //
}
```

### Synthesizers

Your synthesizer, extend `Olssonm\LivewireSynthesizer\Synthesizers\GenericSynthesizer`, set a key and specify your class and your almost set.

Please note that your key has to be unique.

```php
<?php

namespace App\Synthesizers;

use App\Resources\Post;
use Olssonm\LivewireSynthesizer\Synthesizers\GenericSynthesizer;

class Post extends GenericSynthesizer
{
    public static $key = 'post';

    public static $class = Post::class;
}
```

### Registering your synthesizer

To enable Livewire to find and register the synthesizer you can register it in your AppServiceProvider;

```php
use App\Support\Synthesizers\Post;
use Livewire\Livewire;

/**
 * Register any application services.
 */
public function register(): void
{
    Livewire::propertySynthesizer(Post::class);
}
```
