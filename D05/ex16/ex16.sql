SELECT COUNT(*) FROM historique_membre
WHERE (CONVERT(date, DATE) >= '2006-10-30' AND CONVERT(date, DATE) <= '2007-07-27')
OR (MONTH(date) = 12 AND DAY(date) = 24);
