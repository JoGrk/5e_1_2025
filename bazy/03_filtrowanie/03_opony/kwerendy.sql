--  Zapytanie 1: wybierające pierwsze 10 rekordów z najtańszymi oponami (wszystkie pola)
SELECT *
FROM opony
ORDER BY cena  
LIMIT 10;


-- − Zapytanie 2: wybierające jedynie producenta, model, sezon i cenę opony o numerze katalogowym 9
SELECT producent, model, sezon, cena
FROM opony
WHERE nr_kat =9;

-- − Zapytanie 3: wybierające jedynie identyfikator zamówienia i ilość oraz odpowiadające im model i cenę opony. Wybierany jest tylko jeden losowy rekord. Należy zastosować relację
SELECT id, ilosc, model, cena
FROM zamowienie
JOIN opony ON opony.nr_kat = zamowienie.nr_kat
ORDER BY RAND()
LIMIT 1;

-- − Zapytanie 4: aktualizujące cenę opon letnich obniżając ją o 25%
UPDATE opony
SET cena = ROUND(cena*0.75, 2)
WHERE sezon = 'letnia';

--  − Zapytanie 5: Dodające do bazy nowego klienta, Adama Nowak, wartość id nadawana automatycznie.
INSERT INTO klient
(imie, nazwisko)
VALUES
('Adam','Nowak');
