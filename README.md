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

## Démo en ligne

Une version de démonstration de l'application est disponible à l'adresse suivante :

**[biblios-demo](https://saffane.alwaysdata.net/biblios/)**

⚠️ **Environnement de démonstration** : les données peuvent être réinitialisées périodiquement. Merci de ne pas soumettre d'informations personnelles réelles.

### Comptes de démonstration

| Rôle | Email | Mot de passe |
|------|-------|--------------|
| Administrateur | `admin@email.com` | `admin1234!` |
| Utilisateur | `user@email.com` | `abcd1234!` |

## Prérequis

- PHP 8.3 ou supérieur
- Composer
- PostgreSQL 14 ou supérieur
- Symfony CLI (recommandé)

## Installation

1. Cloner le dépôt :
```bash
git clone https://github.com/AffaneSafouane/biblios.git
cd biblios
```

2. Installer les dépendances :
```bash
composer install
```

3. Configurer la base de données :
```bash
# Éditer le fichier .env, ou créer un fichier .env.local, et configurer DATABASE_URL
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
  - Mot de passe : `Admin1234!`
  
- **Utilisateur** :
  - Email : `user@email.com`
  - Mot de passe : `Abcd1234!`

## Structure du projet
```
biblios_v1/
├── config/                  # Configuration Symfony (routes, services, packages)
├── migrations/              # Migrations Doctrine
├── public/                  # Point d'entrée web (index.php, assets)
├── src/
│   ├── Controller/          # Contrôleurs Symfony
│   ├── DataFixtures/        # Données de test
│   ├── Entity/              # Entités Doctrine (modèles)
│   ├── Enum/                # Énumérations PHP
│   ├── EventListener/       # Écouteurs d'événements Symfony
│   ├── Factory/             # Factories (génération de fixtures)
│   ├── Form/                # Formulaires Symfony
│   ├── Repository/          # Repositories Doctrine
│   └── Security/            # Voters, authenticators et configuration de sécurité
├── templates/           # Templates Twig
│   ├── base.html.twig
│   ├── maintenance.html.twig
│   ├── user/
│   ├── security/
│   ├── pagerfanta/
│   ├── main/
│   ├── emails/
│   ├── contact/
│   ├── comment/
│   ├── book/
│   └── admin/
├── tests/                   # Tests unitaires et fonctionnels
├── .env                     # Variables d'environnement
├── composer.json
├── symfony.lock
└── README.md
```

## Auteur

AFFANE Safouane - [safoueneaffane@gmail.com](mailto:safoueneaffane@gmail.com)

## Support

Pour toute question ou problème, veuillez ouvrir une issue sur GitHub.