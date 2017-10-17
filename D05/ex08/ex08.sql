SELECT nom, prenom, convert(date_naissance, DATE) AS 'date de naissance' FROM fiche_personne WHERE year(date_naissance) = 1989 ORDER BY nom;
