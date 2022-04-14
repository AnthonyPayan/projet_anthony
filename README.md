# Recette

Partage de recette de cuisine.

![démo_projet](https://user-images.githubusercontent.com/55577599/163473096-80a67e39-105e-4d66-b7f3-c9089066a9ab.gif)


## Pour commencer

### Pré-requis

- PHP >= 7.4.26

### Installation

- Télécharger le depôt Git. 

- Importer la base de données (libraries/bdd/example_database.sql).

- Renommer le fichier "constants.php.default" en "constants.php" (libraries/services/).

- Retirer les commentaires du contenu de "constants.php".

- Donner une valeur aux constantes: 

  - ATTENTE = int (Index de la catégorie Attente dans la table CATEGORIES)
  - ADMIN = 1 (Index du ROLE Admin dans la table USERS)
  - USERS = 3 (Index du ROLE User dans la table USERS)
  - DB_HOST = "string" (Nom de l'hôte de la BDD)
  - DB_NAME = "string" (Nom de la BDD)
  - DB_USER = (Login d'accès de votre BDD)
  - DB_PWD  = (Mot de passe de votre BDD)
  
- Créeer un virtualhost qui puisse accèder au dossier "recipe".

## Démarrage

Admin:
- Pseudonyme: admin
- Mot de passe: admin

User:
- Pseudonyme: user
- Mot de passe: user

User2:
- Pseudonyme: user2
- Mot de passe: user


## Fabriqué avec

* [PHP V7.4.26](https://www.php.net/) - (back-end)

* [Normalize.css V8.0.1](https://necolas.github.io/normalize.css/) - (front-end)
* [BootStrap V5.1.3](https://getbootstrap.com/) - (front-end)
* [BootsWatch](https://bootswatch.com/) - (front-end)
* [JavaScript](https://bootswatch.com/) - (front-end)

* [FontAwesome V5.15.4](https://fontawesome.com/)
* [GoogleFonts](https://fonts.google.com/)


## Versions

**_Dernière version_**
- **1.0**

**_Prochaine versions_**
- **1.1** 
  - Ajout de restrictions sur formulaire POST 'commentaires'.
  - Ajout de restrictions sur formulaire POST 'titre des recettes'.
  - Ajout de restrictions de taille d'image sur le POST et mis à jour d'images des recettes. 
  
- **1.2**
  - Ajout d'une vérification lors de l'inscription par mail.
  
## Auteur

* **Anthony Payan** _alias_ [@AnthonyPayan](https://github.com/AnthonyPayan)

## Contributeur

<img src="https://user-images.githubusercontent.com/55577599/163478255-2c6bb2a4-2ba8-4d52-97ca-d6705ff84ea4.png" width=25px> **Antoine Mineau** _alias_ [@AntoineMineau](https://github.com/AntoineMineau) 

