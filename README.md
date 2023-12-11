# Simple API Eventos

__

## Get Token
```
POST /api/sanctum/token HTTP/1.1
Content-Type: application/json
User-Agent: insomnia/8.4.5
Accept: application/json
Host: localhost:8000
Content-Length: 78

{
"email":"wp.barcelos@gmail.com",
"password":"suporte",
"device_name":"app"
}
```

## Consulta de eventos

```
GET /api/event?perPage=2 HTTP/1.1
User-Agent: insomnia/8.4.5
Accept: application/json
Authorization: Bearer 111|LMyOZ7FSUa2nubefxBFZtjzuLlvisDud5qt9D8Tk325dca23
Host: localhost:8000

```

## Criar Evento

```
POST /api/event HTTP/1.1
Content-Type: multipart/form-data; boundary=---011000010111000001101001
User-Agent: insomnia/8.4.5
Accept: application/json
Authorization: Bearer 111|LMyOZ7FSUa2nubefxBFZtjzuLlvisDud5qt9D8Tk325dca23
Host: localhost:8000
Content-Length: 565

-----011000010111000001101001
Content-Disposition: form-data; name="name"

Aniversário de Ketlyn
-----011000010111000001101001
Content-Disposition: form-data; name="description"

Aniversário da Ketlyn
-----011000010111000001101001
Content-Disposition: form-data; name="start_at"

2023-12-21 19:30
-----011000010111000001101001
Content-Disposition: form-data; name="price"

0
-----011000010111000001101001
Content-Disposition: form-data; name="image"; filename="Convite_Ketlyn (1).png"
Content-Type: image/png


-----011000010111000001101001--
```


## Route List

| GET\|HEAD  | api/event .................................................. event.index › API\EventController@index |
|------------|------------------------------------------------------------------------------------------------------|
| POST       | api/event .................................................. event.store › API\EventController@store |
| POST       | api/event/upload/{event} ........................................... API\EventController@uploadImage |
| GET\|HEAD  | api/event/{event} ............................................ event.show › API\EventController@show |
| PUT\|PATCH | api/event/{event} ........................................ event.update › API\EventController@update |
| DELETE     | api/event/{event} ...................................... event.destroy › API\EventController@destroy |
| GET\|HEAD  | api/event/{event}/invite ................................................ API\InviteController@index |
| POST       | api/event/{event}/invite ................................................ API\InviteController@store |
| DELETE     | api/invite/{invite} ................................................... API\InviteController@destroy |
| POST       | api/sanctum/token ......................................................... API\AuthController@login |
| GET\|HEAD  | api/user ................................................................... API\AuthController@show |
| GET\|HEAD  | sanctum/csrf-cookie .............. sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieController@show |
