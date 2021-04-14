
# Install

```sh
composer update
php artisan migrate


```




# Routing


## exsample.com/login

#### request
```

{
    "email" : "exsampleemail@domain.com",
    "password" "exsamplepassworld"
}
```
#### response
```
{
    "token" : "random string"
}
```

## exsample.com/register

#### request
```

{
    "username": "exsampleusername",
    "email" : "exsampleemail@domain.com",
    "password" "exsamplepassworld"
}
```
#### response
```
{
    "status" : "sucess register"
}
```

## exsample.com/


### headers

```
{"Authorization" "bearer token"}
```
### request post
```
{
    "question_title" : "youtquestion title"
    "content" : "your content" ,
    "tag" : "your tag"
 }

```

#### response
```
{
    "status" : "sucess create new question"
}
```

### request get

```
[{
    "id" : "1",
    "question_title" : "youtquestion title"
    "content" : "your content" ,
    "tag" : "your tag"

}]
```

## exsample.com/id

## request get

```
[{
    "id" : "1",
    "question_title" : "youtquestion title"
    "content" : "your content" ,
    "tag" : "your tag",
    "user" : "user"

}]

```

### request put
```
{

    "question_title" : "option title"
    "content" : "option content" ,
    "tag" : "option tag"

}
```
#### response

```

{
    "status" : "sucess update question "
}
```


### request delete

```

{
    "status" : "sucess delete question "
}
```



## example.com/Answere/id_question


### request post
```

{
    "content" : "your content"
}
```

## request get

```

{
    "content" : "your content",
    "user" : "user"
}

```

## example.com/Answere/id

### request put

```

{
    "content:" : "youcontent
}

```


### request  get


```
{
    "id" : 1,
    "content" : "yourcontent"

}
```


### request delete