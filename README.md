# Qbind Test

Repository for Qbind first test.

## Usage

To ease testing under XAMPP environment take the already built release (app.zip) and place project folder under
XAMPP htdocs folder.

- [Release v1.0](https://github.com/pedelgado/qbind_test/releases/tag/v1.0)

Application includes configuration files for DDEV development environment. To start the DDEV environment, run:
```
ddev start
```

## Installation (Optional)

To install the necessary dependencies, run:
```
composer install
```
As the purpose was to use plain PHP, no framework has been used. But some libraries have been included to facilitate
the implementation of certain patterns, such as dependency injection and testing.

## Testing

To run the tests, execute:
```
composer test
```
Project includes a few unit tests for VAT Number validation use case as testing example.

## Persistence

For simplicity, the application uses SQLite as database engine. No configuration or migration is required.
Tables will be created automatically in first request (src/Vat/Infrastructure/SQLiteVatRepository.php).

## Project structure

Even if coded in plain PHP, the project structure follows the conventions of modern PHP frameworks for better
organization and maintainability.

### Public folder

Contains mainly the entry point of the application. This entry point acts as a basic **front controller**, routing
all incoming requests to proper controller. It also loads the services container.

### Src folder

Src folder is divided in modules. Each module spits the code in application, domain and infrastructure layers;
following the principles of Domain-Driven Design (DDD) and Hexagonal Architecture. It makes use of other lighter patterns
like Repository, value objects and named constructors, along with others.

### App folder

Contains all the files that are not related to business logic. Commonly the files that would be coupled to a framework.
Controllers are decoupled from other layers through dependency injection.

Views and theming is strictly contained in app/views folder. For agility, twig (PHP template engine) and tailwind
(css framework) has been used.

