create database 5e_1_sklepkomputerowy
-- Producenci
--  kod całkowity, klucz podstawowy, autoinkrementacja
-- nazwa  tekst, pole nie może być puste
CREATE TABLE producenci(
    kod INT PRIMARY KEY AUTO_INCREMENT,
    nazwa VARCHAR(999) NOT NULL
);

-- Produkty
-- kod całkowite, klucz podstawowy,  autoinkrementacja
-- nazwa tekst, pole nie może puste
-- cena dwa miejsca po przecinku, przed przecinkiem 5 cyfr
-- producent całkowite, klucz obcy odwołujący się do pola kod w tabeli producenci
 CREATE TABLE Produkty(
    kod INT PRIMARY KEY AUTO_INCREMENT,
    nazwa varchar(999) NOT NULL,
    cena dec(7,2),
    producent INT,
    CONSTRAINT fk_producent FOREIGN KEY(producent) 
    REFERENCES producenci(kod)

 );

 

 

-- przykład

-- ............

-- CONSTRAINT nazwa_więzów_integralności_dla_klucza_obcego 
-- FOREIGN KEY (pole_klucza_obcego_w_tworzonej_tabeli)
-- REFERENCES tabela_do_której_się_odwołujemy(pole_klucza_podstawowego_w_tej_tabeli)

-- ................
INSERT INTO Producenci(Kod, Nazwa) VALUES(1,'Sony');

 INSERT INTO Producenci(Kod, Nazwa) VALUES(2,'Creative Labs');

 INSERT INTO Producenci(Kod, Nazwa) VALUES(3,'Hewlett-Packard');

 INSERT INTO Producenci(Kod, Nazwa) VALUES(4,'Iomega');

 INSERT INTO Producenci(Kod, Nazwa) VALUES(5,'Fujitsu');

 INSERT INTO Producenci(Kod, Nazwa) VALUES(6,'Winchester');

 INSERT INTO Produkty(kod, nazwa, cena, producent) VALUES(1,'Hard drive',240,5);

 INSERT INTO Produkty(kod, nazwa, cena, producent) VALUES(2,'Memory',120,6);

 INSERT INTO Produkty(kod, nazwa,cena,  producent) VALUES(3,'ZIP drive',150,4);

 INSERT INTO Produkty(kod, nazwa, cena, producent) VALUES(4,'Floppy disk',5,6);

 INSERT INTO Produkty(kod, nazwa, cena, producent) VALUES(5,'Monitor',240,1);

 INSERT INTO Produkty(kod, nazwa,cena,  producent) VALUES(6,'DVD drive',180,2);

 INSERT INTO Produkty(kod, nazwa,cena,  producent) VALUES(7,'CD drive',90,2);

 INSERT INTO Produkty(kod, nazwa,cena,  producent) VALUES(8,'Printer',270,3);

 INSERT INTO Produkty(kod, nazwa, cena, producent) VALUES(9,'Toner cartridge',66,3);

 INSERT INTO Produkty(kod, nazwa,cena,  producent) VALUES(10,'DVD burner',180,2);

 

 

 

 

-- 1. Wyświetl nazwy wszystkich produktów|

-- 2. Wyświetl nazwy i ceny wszystkich produktów w sklepie 

-- 3. Wyświetl nazwy produktów o cenie mniejszej lub równiej  $200.
SELECT nazwa
FROM produkty
WHERE cena <= 200;
-- 4. Wyświetl wszystkie produkty o cenie pomiędzy $60 i $120.
SELECT nazwa
FROM produkty
WHERE cena BETWEEN 60 AND 120; 
-- 5. Wyświetl nazwy produktów i ceny w centach (tzn. pomnóż ceny przez 100) 

SELECT nazwa, cena*100
FROM produkty;

-- 6. Wyświetl średnią cenę wszystkich produktów 
SELECT AVG(cena)
FROM produkty;
-- 7. Wyświetl średną ceną wszystkich produktów producenta o kodzie 2 
SELECT AVG(cena)
FROM produkty
    WHERE producent=2;
 

-- 8. Ile jest produktów o cenie większej lub równiej $180.
SELECT COUNT(*)
FROM Produkty
WHERE cena >= 180;

-- 9. Wyświetl nazwy i ceny wszystkich produktów o cenie większej lub równej  $180, i posortuj je najpierw według ceny (rosnąco), a następnie według nazwy (malejąco) 

SELECT nazwa ,cena
FROM produkty
WHERE cena>=180
ORDER BY cena , nazwa DESC;

-- 10. Wyświetl wszystkie dane z z tabeli produkty oraz wszystkie dane z tabeli producenci 
SELECT *
FROM produkty
JOIN producenci ON producenci.kod = produkty.producent;
-- 11. Wyświetl nazwę produktu, cenę i nazwę producenta dla wszystkich produktów 
SELECT produkty.nazwa, cena, producenci.nazwa
FROM produkty
JOIN producenci ON producenci.kod = produkty.producent; 

-- 12. Wyświetl średnią cenę produktów każdego producenta, pokazując tylko kod producenta

-- 13. Wyświetl średnią cenę produktów każdego producenta, pokazując nazwę producenta 

-- 14. Wyświetl nazwę każdego producenta, którego produkty mają średnią cenę większą lub równą $150

-- 15. Wyświetl nazwę i cenę najtańszego produktu  (LIMIT lub podzapytanie)

-- 16.Wyświetl nazwę każdego producenta razem z nazwą i ceną jego najdroższego produktu 

-- 17. Dodaj nowy produkt:  Loudspeakers, $70, producent 2.

-- 18. Zmień nazwę produktu o kodzie 8 na "Laser Printer".

-- 19. Wykonaj 10% przecenę każdego produktu 

-- 20. Wykonaj 10% przecenę każdego produktu o cenie większej lub równiej $120.