# **Projet : EatSmart**

**Etudiants :** Doriann Bachelet

---

### **1. Description du projet**

Ce projet est un site qui permet aux clients de pouvoir passer des commandes qui seront reçus par des restaurateur

<img src="./assets/img/Schema Architecture Eatsmart.png">
<img src="./assets/img/MDP.PNG">
<img src="./assets/img/eatSmart-MLD.PNG">


---

### **3. Fonctionnalités principales**

#### **3.1 Frontend (eatSmartFront)**

- **Fonctionnalité 1 :**  
  Afficher le menu
  
- **Fonctionnalité 2 :**  
  Enoyer la commande au Resteaurateur 
  
#### **3.2 Backend (eatSmartBack)**

- **Fonctionnalité 1 :**  
  Recevoir les commandes des clients
  
- **Fonctionnalité 2 :**  
  Avoir un hisotrique des commandes

## Endpoints de l'API

Adresse de l'API (en local) : http://localhost/____

Voici les différents endpoints de l'API : 
- `GET /articles` → Afficher la liste des articles
- `GET /articles/{id}` → Afficher l'article avec l'id égal à {id}
- `GET /categories` → Afficher la liste des catégories
- `GET/categories/{id}` → Afficher la catégorie avec l'id égal à {id}
- `GET/commandes` → Afficher la liste des commandes
- `GET/commandes/{id}` → Afficher la commande avec l'id égal à {id}
- `GET /categories/{id}/articles` → Affiche les articles appartenant a la categorie avec l'id égal à {id}
- `GET /articles/{id}/commandes` → Affiche les commandes posedant l'article avec l'id égal à {id}
- `GET /commandes/{id}/articles`  → Affiche les article appartenant a la commande avec l'id égal à {id}
### **4. Technologies utilisées**

- **Frontend :** PHP
- **Backend :** HTML CSS
- **Base de données :** MySQL

---
