# 📢 MyNews - Module Dolibarr

**MyNews** est un module pour [Dolibarr ERP/CRM](https://www.dolibarr.org) qui ajoute un onglet **"Actualités"** sur la fiche des tiers (clients, prospects, fournisseurs).  
Il permet d’afficher dynamiquement les actualités en lien avec le nom du tiers via un flux RSS (par défaut : Google News).

---

## 📦 Fonctionnalités

- Ajout d’un onglet **Actualités** dans la fiche des tiers
- Récupération dynamique du **nom du tiers**
- Construction automatique d’un flux RSS basé sur ce nom
- Affichage du flux sous forme de **liste stylée Dolibarr**
- Aucun stockage local requis (lecture directe du RSS)

---

## 🧩 Installation

1. Copier le dossier `mynews` dans le répertoire `/custom/` de votre instance Dolibarr.
2. Allez dans **Accueil > Configuration > Modules**.
3. Activez le module **MyNews**.
4. Rendez-vous sur la fiche d’un tiers : un nouvel onglet **Actualités** est disponible.

---

## 🛠 Dépendances

- Dolibarr >= 13.0 (fonctionne aussi avec les versions ultérieures)
- Accès Internet pour charger le flux RSS

---

## 📁 Structure du module

/custom/mynews │ ├── core/ │ └── modules/ │ └── modMynews.class.php → Déclaration du module │ ├── langs/ │ └── fr_FR/ │ └── mynews.lang → Fichier de langue │ ├── tpl/ │ └── news.tpl.php → Template HTML du flux RSS │ ├── news.php → Fichier principal de l’onglet ├── README.md → Ce fichier

--

## 💡 Améliorations futures

- Possibilité de choisir une autre source RSS
- Ajout de préférences utilisateur
- Mise en cache du flux pour de meilleures performances

---

## 📃 Licence

Ce module est distribué sous la licence **GPL v3**.

---

## 👨‍💻 Auteur

Développé par **[Antoine GASPAR / Société Next Emballage]**  
Pour toute question ou suggestion : [antoine.gaspar@societe-petit.fr]