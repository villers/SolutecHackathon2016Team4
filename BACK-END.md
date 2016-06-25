# Back-end

### Chef : Mohamed

Pour créer un projet avec Laravel, installer Composer et lancer la commande :

```sh
composer create-project --prefer-dist laravel/laravel api
```

L'API devra renvoyer des informations en JSON, aucune vue ne sera utilisé. Elle devra aussi gérer l'authentification et l'inscription.

Le fichier "DATABASE.md" est la BDD que j'ai faîtes, il faudra modifier le fichier et vos migrations si jamais un changement est opéré sur la BDD.

Penser à utiliser ce plugin pour activer le CORS : https://github.com/barryvdh/laravel-cors

Laravel permet d'utiliser "php artisan make:auth" pour générer une authentification, il faut juste modifier un peut le code pour que sa fonctionne en JSON. A voir si c'est possile d'utiliser cela, sinon il faudra le coder à la main.

Les ressources devront être utilisé avec Laravel, cela fait gagner du temps pour les routes.

```php
Route::resource('photos', 'PhotosController'); // Un exemple de ressource
```

Les commandes sympa pour Laravel :

```php
php artisan make:migration xxx
php artisan make:model xxx
php artisan make:request xxx
php artisan make:controller xxx --resource

php artisan migrate
php artisan rollback
```

Renvoyer du JSON avec Laravel dans une méthode de controller :

```php
Response::json($data, 200, [], JSON_NUMERIC_CHECK);
```

200 est le code HTTP de la réponse. 404 (not found), 422 (formulaire invalide), ...

Oubliez pas d'importer les namespaces des facades avec PHPStorm ou votre IDE.

Oubliez pas la validation des données avec "php artisan make:request", cherchez sur Google c'est super simple à utiliser si vous ne connaissez pas.

Installer POST-MAN pour tester votre API sur Google Chrome : https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop

# Rappel des URL et méthode des ressources :

![Ressources](http://image.noelshack.com/fichiers/2016/25/1466812376-687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031362f32352f313436363338373935332d6c6567656e642d7265737466756c2d7265732e706e67.png)

Les méthodes create() et edit() ne serviront à rien pour notre projet et ne seront pas utilisé.

Mohamed sera chargé de veiller à ce que le code de chacun reste propre et que l'organisation de l'API fonctionne bien. Si un problème survient, c'est à lui que vous devez vous référer en priorité.

A vous de vous répartir les taches du Trello, équitablement.

# Remplissage de la BDD

La BDD doit être en place avant Samedi 11h15.

Hugo sera chargé de remplir la base de donnée de fausse données à partir de 13h00 pendant que les autres continueront de coder l'API (avec Laravel Seeds).
