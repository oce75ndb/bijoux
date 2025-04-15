<?php

return [
    'required' => 'Le champ :attribute est obligatoire.',
    'email' => 'Le champ :attribute doit être une adresse email valide.',
    'min' => [
        'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
    ],
    'confirmed' => 'La confirmation du mot de passe ne correspond pas.',

    'password' => [
        'letters' => 'Le mot de passe doit contenir au moins une lettre.',
        'mixed' => 'Le mot de passe doit contenir au moins une majuscule et une minuscule.',
        'numbers' => 'Le mot de passe doit contenir au moins un chiffre.',
        'symbols' => 'Le mot de passe doit contenir au moins un symbole.',
        'uncompromised' => 'Le mot de passe a été compromis dans une fuite de données. Veuillez en choisir un autre.',
    ],

    'attributes' => [
        'name' => 'nom',
        'prenom' => 'prénom',
        'email' => 'adresse e-mail',
        'password' => 'mot de passe',
    ],
];
