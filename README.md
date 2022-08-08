# Bootstrap Boxes Plugin

This plugin is an example implementation of a plugin for the
[OFFLINE.Boxes Plugin](https://boxes.offline.ch).

It provides ready-to-go Boxes based on [Bootstrap's examples](https://getbootstrap.com/docs/5.2/examples/).

## Installation

To install this plugin, use the following command:

```bash
php artisan plugin:install offline.bootstrapboxes --from=git@github.com:OFFLINE-GmbH/oc-bootstrap-boxes-plugin.git
```

## Clarification

By default, you place your Boxes partials in your theme directory. `oc-bootstrap-boxes-plugin` is a [third-party Boxes plugin](https://docs.boxes.offline.ch/use-cases/third-party-boxes.html) that you can install in any project. It installs all code in the `plugins/` folder and never touches your theme.

However, the partial structure in the `partials/` folder of this plugin is the same as you would use in a theme, so feel free to use it as a reference.

## Documentation

You can find the documentation regarding Third-Party-Plugins for OFFLINE.Boxes
on the [documentation website](https://docs.boxes.offline.ch/use-cases/third-party-boxes.html).

