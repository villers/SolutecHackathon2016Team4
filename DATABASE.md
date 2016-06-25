# Database

Documentation migrations Laravel : https://laravel.com/docs/5.2/migrations#creating-columns

Penser aux liaisons dans vos modèles (hasMany(), hasOne(), belongsTo() -> a plusieurs, a un, appartient à).

Pour chopper des données de façon plus complexe, penser à whereHas().

Nom de la base de donnée : xetian

### users

| Field          | Type          | Constraint  |
| ---------------|:-------------:| -----:|
| id             | integer       | AUTO_INCREMENT, UNSIGNED car ne peut pas être négatif |
| type           | enum          | Enumerable, soit "candidate " ou "recruiter" |
| points         | integer       | UNSIGNED car ne peut pas être négatif, 0 par défaut
| first_name     | varchar       | 35 caractères max |
| last_name      | varchar       | 35 caractères max |
| login          | varchar       | UNIQUE, 15 caractères max |
| email          | varchar       | UNIQUE, 255 caractères max |
| password       | varchar       | 255 caractères max |
| country        | string        | 70 caractères max |
| city           | string        | 70 caractères max |
| postal_code    | integer       | max 5 chiffres, UNSIGNED car ne peut pas être négatif et ZEROFILL pour compléter les zéros |
| address_number | integer       | UNSIGNED car ne peut pas être négatif |
| address        | string        | 70 caractères max
| is_active      | boolean       | 0 par défaut
| token_active   | string        | 255 caractères max
| graduation     | string        | 255 caractères max
| lang           | string       | 50 caractères max

Faut-il des champs supplémentaires ? Laravel ajoutera created_at et updated_at si vous utilisez timestamp() dans les migrations.

### categories

| Field          | Type          | Constraint  |
| ---------------|:-------------:| -----:|
| id             | integer       | AUTO_INCREMENT, UNSIGNED car ne peut pas être négatif |
| name           | varchar       | 35 caractères max |

### jobs

| Field           | Type          | Constraint  |
| ----------------|:-------------:| -----:|
| id              | integer       | AUTO_INCREMENT, UNSIGNED car ne peut pas être négatif |
| user_id         | integer       | UNSIGNED car ne peut pas être négatif |
| category_id     | integer       | UNSIGNED car ne peut pas être négatif |
| country         | string        | 70 caractères max |
| city            | string        | 70 caractères max |
| postal_code     | integer       | max 5 chiffres, UNSIGNED car ne peut pas être négatif et ZEROFILL pour compléter les zéros |
| entreprise_desc | text          | 6000 caractères max |
| message         | text          | 6000 caractères max |
| lang            | string        | 50 caractères max
| graduation      | string        | 50 caractères max
| salary          | float         | UNSIGNED car ne peut pas être négatif 

Si d'autre champs, rajouter. S'inspirer de Pole-Emploi et DoYouBuzz pour compléter les infos d'une offre d'emploi.

### notifications

| Field          | Type          | Constraint  |
| ---------------|:-------------:| -----:|
| id             | integer       | AUTO_INCREMENT, UNSIGNED car ne peut pas être négatif |
| user_id        | integer       | UNSIGNED car ne peut pas être négatif |
| has_read       | boolean       | 0 par défaut |
| message        | text          | 6000 caractères max |

### achievements

| Field          | Type          | Constraint  |
| ---------------|:-------------:| -----:|
| id             | integer       | AUTO_INCREMENT, UNSIGNED car ne peut pas être négatif |
| message        | string        | 50 caractères max |
| points         | integer       | UNSIGNED car ne peut pas être négatif !
| icon           | string        | 25 caractères maximum

### achievements_list

| Field          | Type          | Constraint  |
| ---------------|:-------------:| -----:|
| id             | integer       | AUTO_INCREMENT, UNSIGNED car ne peut pas être négatif |
| user_id        | integer       | UNSIGNED car ne peut pas être négatif |
| achievement_id | integer       | UNSIGNED car ne peut pas être négatif |
| has_read       | boolean       | 0 par défaut |

A compléter avec d'autres informations si besoin.
