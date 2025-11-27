-- 1. napisz skrypt  tworzący bazę danych vod oraz tabelę klienci , ale tylko wtedy, gdy baza i tabela nie istnieją, określ klucz podstawowy  (tabela ma pasować do pliku o tej nazwie)

DROP DATABASE IF EXISTS 5e_1_vods;
CREATE DATABASE 5e_1_vods;
CREATE TABLE IF NOT EXISTS klienci(
    pesel char(11) PRIMARY KEY,
    imie varchar(420),
    nazwisko varchar(696)
);

-- 2. Wykonaj skrypt z poziomu wiersza poleceń metodą przekierowania (skrypt wykonaj do dowolnej bazy danych)

-- 3. Z poziomu wiersza poleceń zaimportuj dane do tabeli klienci
load data local infile 'C:\\xampp\\htdocs\\5e_1\\tizbd\\04_inne\\klienci.txt'
into table klienci
fields terminated by '\t'
lines terminated by '\n'
ignore 1 lines;
-- 4.  zaimportuj tabele filmy i wypozyczenia z poziomu phpMyAdmin  o

-- 5. utwórz skrypt, który doda do tabeli wypozyczenia i filmy indeks (na polu tytul i na polu data wypożyczenia - osobne dwa indeksy). Wykonaj skrypt. 

-- 6.  Wyeksportuj z tabeli filmy tytul, kraj_produkcji i gatunek do pliku filmy.csv, dane oddziel średnikiem. 

-- 7. Utwórz widok FilmyWypozyczenia   z polami id_filmu , tytul, kraj_produkcji, data_wypoz

CREATE VIEW FilmyWypozyczenia AS
SELECT filmy.id_filmu, tytul, kraj_produkcji, data_wyp
FROM filmy
JOIN wypozyczenia ON wypozyczenia.id_filmu = filmy.id_filmu;

-- 8. Korzystając z widoku i tabeli wypozyczenia wyświetl  tytuły filmów, które nie zostały wypożyczone ani razu przez klientów usługi VOD na etapie testowania.
SELECT tytul 
FROM filmy 
WHERE id_filmu NOT IN (SELECT DISTINCT id_filmu
FROM FilmyWypozyczenia);

SELECT DISTINCT id_filmu
FROM FilmyWypozyczenia;

-- 9. Usuń indeks z tabeli wypozyczenia.

-- 10. Utwórz widok IloscWypozyczen obliczające ile razy film o danym ID był wypożyczany

-- 11. Korzystając z widoku IloscWypozyczen wyświetl tytuły pięciu najczęściej wypożyczanych filmów