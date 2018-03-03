## Pet Finder

We help you find the peter for your pet.

## To setup the project

- Make sure you have installed the latest version of Bitnami WAPP stack (i.e., at least PHP 7).
- First, clone the repository to your repository (in the `apps` folder of your WAPP installation).
```bash
git clone git@github.com:yunpengn/peterfinder.git
```
- Add the following lines to the end of `apache2/conf/bitnami/bitnami-apps-prefix.conf` (the path may be different):
```bash
Include "C:/WAPP/apps/peterfinder/config/httpd.conf"
```
- Go to the `config` folder under the `peterfinder` folder we cloned just now.
- Create a copy (do not delete the original ones) for `config.example.php` and `httpd.example.conf` each, and rename them to `config.php` and `httpd.conf` respectively.
- Change the `DB_USER` and `DB_PASSWORD` in `config.php`. You may also want to change `DB_PORT` if you changed the port of PostgreSQL before.
- Change the paths in `httpd.conf` to the correct ones according to your WAPP installation.
- Restart your Apache2 server.
- Open the browser and enter the URL `http://localhost/peterfinder` (please make sure it is not `https`). Now you should see our _nice_ homepage!

## To setup the database instance

- Make sure you can use `psql` (Postgre's command-line user interface), which may be troublesome for Windows users. Thus, we have prepared the [guide](docs/psql_setup.md) for Windows users.
- Run the scripts under `scripts` folder.

## Small tips

We have prepared the following tips to help you with the development:

- [How to enable PHP debug mode](docs/php_debug.md)
- [How to avoid unnecessary cache in PHP](docs/php_cache.md)

We hope you are happy with development!

## Licence

[GNU General Public Licence 3.0](LICENSE)
