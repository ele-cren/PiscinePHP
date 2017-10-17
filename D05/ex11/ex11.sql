SELECT upper(fiche_personne.nom) AS 'NOM', prenom, prix FROM abonnement
  INNER JOIN membre ON membre.id_abo = abonnement.id_abo
  INNER JOIN fiche_personne ON fiche_personne.id_perso = membre.id_fiche_perso
  WHERE abonnement.prix > 42 ORDER BY NOM, fiche_personne.prenom;
