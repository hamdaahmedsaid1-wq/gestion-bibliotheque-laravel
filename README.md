# 📚 Gestion de bibliothèque

Application web de gestion de bibliothèque développée avec **Laravel**.

Ce projet permet de gérer les livres, les emprunteurs et les emprunts à travers une interface web simple et intuitive. Il a été réalisé afin de mettre en pratique mes compétences en développement web, programmation backend, bases de données et utilisation du framework Laravel.

---

## 🎯 Objectif du projet

L'objectif est de proposer une application permettant de centraliser les principales opérations nécessaires à la gestion d'une bibliothèque :

- gestion des livres ;
- gestion des emprunteurs ;
- suivi des emprunts ;
- suivi des retours ;
- consultation des statistiques depuis un tableau de bord.

---

## ✨ Fonctionnalités

### 📖 Gestion des livres

- Ajouter un livre
- Modifier un livre
- Supprimer un livre
- Afficher la liste des livres
- Rechercher un livre par titre, auteur ou catégorie
- Gérer les quantités disponibles

### 👤 Gestion des emprunteurs

- Ajouter un emprunteur
- Modifier ses informations
- Supprimer un emprunteur
- Afficher la liste des emprunteurs
- Rechercher par nom, prénom ou téléphone

### 🔄 Gestion des emprunts

- Enregistrer un nouvel emprunt
- Associer un livre à un emprunteur
- Enregistrer la date d'emprunt
- Gérer la date de retour prévue
- Suivre le statut d'un emprunt
- Enregistrer le retour d'un livre

### 📊 Tableau de bord

Le tableau de bord permet de consulter rapidement :

- le nombre total de livres ;
- la quantité totale disponible ;
- le nombre d'emprunteurs ;
- les emprunts en cours ;
- les livres retournés ;
- les statistiques des emprunts.

### 🔐 Authentification

L'application dispose d'un système d'authentification permettant de sécuriser l'accès aux fonctionnalités de gestion.

---

## 🛠️ Technologies utilisées

- **PHP**
- **Laravel**
- **Blade**
- **HTML**
- **CSS**
- **JavaScript**
- **Base de données relationnelle**
- **Git**
- **GitHub**

---

## 📸 Captures d'écran

### Tableau de bord

![Tableau de bord](screenshots/dashboard.png)

Le tableau de bord présente les principales statistiques de la bibliothèque.

### Gestion des livres

![Gestion des livres](screenshots/livres.png)

Cette interface permet d'afficher, rechercher, ajouter, modifier et supprimer les livres.

### Gestion des emprunteurs

![Gestion des emprunteurs](screenshots/emprunteurs.png)

Cette interface permet de gérer les personnes enregistrées comme emprunteurs.

### Gestion des emprunts

![Gestion des emprunts](screenshots/emprunts.png)

Cette interface permet de suivre les livres empruntés, les emprunteurs, les dates de retour prévues et le statut des emprunts.

---

## ⚙️ Installation

### 1. Cloner le projet

```bash
git clone https://github.com/hamdaahmedsaid1-wq/gestion-bibliotheque-laravel.git
```

### 2. Accéder au dossier du projet

```bash
cd gestion-bibliotheque-laravel
```

### 3. Installer les dépendances PHP

```bash
composer install
```

### 4. Créer le fichier d'environnement

Sous Windows :

```bash
copy .env.example .env
```

### 5. Générer la clé de l'application

```bash
php artisan key:generate
```

### 6. Configurer la base de données

Configurer les paramètres de connexion à la base de données dans le fichier `.env`.

Ne jamais publier le fichier `.env` sur GitHub.

### 7. Exécuter les migrations

```bash
php artisan migrate
```

### 8. Installer les dépendances front-end

```bash
npm install
```

### 9. Compiler les ressources front-end

```bash
npm run dev
```

### 10. Lancer l'application

```bash
php artisan serve
```

Laravel indiquera ensuite l'adresse locale de l'application, généralement :

```text
http://127.0.0.1:8000
```

---

## 📂 Architecture du projet

L'application suit l'architecture **MVC (Model - View - Controller)** de Laravel.

- **Models** : gestion et représentation des données
- **Views** : interfaces utilisateur avec Blade
- **Controllers** : logique de l'application
- **Routes** : gestion des différentes URL de l'application
- **Migrations** : création et évolution de la structure de la base de données

---

## 🎓 Compétences mises en pratique

Ce projet m'a permis de mettre en pratique :

- le développement web avec Laravel ;
- la programmation PHP ;
- l'architecture MVC ;
- les opérations CRUD ;
- la gestion d'une base de données relationnelle ;
- la création de routes et de contrôleurs ;
- l'authentification des utilisateurs ;
- la conception d'interfaces web ;
- l'utilisation de Git et GitHub.

---

## 👩‍💻 Auteure

**Hamda Ahmed Said**

Étudiante en Licence Informatique à l'Université de Djibouti.

GitHub : [hamdaahmedsaid1-wq](https://github.com/hamdaahmedsaid1-wq)

LinkedIn : [Hamda Ahmed Said](https://www.linkedin.com/in/hamda-ahmed-said-b70240347)

---

## 📄 Licence

Ce projet est distribué sous licence MIT.
