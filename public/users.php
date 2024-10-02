<?php

// Exercice :
//  Créez :
//    - 1 fichier (en PHP) de définition d'utilisateurs avec les infos que vous souhaitez
//    - 1 fonction pour charger ces utilisateurs
//    - 1 fonction pour trier les utilisateurs par rôle 🙃
//    - 1 fonction pour chercher un utilisateur avec un "username" donné

function findUsers(): array
{
    static $users = null;

    if ($users === null) {
        var_dump('Loading data file "users.php"');
        $users = require dirname(__DIR__) . '/data/users.php';
    }

    return $users;
}

function findUserByUsername(string $username): ?array
{
    $users = findUsers();

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return $user;
        }
    }

    return null;
}

function sortUsersByRoles(): array
{
    $users = findUsers();

    usort($users, function (array $firstUser, array $secondUser): int {
        sort($firstUser['roles']);
        sort($secondUser['roles']);

        // Spaceship operator retourne un entier de comparaison
        // @see strcmp()
        return $firstUser['roles'][0] <=> $secondUser['roles'][0];
    });

    return $users;
}

// Test :
var_dump(findUsers());

var_dump(findUserByUsername('admin'));
var_dump(findUserByUsername('oups'));

var_dump(sortUsersByRoles());
