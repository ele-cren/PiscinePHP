SELECT genre.id_genre, genre.nom AS `nom genre`, distrib.id_distrib, distrib.nom AS `nom distrib`,
film.titre AS `titre film` FROM
film RIGHT JOIN genre ON film.id_genre = genre.id_genre
LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
WHERE genre.id_genre BETWEEN 4 AND 8;
