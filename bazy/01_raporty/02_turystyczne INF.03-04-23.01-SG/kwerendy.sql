-- – Zapytanie 1: wybierające jedynie pola id, dataWyjazdu, cel i cena z tabeli wycieczki dla dostępnych wycieczek
SELECT id, dataWyjazdu, cel, cena
FROM wycieczki
WHERE dostepna = 1;
-- – Zapytanie 2: wybierające jedynie pola nazwaPliku i podpis z tabeli zdjecia, sortując je malejąco według kolumny podpis 
SELECT nazwaPliku, podpis
FROM zdjecia
ORDER BY podpis DESC;
-- – Zapytanie 3: wybierające jedynie cel i cenę wycieczki z tabeli wycieczki oraz odpowiadający im podpis z tabeli zdjecia dla wycieczek, których cena jest wyższa niż 1200 zł. Zapytanie wykorzystuje relację
SELECT cel, cena, zdjecia.podpis
FROM wycieczki
JOIN zdjecia ON zdjecia.id = wycieczki.zdjecia_id
WHERE cena > 1200;
-- -- – Zapytanie 4: dodające do tabeli wycieczki pole liczbaDni przyjmujące tylko liczby naturalne, pole powinno być wstawione po polu dataWyjazdu

ALTER TABLE wycieczki
ADD liczbaDni INT UNSIGNED 
AFTER dataWyjazdu;