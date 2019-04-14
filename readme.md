# PHP MYSQL CRUD API
Vanilla php-mysql API Todo-List

## Run?
```
create database
import todo.sql to yours
update model/connect() with your credentials
```

## Endpoint Table
Endpoint|HTTP|Require|Description
-|-|-|-|-
/|GET|-|Get all todo
/|POST|body: {title}|Post a Todo
/?id|PUT|query:{id}|Update status Todo (Toggle Status)
/?id|DELETE|query:{id}|Delete Todo 

## Result Example
### GET /
```
result: {
  "status": 200,
  "data": [
    {
      "id": "1",
      "title": "learn php",
      "status": "0"
    },
    {
      "id": "2",
      "title": "create crud",
      "status": "0"
    },
    {
      "id": "17",
      "title": "php is life",
      "status": "0"
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
      "status": "0"
    }
  ]
}
```

### PUT /?id=17
```
result: {
  "status": 200,
  "data": {
    "id": "1",
    "title": "learn php",
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