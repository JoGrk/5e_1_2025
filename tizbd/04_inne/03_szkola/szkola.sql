-- . Z poziomu wiersza poleceń utwórz tabelę uczniowie  (tabela ma pasować do pliku o tej nazwie)

CREATE DATABASE 5E_1_Szkola_2;

CREATE table uczniowie(
    idUcznia INT,
    nazwisko varchar(50),
    imie varchar(50),
    ulica varchar(50),
    dom INT,
    IDklasy char(2)
);
-- 2. Z poziomu wiersza poleceń zaimportuj dane do tabeli uczniowie
LOAD DATA LOCAL INFILE 'C:\\xampp\\htdocs\\5e_1\\tizbd\\04_inne\\03_szkola\\uczniowie.txt'
INTO TABLE uczniowie
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n'
IGNORE 1 LINES;

-- 3.  zaimportuj tabelę oceny oraz przedmioty  z poziomu phpMyAdmin 

-- 4. Sprawdź strukturę zaimportowanych tabel. Jeśli trzeba, popraw typy danych.

-- 5. Z poziomu wiersza poleceń

-- dodaj do tabeli oceny pole idOceny,
ALTER TABLE oceny
ADD idOceny INT;
-- określi klucz podstawowy na tym polu, pole typu całkowitego, autonumerowane.
ALTER TABLE oceny
MODIFY idOceny INT PRIMARY KEY AUTO_INCREMENT;
-- dodai do tabeli przedmioty indeks na polu nazwaPrzedmiotu
CREATE INDEX indx_nazwaPrzedmiotu ON przedmioty(nazwaPrzedmiotu);
-- 6.  Z poziomu phpMyAdmin wyeksportuj do pliku uczniowie.csv imiona i nazwiska uczniów z wszystkich klas pierwszych posortowane rosnąco według klas, następnie według nazwisk. Dane oddziel znakiem tabulatora, pierwszy wiersz powinien zawierać nazwy pól.

-- 7. Utwórz widok OcenyUczniowie z polami idUcznia, imie, nazwisko, idKlasy, ocena

-- 8. Korzystając z widoku wyświetl nazwisko, imię, klasę oraz średnią ocen osoby, która osiągnęła najwyższą średnią ocen w całej szkole

-- 9. Utwórz widok przedmiotySrednie obliczający średnią ocenę dla każdego idPrzedmiotu

-- 10. Korzystając z widoku przedmiotySrednie i tabeli przedmioty wyświetl nazwy dwóch przedmiotów, które mają najwyższe średnie

-- -------------------------------------------------------

 

-- a)
-- Poza rejonem szkoły leżą ulice Worcella oraz Sportowa. Podaj, ilu uczniów mieszka poza
-- rejonem szkoły (czyli na jednej z tych dwóch ulic).
-- b)
-- Wypisz wszystkie oceny ucznia Jana Augustyniaka z języka polskiego.
-- c)
-- Oblicz, ile dziewcząt i ilu chłopców jest w poszczególnych klasach. Wynik przedstaw
-- w postaci zestawienia: idKlasy, liczba dziewcząt, liczba chłopców. Załóż, że imiona
-- dziewcząt (i tylko dziewcząt) kończą się na literę a.
-- d)
-- Utwórz zestawienie dla klasy 2a zawierające nazwy przedmiotów i średnie ocen klasy
-- z tych przedmiotów (średnie podaj z zaokrągleniem do dwóch miejsc po przecinku)
-- Zestawienie posortuj nierosnąco według średnich ocen.
-- e)
-- Utwórz zestawienie uporządkowane alfabetycznie według nazwisk zawierające wykaz
-- osób z klasy 2c, które w kwietniu 2009 roku otrzymały oceny niedostateczne (imię,
-- nazwisko, przedmiot).
-- f)
-- Podaj nazwisko, imię, klasę oraz średnią ocen osoby, która osiągnęła najwyższą średnią
-- ocen w całej szkole (jest tylko jedna taka osoba).