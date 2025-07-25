BDD Creator - Gestion Simplifiée des Bases de Données

📌 Présentation

BDD Creator est une application web permettant de créer, gérer et manipuler des bases de données de manière intuitive. 
Conçu pour les développeurs et administrateurs, cet outil simplifie la gestion des tables, colonnes et entrées via une interface web en React et une API REST en PHP.

🛠️ Fonctionnalités

✅ Création, modification et suppression de bases de données 📂
✅ Ajout et gestion des tables et colonnes 🏗️
✅ Manipulation des données : insertions, mises à jour et suppressions 🔄
✅ Exportation et importation de bases de données 📥📤
✅ Authentification sécurisée avec JWT 🔑 (à venir)
✅ Protection contre les injections SQL 🛡️ (en cours d'amélioration)

🚀 Installation et Configuration

1️⃣ Prérequis

  Docker & Docker Compose
  Node.js v18+ (pour le frontend)
  PHP 8.3 avec PDO MySQL
  MySQL 5.7+

2️⃣ Cloner le projet

  git clone https://github.com/clement-machtelinckx/BDD_Depresion/

  cd BDD-Depresion
➡️ L'API sera accessible sur http://localhost:80
➡️ Le frontend React sur http://localhost:3000


4️⃣ Configuration de l’API

Modifie BDD_Creator/src/conf.php 
pour définir les paramètres de connexion à la base de données :

$host = "mysql";
$dbname = "nom_de_ta_bdd";
$username = "root";
$password = "root";

🔐 Sécurité

🔴 Avant corrections : l’API était vulnérable aux injections SQL.🟢 Après corrections (en cours) :

Utilisation de requêtes préparées ✅

Vérification des entrées utilisateur 🛑

Authentification avec JWT (à venir) 🔑

🛠️ Améliorations à venir



📜 Licence

Ce projet est sous licence MIT. Utilisation libre et open-source !

📬 Contact & Feedback
N’hésite pas à proposer des améliorations via issues & pull requests sur GitHub. 🙌

Merci!
