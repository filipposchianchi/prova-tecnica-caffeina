---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Authentication management


APIs for managing authentication
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register new user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Filippo","email":"filippo@test.it","password":"quibusdam","password_cofirmation":"ut"}'

```

```javascript
const url = new URL(
    "http://localhost/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Filippo",
    "email": "filippo@test.it",
    "password": "quibusdam",
    "password_cofirmation": "ut"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "user": {
        "id": 1,
        "name": "Filippo",
        "email": "filippo@test.it",
        "created_at": "2020-03-15T10:30:45.000000Z",
        "updated_at": "2020-03-15T10:34:16.000000Z"
    },
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiM2VlZjVjYzVlOWNlNjMzMzhkMjMwYmEzOTNhNTczMjc3NWRlNjU2NTY5OTc4ZmE3Y2ZiYmEyZTkyNmFiNWQxZTNmYjE4ZDk2ODUxNDliY2MiLCJpYXQiOjE1ODQyODM1NDksIm5iZiI6MTU4NDI4MzU0OSwiZXhwIjoxNjE1ODE5NTQ5LCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.yUd0wHA309exgNzDudPd3a0ndjqaBsZ6HsGKwfeurJ1OJmgUjPxmEuK4CzQhkX8Q0dBWqhXDxWf73YMyegCmio18cTvYVGXS3Q3u_fRry3k0ok8uwPeEthPkNuAa9EHdk4yH-QXwNIRBcunT7ivNaoZU5BStOsf53dO-rpw-9azmHiaihM9OvjmiXp4kjobc2aFdrxKFDuB4Q8n0ou9_gsH78jIJwtXnowAHl6hFDaZLGh8r_WzVUsXNozizbh_QZbWPrcSpuWwyUOw6TiH8-xie4Reofgbi-jQDPbvuebBdg-3ArXcw93BYz5dCqpAuASqbGTQUfY2bwkhCJY9l1fqc_HmbpZCaE_6lk-RQiOPOavhxoYmELOLlNSupBbJW2iTBSq1FWvDR6rc6dpJxmlvITre9vWuhdwHQH8wJWDkVuG7IGtvyEohZJObCsd0-e3h-_ueU1mhXsuYuXHoOTEzDrSZhdvwTAkP2KhIYsPCdwBefkjaQuHbC9OjuZvxjrvdPGEnJV3_m4THGHwkEgb4yzI3JH7E8EEktT_r1muZFfqCetRNOanw3X95JIw9ZB2TmiacVI32zMKI3P8o31bjfkPKvoL6J1Kpkh2Rckzpj3VQ0pOitpbTy0YXkJ3szOQCKRsSfyPJr_ZddOYEQoYHdRO2UcZFmzXtJeLcaIv0"
}
```
> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email has already been taken."
        ]
    }
}
```

### HTTP Request
`POST api/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | The name of the user.
        `email` | string |  required  | The email of the user.
        `password` | string |  required  | The password of the user.
        `password_cofirmation` | string |  required  | The password of the user.
    
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login user.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"filippo@test.it","password":"quam"}'

```

```javascript
const url = new URL(
    "http://localhost/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "filippo@test.it",
    "password": "quam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "user": {
        "id": 1,
        "name": "Filippo",
        "email": "filippo@test.it",
        "email_verified_at": "null",
        "created_at": "2020-03-15T10:30:45.000000Z",
        "updated_at": "2020-03-15T10:34:16.000000Z"
    },
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiM2VlZjVjYzVlOWNlNjMzMzhkMjMwYmEzOTNhNTczMjc3NWRlNjU2NTY5OTc4ZmE3Y2ZiYmEyZTkyNmFiNWQxZTNmYjE4ZDk2ODUxNDliY2MiLCJpYXQiOjE1ODQyODM1NDksIm5iZiI6MTU4NDI4MzU0OSwiZXhwIjoxNjE1ODE5NTQ5LCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.yUd0wHA309exgNzDudPd3a0ndjqaBsZ6HsGKwfeurJ1OJmgUjPxmEuK4CzQhkX8Q0dBWqhXDxWf73YMyegCmio18cTvYVGXS3Q3u_fRry3k0ok8uwPeEthPkNuAa9EHdk4yH-QXwNIRBcunT7ivNaoZU5BStOsf53dO-rpw-9azmHiaihM9OvjmiXp4kjobc2aFdrxKFDuB4Q8n0ou9_gsH78jIJwtXnowAHl6hFDaZLGh8r_WzVUsXNozizbh_QZbWPrcSpuWwyUOw6TiH8-xie4Reofgbi-jQDPbvuebBdg-3ArXcw93BYz5dCqpAuASqbGTQUfY2bwkhCJY9l1fqc_HmbpZCaE_6lk-RQiOPOavhxoYmELOLlNSupBbJW2iTBSq1FWvDR6rc6dpJxmlvITre9vWuhdwHQH8wJWDkVuG7IGtvyEohZJObCsd0-e3h-_ueU1mhXsuYuXHoOTEzDrSZhdvwTAkP2KhIYsPCdwBefkjaQuHbC9OjuZvxjrvdPGEnJV3_m4THGHwkEgb4yzI3JH7E8EEktT_r1muZFfqCetRNOanw3X95JIw9ZB2TmiacVI32zMKI3P8o31bjfkPKvoL6J1Kpkh2Rckzpj3VQ0pOitpbTy0YXkJ3szOQCKRsSfyPJr_ZddOYEQoYHdRO2UcZFmzXtJeLcaIv0"
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email of the user.
        `password` | string |  required  | The password of the user.
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_31f430322462abe3fc3e4ba369b8f77d -->
## Send the email verification notification.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/email/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/email/resend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Email Sent"
}
```
> Example response (401):

```json
{
    "messagge": "Unauthenticated"
}
```

### HTTP Request
`GET api/email/resend`


<!-- END_31f430322462abe3fc3e4ba369b8f77d -->

<!-- START_3e4a08674c3c1aaa7a4e8aacbf86420a -->
## Mark the authenticated user&#039;s email address as verified.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/email/verify/quia/rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/email/verify/quia/rerum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "message": "Invalid signature."
}
```

### HTTP Request
`GET api/email/verify/{id}/{hash}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | id of the user
    `hash` |  required  | hash of the user

<!-- END_3e4a08674c3c1aaa7a4e8aacbf86420a -->

#Notes management


APIs for managing notes
<!-- START_5184c63b96049910fee7fc65756de436 -->
## Display a listing of the resource.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/notes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/notes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 4,
            "title": "a",
            "description": "Dormouse slowly and don't much surprised, that had a mouse doesn't matter,' it further. So she.",
            "created_at": "2020-03-14T17:14:45.000000Z",
            "updated_at": "2020-03-14T17:14:45.000000Z",
            "user_id": 1
        },
        {
            "id": 5,
            "title": "dignissimos",
            "description": "I think that she was a very glad they all its eyes, 'Of course you mean \"purpose\"?' said the hall.",
            "created_at": "2020-03-14T17:14:45.000000Z",
            "updated_at": "2020-03-14T17:14:45.000000Z",
            "user_id": 1
        },
        {
            "id": 6,
            "title": "impedit",
            "description": "Said the kitchen. 'When we change to her as he had just at first, and she said the stick, and so.",
            "created_at": "2020-03-14T17:14:45.000000Z",
            "updated_at": "2020-03-14T17:14:45.000000Z",
            "user_id": 1
        }
    ]
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/notes`


<!-- END_5184c63b96049910fee7fc65756de436 -->

<!-- START_fc4b6ae244ae158e33e19e0d56b80711 -->
## Store a newly created note in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://localhost/api/notes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"My first note","description":"This is the description of my first note"}'

```

```javascript
const url = new URL(
    "http://localhost/api/notes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "My first note",
    "description": "This is the description of my first note"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "title": "titolo nota",
        "description": "descrizione nota",
        "user_id": 2,
        "updated_at": "2020-03-15T18:23:50.000000Z",
        "created_at": "2020-03-15T18:23:50.000000Z",
        "id": 13
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`POST api/notes`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | The title of the note.
        `description` | string |  required  | The descritption of the note.
    
<!-- END_fc4b6ae244ae158e33e19e0d56b80711 -->

<!-- START_7c30ddc7968295f3665e9e7e4712506d -->
## Display the specified note.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/notes/asperiores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/notes/asperiores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 4,
        "title": "a",
        "description": "Dormouse slowly and don't much surprised, that had a mouse doesn't matter,' it further. So she.",
        "created_at": "2020-03-14T17:14:45.000000Z",
        "updated_at": "2020-03-14T17:14:45.000000Z",
        "user_id": 1
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/notes/{note}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `note` |  required  | id of the note

<!-- END_7c30ddc7968295f3665e9e7e4712506d -->

<!-- START_e17ba28433f1ed23cb7a68ebbfcafa11 -->
## Update the specified resource in storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/notes/autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"Updated note","description":"Updated description"}'

```

```javascript
const url = new URL(
    "http://localhost/api/notes/autem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Updated note",
    "description": "Updated description"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 4,
        "title": "Updated title",
        "description": "Updated description",
        "created_at": "2020-03-14T17:14:45.000000Z",
        "updated_at": "2020-03-14T17:14:45.000000Z",
        "user_id": 1
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`PUT api/notes/{note}`

`PATCH api/notes/{note}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `note` |  required  | id of the note
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | The title of the note.
        `description` | string |  required  | The descritption of the note.
    
<!-- END_e17ba28433f1ed23cb7a68ebbfcafa11 -->

<!-- START_9541e0368a1f31ee173647e886e97f45 -->
## Remove the specified resource from storage.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/notes/eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/notes/eum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Note deleted"
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`DELETE api/notes/{note}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `note` |  required  | id of the note

<!-- END_9541e0368a1f31ee173647e886e97f45 -->

#User management


APIs for managing user
<!-- START_2b6e5a4b188cb183c7e59558cce36cb6 -->
## Show user info.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 3,
    "name": "Filippo",
    "email": "test3@test.it",
    "email_verified_at": null,
    "created_at": "2020-03-14T19:10:28.000000Z",
    "updated_at": "2020-03-14T19:10:28.000000Z"
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user`


<!-- END_2b6e5a4b188cb183c7e59558cce36cb6 -->


