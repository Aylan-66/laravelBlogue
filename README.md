# Test Laravel blogue

## Créations des rôles

Pour les rôles, j'ai décidé de faire une commande qui prend en argument le name du rôle créer.

```bash
php artisan createrole {name}
```

## Le projet est conçu pour ces trois rôles bien précis:

"Admin, Moderator, Author"

Lors de la création d'un user, il est par défault "Author".

Il faut donc passer par la db pour mettre un user en admin. Celui-ci pourras ensuite manager les rôles des utilisateurs via l'application directement.

Après ces étapes, le projet est prêt!
