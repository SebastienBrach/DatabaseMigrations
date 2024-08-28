# DatabaseMigrations
Ce repository contient des scripts et des configurations pour gérer les migrations de bases de données en utilisant la librairie Phinx. Il permet de versionner et d’appliquer des modifications de schéma de base de données de manière contrôlée et reproductible.

## Prérequis
- PHP (>=7.4)
- Composer

## Doc migrations
```https://book.cakephp.org/phinx/0/en/migrations.html```
## Installation
- ```composer install ```
- configurer le fichier ```phinx.php``` pour qu'il communique correctement avec votre BD
- ⬇️ utiliser les commandes ci-dessous ⬇️

## Liste des commandes de migrations
- ```php commands.php createMigration NomMigration``` => permet de créer une migration dans le dossier indiqué dans phinx.php
- ```php commands.php runMigration``` || ```php commands.php runMigration dateMigration``` => permet d'exécuter les nouvelles migrations || migration spécifique, non présentent dans la table ```migrations```
- ```php commands.php addBreakpoint```  ```php commands.php addBreakpoint dateMigration``` => permet d'ajouter un breakpoint à la DERNIÈRE migration || migration spécifique. Cela permet de sécuriser la dernière migration en la 'verrouillant' lors d'un rollback
- ```php commands.php removeBreakpoint```  ```php commands.php removeBreakpoint dateMigration``` => permet de supprimer un breakpoint à la DERNIÈRE migration || migration spécifique. La commande de rollback pourra être exécuté par la suite
- ```php commands.php runRollback``` || ```php commands.php runRollback dateMigration``` => permet d'annuler la DERNIÈRE migration || migration spécifique. ⚠️ PERTE DE DATA ⚠️

## Liste des commandes de seeds (<=> fixture sur Symfony ==> data de test)
- ```php commands.php createSeed NomMigration``` => permet de créer un seeder dans le dossier indiqué dans phinx.php
- ```php commands.php runSeed``` || ```php commands.php runSeedTarget n=NomMigration```=> permet de lancer TOUT les seeders || seeder spécifique


## Liste des étapes à faire quand on doit mettre à jour la BD
- Vérifier si la config de la BD est OK
- Faire la commande ```php commands.php script/updateDatabase```
