# Immutable Carbon

[![Latest Stable Version](https://poser.pugx.org/timacdonald/immutable-carbon/v/stable)](https://packagist.org/packages/timacdonald/immutable-carbon) [![Total Downloads](https://poser.pugx.org/timacdonald/immutable-carbon/downloads)](https://packagist.org/packages/timacdonald/immutable-carbon) [![License](https://poser.pugx.org/timacdonald/immutable-carbon/license)](https://packagist.org/packages/timacdonald/immutable-carbon)

[Carbon](https://github.com/briannesbitt/Carbon) is awesome. Immutable carbon is just a little bit more awesome. An attempt to make the Carbon date library immutable. It is simply a wrapper class around the `Carbon\Carbon` class so you can just use it as if you were using the actual class. Just keep in mind that it is immutable - thus you can no longer set values by calling `$instance->property = 'whatever'`.

This was a hobby project to attempt to make Carbon immutable - but you should probably check out [Chronos](https://github.com/cakephp/chronos) for any large project.

## Installation

You can install using [composer](https://getcomposer.org/) from [Packagist](https://packagist.org/packages/timacdonald/immutable-carbon)

```
composer require timacdonald/immutable-carbon
```

## Versioning

This package uses *Semantic Versioning*. You can find out more about what this is and why it matters by reading [the spec](http://semver.org) or for something more readable, check out [this post](https://laravel-news.com/building-apps-composer).

## Basic Usage

Here is a quick example. You'll noticed the API is the same as the base library.

``` php
$now = Carbon::now();

$tomorrow = $now->addDay();
```

Once this code has run `$now` is still todays date, i.e. `$now == Carbon::now()`, however `$tomorrow == Carbon::now()->addDay()`.

## Contributing

Please feel free to suggest new ideas or send through pull requests to make this better. If you'd like to discuss the project, feel free to reach out on [Twitter](https://twitter.com/timacdonald87). I just throw my ideas for the project in the [issues list](https://github.com/timacdonald/immutable-carbon/issues) if you want to help implement anything.

## License

This package is under the MIT License. See [LICENSE](https://github.com/timacdonald/immutable-carbon/blob/master/LICENSE) file for details.

## Thanks

Big thanks to everyone who has contributed to the Carbon date library and [Freek Van der Herten](https://twitter.com/freekmurze) for [inspiring](https://twitter.com/freekmurze/status/927985661818400768) me to give this a go.