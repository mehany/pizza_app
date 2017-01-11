# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

# Pizza Builder Client

This app will allow a user to create a Pizza with a name,
a description, and toppings.

# Installation

``` composer install ```

then :

```php artisan install```
This will do the following:

1. Generate a secret key.
2. Creates a sqlite database inside "database" dir.
3. Runs migrations.


# Testing

``` composer test ```


Satisfied Requirements
============

This client covers these stories:

  * As a builder, I should be able to list existing Pizzas
  * As a builder, I should be able to create a new Pizza
  * As a builder, I should be able to list the toppings I can to add to a Pizza
  * As a builder, I should be able to add a topping to a pizza
  * As a builder, I should be able to list toppings on a pizza
  * As a builder, I should be able to create toppings that can be added to a Pizza

Resources
=========
Use these resources to build your client.  The server with these resources can
be accessed at *http://pizza.mehany.io/*

```
GET  toppings               # List toppings
POST toppings               # Create a topping
GET  pizzas                 # List pizzas
POST pizzas                 # Create a pizza
GET  pizzas/:id/toppings    # List toppings associated with a pizza
POST pizzas/:id/toppings    # Add a topping to an existing pizza
```
you can also prefix routes with ```api/```

*Example curl command to create a pizza:*
```
curl -H "Content-Type: application/json" -H "Accept: application/json" https://pizza.mehany.io/pizzas --data '{"pizza": {"name": "belleboche", "description": "Pepperoni, Sausage, Mushroom"}}'
```

Pizza
-----
A Pizza is a baked, round piece of dough covered with sauce and toppings

#### Examples:
```
POST /pizzas, {"pizza" => {"name" => "Belleboche", "description" => "Pepperoni, Mushroom and Sausage"}}
```
```
GET  /pizzas
```

Topping
-------
Raw ingredients that can be added to a pizza

#### Examples:
```
POST /toppings, {topping: {name: "Pepperoni"}}
```
```
GET  /toppings
```

Pizza Toppings
--------------
Pizza Toppings are Toppings that have been added to a Pizza

#### Examples:

```
POST /pizzas/:pizza_id/toppings, {topping_id: 1}
```
```
GET  /pizzas/:pizza_id/toppings
```