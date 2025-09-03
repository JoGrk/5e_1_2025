-- - Zapytanie 1: wybierające jedynie pola imie, telefon, szczepienie, opis z tabeli Zwierzeta
SELECT imie, telefon, szczepienie, opis
FROM Zwierzeta;
-- - Zapytanie 2: wybierające jedynie pola id, imie, wlasciciel z tabeli Zwierzeta dla tych rekordów, dla których rodzaj to pies
SELECT id, imie, wlasciciel
FROM Zwierzeta
WHERE rodzaj = 1;
-- - Zapytanie 3: korzystające z relacji i wybierające jedynie pola imie z tabeli Zwierzeta oraz odpowiadające im pola nazwa z tabeli Uslugi
SELECT imie, nazwa
FROM Zwierzeta
    JOIN Uslugi ON Uslugi.id = Zwierzeta.usluga_id;
-- - Zapytanie 4: zwracające średnią cenę wszystkich usług zapisanych 
SELECT AVG(cena)
FROM Uslugi;

