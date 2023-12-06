# R3.01_PROJET
On souhaite proposer un site web de vente de CD (oui, oui, ça existe encore !) en ligne.
Chaque CD possède un genre, titre, auteur/groupe, prix et une image de la pochette.

1/ Proposer un site qui affiche l’ensemble des CD (vignette de la pochette, titre, auteur/groupe). Lors
de la sélection d’un titre on verra la pochette en taille réelle ainsi que l’ensemble des informations
relatives au CD.
        
2/ Proposer la fonctionnalité de sélection et de mise en panier. On simulera le paiement en vérifiant
la saisie des 16 chiffres et vérifiant que le dernier est identique au premier, et que la date de validité
est supérieure à la date du jour + 3 mois.
Remarque : afin de minimiser les temps de transferts, les vignettes seront de réelles vignettes
(images générées en format réduit) et non pas les images redimensionnées avec WIDTH/HEIGHT
d’IMG SRC.

3/ Proposer un accès sécurisé avec un back-office permettant l’ajout/suppression de CDs.

NB : Les CD pourront au choix être enregistrés sur une BD (larkartxela) ou dans un fichier XML.