# Lost in Localization

This is a showcase repository to talk about advanced localization in Symfony2, using [L10nBundle](https://github.com/lafourchette/L10nBundle) by [LaFourchette](http://www.lafourchette.com/).

## Installation

### TL;DR

    composer install
    sudo /bin/bash -c "echo '10.0.0.10 fansible-devops.dev' >> /etc/hosts"
    app/console generate:provisioning
    vagrant up

Application is available at [fansible-devops.dev](fansible-devops.dev).

### Notes

Provisioning is made with [https://github.com/fansible/DevopsBundle](https://github.com/fansible/DevopsBundle).
Requirements to build the virtual environment are listed there.
You may need some tweaking for the Apache configuration.
In case you need more info, check [Symfony documentation](http://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html).

## Contributing

Don't hesitate to open an issue or submit a pull request! ♥
