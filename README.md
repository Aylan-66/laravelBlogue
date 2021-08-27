# Test Laravel blogue

## Rôles

Trois rôles sont créés durant la migration.

“Admin, Moderator, Author”.


## Users:

Lors de la création, d’un user,il prend par défaut le rôle Author, seul un admin peut modifier son rôle.

Il y a trois utilisateurs qui ont les trois rôles.

```json

[
    {
        "id":"1",
        "name":"testAdmin",
        "email":"admin@test.com",
        "password":"testtest",
        "role_id":"1"
    },
    {
        "id":"2",
        "name":"testModo",
        "email":"moderator@test.com",
        "password":"testtest",
        "role_id":"2"
    },
    {
        "id":"3",
        "name":"testAuthor",
        "email":"author@test.com",
        "password":"testtest",
        "role_id":"3"
    }
]
```


