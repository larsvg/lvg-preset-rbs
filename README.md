# lvg-preset-rbs
Laravel preset with frontend scaffolding and Laravel structure scaffolding.

Run this command to add the preset to your project:

`composer require larsvg/preset-rbs`

To scafold your laravel application with ReactJS and Bootstrap run
`php artisan ui react-boostrap`

To scafold with ReactJS and TailwindCSS run
`php artisan ui react-tailwind`

To scaffold a full TailwindCSS configuration file, run
`npx tailwindcss init --full`

This preset comes with laravel `laravel-mix-purgecss` purging method over tailwind's default purging method. To silence the purging notice when running in production, configure purge: false in tailwind.config.js.
