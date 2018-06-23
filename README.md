## Peter Finder

We help you find the peter for your pet. This is a standard PHP+PostgreSQL project. [Bootstrap 4](https://getbootstrap.com/) is used as the front-end framework.

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
    - For windows user: Type `setup.bat`
    - For mac/linux user: Type `bash setup.sh`
- Enter your password when appropriate.

**Notice**: If you use the default sample data, the account for testing is as follows:
- Username: `test`
- Password: `peterfinder`

## Integrated Development Environment (IDE)

We suggest you using [PhpStorm](https://www.jetbrains.com/phpstorm/) by JetBrains.

## To deploy the project

- We are currently using [Heroku](https://www.heroku.com/)'s PaaS (platform-as-a-service). It provides a basic free plan which allows to experiement in a limited sandbox.
- To deploy the project, make sure you have installed the latest version of [Heroku command-line tool](https://devcenter.heroku.com/articles/heroku-cli) and [Composer](https://devcenter.heroku.com/articles/heroku-cli). Here, we assume you have also installed the latest version of [Git](https://git-scm.com/). You can run the following command to check
```bash
heroku -v
composer --version
git --version
```
- Run Composer to install all the dependencies and update the `composer.lock` file.
```bash
composer update
```
- Make sure you have modified `config.php` correctly.
- Make sure you have already created a Heroku project on the Heroku control panel. Navigate to your local project repository and add the Heroku project
```bash
heroku git:remote -a <your_heroku_project_name>
```
- Push the changes to the Heroku server.
```bash
git push heroku master
```
The command above will _by default_ push the local master branch to Heroku server. If you want to use a local non-master, use the following command instead
```bash
git push heroku <your_branch_name>:master
```
- To check the instances that are running now:
```bash
heroku ps
```
- To open the web app in production:
```bash
heroku open
```
- To start a remote interactive shell on Heroku server:
	- Notice: _This will start a new one-off dyno. In other words, it is a dyno with the same configuration as the running dyno, but they are not the same dyno._
```bash
heroku run bash
- To access the web dyno that is currently running:
```bash
heroku ps:exec
```
- To view the logs of your application:
```bash
heroku logs --tail
```

## Small tips

We have prepared the following tips to help you with the development:

- [How to enable PHP debug mode](docs/php_debug.md)
- [How to avoid unnecessary cache in PHP](docs/php_cache.md)

We hope you are happy with development!

## Acknowledgements

- Pexels [https://www.pexels.com/]
- Heroku [https://www.heroku.com/]

## Contribution to this project

[Peter Finder](https://github.com/yunpengn/peterfinder) was initially a project for [CS2102 Database Systems](https://yunpengn.github.io/CS2102/) at the [School of Computing](https://www.comp.nus.edu.sg), the [National University of Singapore](http://www.nus.edu.sg). We decided to open-source this project on April 26, 2018.

We welcome everyone to contribute to [Peter Finder](https://github.com/yunpengn/peterfinder). Please follow the [guidelines](docs/CONTRIBUTING.md) before staring your contributions.

## Licence

[GNU General Public Licence 3.0](LICENSE)
