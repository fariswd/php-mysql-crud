# PHP MYSQL CRUD API
Vanilla php-mysql API Todo-List

## Run?
```
create database
import todo.sql to yours
update model/connect() with your credentials
```

## Endpoint Table
Endpoint | HTTP | Require | Description
--- | --- | --- | ---
/ | GET | - | Get all todo
/ | POST | body: {title} | Post a Todo
/?id | PUT | query:{id} | Update status Todo (Toggle Status)
/?id | DELETE | query:{id} | Delete Todo 

## Result Example
### GET /
```
result: {
  "status": 200,
  "data": [
    {
      "id": "1",
      "title": "learn php",
      "status": false
    },
    {
      "id": "2",
      "title": "create crud",
      "status": false
    }
  ]
}
```

### POST /
```body: 'php is life'```
```
result: {
  "status": 200,
  "data": [
    {
      "id": "17",
      "title": "php is life",
      "status": false
    }
  ]
}
```

### PUT /?id=17
```
result: {
  "status": 200,
  "data": {
    "id": "17",
    "title": "php is life",
    "status": true
  }
}
```

### DELETE /?id=17
```
result: {
  "status": 200,
  "message": "delete success",
  "oldData": {
    "id": "17",
    "title": "php is life",
    "status": true
  }
}
```

fariswd  
2019
