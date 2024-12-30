Ce projet organise les pages en deux sections principales : Admin (gestion des places, véhicules et statuts via des pages comme gestion_places.php) et User (réservation, sortie de véhicules via reserver_place.php, etc.). Les fichiers communs incluent la connexion à la base (db_connect.php), les styles (index.css, user.css) et les éléments partagés (header.php, footer.php). 
Dossier admin
admin.css

Feuille de style pour les pages de l'administrateur, définissant leur apparence.
gestion_places.php

Page permettant à l'administrateur de gérer les places de stationnement (ajouter, modifier, supprimer, ou changer leur statut).
gestion_vehicules.php

Interface pour gérer les véhicules dans le parking (ajout, modification, suppression).
modifier_vehicule.php

Page permettant de modifier les informations d’un véhicule existant.
place.html

Page statique ou dynamique affichant des informations spécifiques sur une place (détails ou visualisation).
supprimer.js

Script JavaScript pour gérer les suppressions (par exemple, confirmation avant suppression).
Dossier images
Contient les images utilisées dans le projet :
affiche_place.jpg : Illustration pour les places.
ajouter_vehicule.jpg : Image associée à l’ajout de véhicules.
index.jpg : Image pour la page d’accueil.
login.jpg : Image pour la page de connexion.
sortie choix2.jpg et sortie.jpg : Illustrations pour les pages de sortie de véhicules.
Dossier user
afficher_places.php

Permet aux utilisateurs de visualiser les places disponibles et leurs statuts.
confirmer_reservation.php

Page pour confirmer une réservation effectuée par l’utilisateur.
confirmer_sortie.php

Page pour confirmer la sortie d’un véhicule.
reserver_place.php

Permet aux utilisateurs de réserver une place de stationnement.
sortir_vehicule.php

Gère la sortie des véhicules par les utilisateurs (met à jour le statut de la place).
user.css

Feuille de style dédiée aux pages utilisateur.
validation.js

Script JavaScript pour valider les formulaires (par exemple, champs obligatoires).
Pages communes
ajouter_vehicule.js

Script JavaScript pour gérer l’ajout de véhicules (validation ou interactions dynamiques).
ajouter_vehicule.php

Page pour ajouter un véhicule dans le système (commune aux utilisateurs et administrateurs).
confirmer_ajout.php

Confirme l’ajout d’un véhicule ou d’une autre action similaire.
db_connect.php

Script de connexion à la base de données.
exemple.js

Exemple de script JavaScript pour des tests ou des fonctionnalités spécifiques.
FAQ.html

Page contenant les réponses aux questions fréquemment posées.
footer.php

Pied de page inclus sur toutes les pages du site.
header.php

En-tête inclus sur toutes les pages du site, contenant souvent la navigation.
historique_stationnement.php

Affiche l’historique des stationnements (pour un utilisateur ou un administrateur).
index.css

Feuille de style pour la page d’accueil.
index.php

Page d’accueil du site.
login.php

Page de connexion pour les utilisateurs et administrateurs.
logout.php

Script pour déconnecter un utilisateur ou un administrateur.
register.php

Page d’inscription pour les nouveaux utilisateurs. 
