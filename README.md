# Biblios - Application de Gestion

Application web de gestion de bibliothèque développée avec Symfony 7, offrant une interface moderne et responsive pour la consultation et l'administration d'un catalogue d'ouvrages.

## Fonctionnalités

- **Catalogue en ligne** : consultation intuitive des ouvrages disponibles
- **Administration complète** : gestion des livres, auteurs, catégories et emprunts
- **Système de permissions** : contrôle d'accès basé sur les rôles (administrateur/utilisateur)
- **Interface responsive** : accessible sur tous les appareils (desktop, tablette, mobile)

## Technologies utilisées

- **Backend** : Symfony 7 (PHP)
- **Base de données** : PostgreSQL
- **Frontend** : Twig (moteur de templates) + Bootstrap 5
- **Sécurité** : Symfony Security Component (authentification et autorisation)

## Prérequis

- PHP 8.3 ou supérieur
- Composer
- PostgreSQL 14 ou supérieur
- Symfony CLI (recommandé)

## Installation

1. Cloner le dépôt :
```bash
git clone https://github.com/AffaneSafouane/biblios_v1.git
cd biblios_v1
```

2. Installer les dépendances :
```bash
composer install
```

3. Configurer la base de données :
```bash
# Éditer le fichier .env et configurer DATABASE_URL
DATABASE_URL="postgresql://user:password@127.0.0.1:5432/bibliotheque?serverVersion=14&charset=utf8"
```

4. Créer la base de données et exécuter les migrations :
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

5. (Optionnel) Charger les données de test :
```bash
php bin/console doctrine:fixtures:load
```

6. Lancer le serveur de développement :
```bash
symfony serve
```

L'application sera accessible à l'adresse : `http://localhost:8000`

## Utilisation

### Rôles et permissions

- **Utilisateur** : consultation du catalogue, recherche d'ouvrages, commentaire
- **Administrateur** : toutes les fonctionnalités utilisateur + gestion complète (CRUD) des ouvrages, auteurs et catégories, ainsi que les commentaires

### Comptes par défaut (fixtures)

- **Administrateur** : 
  - Email : `admin@email.com`
  - Mot de passe : `admin1234!`
  
- **Utilisateur** :
  - Email : `user@email.com`
  - Mot de passe : `abcd1234!`

## Structure du projet
```
src/
├── Controller/      # Contrôleurs Symfony
├── DataFixtures/
├── Entity/          # Entités Doctrine (modèles)
├── Enum/
├── EventListener/
├── Factory/
├── Form/            # Formulaires
├── Repository/      # Repositories Doctrine
└── Security/        # Configuration de sécurité

templates/           # Templates Twig
├── base.html.twig
├── maintenance.html.twig
├── user/
├── security/
├── pagerfanta/
├── main/
├── emails/
├── contact/
├── comment/
├── book/
└── admin/

public/              # Assets publics (CSS, JS, images)
```

## Auteur

AFFANE Safouane - [safoueneaffane@gmail.com](mailto:safoueneaffane@gmail.com)

## Support

Pour toute question ou problème, veuillez ouvrir une issue sur GitHub.