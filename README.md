## About Squad Dashboard

Desktop application to view squad information at-a-glance. Built on [NativePHP](https://nativephp.com/).

## Getting Started

- Install dependencies: Run `composer install` upon first checkout, and then run `php artisan native:install`.
- Launch the app: `php artisan native:serve`

## Generate the app binary

- Build the app with: `php artisan native:build`
    - Note: I have not been able to locate the app bundle that was built. It looks like JS output is stored in `./vendor/nativephp/electron/resources/js/out/`, but I wasn't able to find a corresponding `.app` file.
- Generate the app binary using `php artisan native:publish`
    - Note: This will fail the publish step until config has been updated to location to publish the build (e.g. AWS or DigitalOcean)
    - You may require a valid Apple Development certificate in order to properly code sign the macOS application
    - App binaries stored in `./dist/mac/` and `./dist/mac-arm64/`

## Other Notes

- App build size is what you would expect for Electron apps, perhaps even more so with Laravel dependencies added on top (273.8 MB for Hello World app)
- App loading time is very slow (several seconds) and what you would expect for unoptimized Electron apps
