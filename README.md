# Dynamic ZendFramework Routing via repository API

These examples show how to configure a custom route type to read from a repository 
service (whic is array-backed for simplicity) and route to a custom controller that
receives an already hydrated entity as a request parameter.

## Installation:

 1. clone this gist into a local directory into ZF app's `module` directory
 2. configure composer autoloading by adding `{"autoload":{"psr-0":{"RoutingExamples":"module/RoutingExamples/src"}}}`
 3. run `composer dump-autoload`
 4. add `"RoutingExamples"` to the `"modules"` key in `config/application.config.php`.
 5. start a web server via `php -S localhost:8080 -t public`
 6. browse to `http://localhost:8080/`, then `http://localhost:8080/home`, 
    then `http://localhost:8080/contacts` and then `http://localhost:8080/team`
