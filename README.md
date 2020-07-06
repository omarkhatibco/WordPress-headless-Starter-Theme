# WordPress Headless Starter Theme

![WordPress Headless Starter Theme](screenshot.png)

This is lightweight theme is desiged for using WordPress as a headless, so you can use what every you need in the frontEnd.

## Installation

Upload your theme to `wp-content/themes/your-theme` and activate it.

In `wp-config.php` add this 2 lines.

```php
define('APP_ORIGIN', '*'); // this will helps you define Access-Control-Allow-Origin.
define('APP_FRONTEND', 'https://localhost:3000'); // this will helps you making the preview button in editor works.
```

## Requirements

- [PHP](http://php.net/) >= 7.3
- [WordPress](https://wordpress.org/) >= 5.0

## Directory structure

```
wp-content/themes/your-theme
├── app/
│   ├── api/                       # API folder where you can make custom API endpoints.
│   │   └── example.php            # Example API endpoint.
│   ├── core/                      # Some functions to adjust the backend
│   │   ├── admin.php
│   │   ├── assets.php
│   │   ├── core.php
│   │   ├── cors.php
│   │   ├── gutenberg.php
│   │   └── log.php
│   ├── inc/                       # Plugins Folder.
│   │   └── carbon-fields/         # Carbon Fields Folder.
│   ├── setup/                     # Register WordPress menus, post types etc.
│   │   ├── carbon-fields/
│   │   │   ├── post-meta.php
│   │   │   ├── term-meta.php
│   │   │   ├── theme-options.php
│   │   │   └── user-meta.php
│   │   ├── menus.php
│   │   ├── post-types.php
│   │   ├── taxonomies.php
│   │   └── theme-support.php
│   ├── carbon-fields.php           # Register Carbon Fields actions and filters.
│   └── hooks.php                   # Register your actions and filters here.
├── languages/                      # Language files.
├── functions.php                   # Bootstrap theme.
├── screenshot.png                  # Theme screenshot.
├── style.css                       # Theme stylesheet.
└── ...
```

## Carbon Fields

Carbon Fields are deactivated by default, since not eveyone use it.
if you want to activate it head to `function.php` and edit this line.

```php diff
// (Optional) Register Carbon Fields.
- // require_once  'app/carbon-fields.php';
+ require_once  'app/carbon-fields.php';
```

## Credits

This theme stater is heavly inspired by:

- [wpemerge-theme by htmlburger](https://github.com/htmlburger/wpemerge-theme).
- [headless-wp-starter by Postlight](https://github.com/postlight/headless-wp-starter).
