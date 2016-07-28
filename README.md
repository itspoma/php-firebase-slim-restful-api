# Just another app

- PHP \w [Slim framework](https://packagist.org/packages/slim/slim)
- [Firebase](https://www.firebase.com/) \w [REST API Client](https://packagist.org/packages/ktamas77/firebase-php)
- RESTful API

![](https://s31.postimg.org/fi5faenzf/Untitled_Diagram.png)
*[exported XML for draw.io's UML diagram](http://pastebin.com/raw/amuqNyb8)*

## Setup & Run

```
$ composer install

$ cp src/config/development.sample.php src/config/development.php

$ composer run-script server
$ open http://localhost:8080/
```

## Sample Firebase data

All data represented below available by these links:
- https://php-firebase-slim-restfu-d0133.firebaseio.com/users.json
- https://php-firebase-slim-restfu-d0133.firebaseio.com/users/1.json
- https://php-firebase-slim-restfu-d0133.firebaseio.com/users/1/orders.json
- https://php-firebase-slim-restfu-d0133.firebaseio.com/users/1/orders/3.json

All data (just copy/paste to Firebase):
```
{
  "1": {
    "userId": "1",
    "firstName": "John",
    "lastName": "Dobrzycki",
    "email": "john@gmail.com",
    "phone": "3809977885546",
    "orders": {
      "1": {  
        "orderId": "1",
        "total": "12",
        "date": "05/10/2016",
        "status": "ordered"
      },
      "2": {  
        "orderId": "2",
        "total": "44",
        "date": "01/05/2016",
        "status": "ordered"
      },
      "3": {  
        "orderId": "3",
        "total": "44",
        "date": "05/07/2016",
        "status": "canceled"
      }
    }
  },
  "2": {  
    "userId": "2",
    "firstName": "Alex",
    "lastName": "Bloodcleaver",
    "email": "alex@gmail.com",
    "phone": "1355498887",
    "orders": {
      "1": {  
        "orderId": "1",
        "total": "5",
        "date": "01/10/2016",
        "status": "canceled"
      }
    }
  },
  "3": {  
    "userId": "3",
    "firstName": "Jozeffa",
    "lastName": "Solidpunch",
    "email": "jozeffa@gmail.com",
    "phone": "119879888"
  },
  "25": {  
    "userId": "25",
    "firstName": "Jozeffa25",
    "lastName": "Solidpunch25",
    "email": "jozeffa25@gmail.com",
    "phone": "252525"
  }
}
```
