# lvg-presets
Speed up the time to set up a new laravel project with a preset based in TailwindCSS/ReactJS or Bootstrap/React.
This preset also includes a basic controller structure and basic routing.

## Installation

You can install the package through Composer.

```bash
composer require larsvg/lvg-preset
```

To scaffold using ReactJS/Bootstrap
`php artisan ui react-boostrap`

To scaffold using ReactJS/TailwindCSS
`php artisan ui react-tailwind`

And finally install the packages
`npm install && npm run watch`

## TailwindCSS

The preset adds a basic `tailwind.config.js`. To replace it with a full configuration file, delete it and run

`npx tailwindcss init --full`


This preset comes with laravel `laravel-mix-purgecss` purging method over tailwind's default purging method. To silence the purging notice when running in production, configure purge: false in tailwind.config.js.
