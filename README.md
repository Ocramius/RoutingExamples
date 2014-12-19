# Dynamic ZendFramework Routing via repository API

These examples show how to configure a custom route type to read from a repository 
service (whic is array-backed for simplicity) and route to a custom controller that
receives an already hydrated entity as a request parameter.

## Installation:

 1. add following to your `composer.json`:
 
    ```json
    {
        "repositories": [
            {
                "url": "https://github.com/Ocramius/RoutingExamples.git",
                "type": "git"
            }
        ],
        "require": {
            "ocramius/routing-examples": "dev-master"
        }
    }
    ```
 
 2. run `composer update`
 3. add `"RoutingExamples"` to the `"modules"` key in `config/application.config.php`.
 4. start a web server via `php -S localhost:8080 -t public`
 5. browse to `http://localhost:8080/`, then `http://localhost:8080/home`, 
    then `http://localhost:8080/contacts` and then `http://localhost:8080/team`
