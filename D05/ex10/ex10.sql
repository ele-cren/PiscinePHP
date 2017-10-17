SELECT titre AS 'Titre', resum AS 'Resume', annee_prod FROM film
INNER JOIN genre on film.id_genre = genre.id_genre WHERE genre.id_genre = 25 ORDER BY film.annee_prod DESC;
