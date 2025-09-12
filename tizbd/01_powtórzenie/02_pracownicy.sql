CREATE database 5e_1_pracownicy;
-- Utwórz tabelę Dzialy z polami:
-- kod całkowite, klucz podstawowy 
-- nazwa typ tekstowy
-- budzet rzeczywisty (real)
CREATE TABLE dzialy(
    kod INT PRIMARY KEY,
    nazwa VARCHAR(999),
    budzet REAL
);




-- Utwórz tabelę Pracownicy z polami:
-- ID całkowite, klucz podstawowy
-- imie tekst, nie może być puste
-- nazwisko tekst, nie może być puste
-- dzial całkowite, jest to również pole klucza obcego, odwołujące się do pola kod w tabeli Działy
CREATE TABLE pracownicy(
    ID INT PRIMARY KEY,
    imie VARCHAR(999) NOT NULL,
    nazwisko VARCHAR(999) NOT NULL,
    dzial INT,
    FOREIGN KEY(dzial) REFERENCES dzialy(kod)
);
 

-- Wykonaj kod dołączający dane:

INSERT INTO Dzialy(kod,nazwa,budzet) VALUES(14,'IT',65000);
INSERT INTO Dzialy(kod,nazwa,budzet)  VALUES(37,'Accounting',15000);
INSERT INTO Dzialy(kod,nazwa,budzet) VALUES(59,'Human Resources',240000);
INSERT INTO Dzialy(kod,nazwa,budzet) VALUES(77,'Research',55000);

INSERT INTO Pracownicy(ID,imie,nazwisko,dzial) VALUES('123234877','Michael','Rogers',14);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial) VALUES('152934485','Anand','Manikutty',14);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial) VALUES('222364883','Carol','Smith',37);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial) VALUES('326587417','Joe','Stevens',37);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial) VALUES('332154719','Mary-Anne','Foster',14);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial) VALUES('332569843','George','O''Donnell',77);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial)  VALUES('546523478','John','Doe',59);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial)  VALUES('631231482','David','Smith',77);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial) VALUES('654873219','Zacary','Efron',59);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial)  VALUES('745685214','Eric','Goldsmith',59);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial)  VALUES('845657245','Elizabeth','Doe',14);
INSERT INTO Pracownicy(ID,imie,nazwisko,dzial)  VALUES('845657246','Kumar','Swamy',14);
 

 

--  1. Wyświetl nazwiska wszystkich pracowników
SELECT nazwisko
FROM pracownicy;
-- 2. Wyświetl nazwiska wszystkich pracowników, ale tak, aby się nie powtarzały (DISTINCT) 
SELECT DISTINCT nazwisko
FROM pracownicy;

-- 3. Wyświetl dane wszystkich pracowników o nazwisku  "Smith".   
 SELECT *
FROM pracownicy
WHERE nazwisko ="Smith";

-- 4. Wyświetl wszystkie dane pracowników o nazwisku  "Smith" lub "Doe".
 SELECT *
FROM pracownicy
WHERE nazwisko = "Smith" OR nazwisko = "Doe";
-- 5. Wyświetl wszystkie dane o pracownikach, którzy pracują w dziale 14.

SELECT *
FROM pracownicy
WHERE dzial=14;

-- 6. Wyświetl wszystkie dane o pracownikach z działu 37 i działu 77. 

SELECT * 
FROM pracownicy
WHERE dzial IN (37,77);

-- 7. Wyświetl wszystkie dane o pracownikach, których nazwisko zaczyna się na literę  "S".

SELECT * 
FROM pracownicy
WHERE nazwisko LIKE 'S%';

-- 8. Wyświetl sumę budżetów wszystkich działów. 
 
 SELECT SUM(budzet)
 FROM dzialy;

-- 9. Dla każdego działu wyświetl liczbę pracowników (tylko kod działu i liczbę pracowników) 

SELECT dzial,count(id) as liczba_pracownikow 
FROM pracownicy
    GROUP BY dzial;


-- 10. Wyświetl wszystkie dane o pracownikach, łącznie z danymi o działach, w których pracują. 
 SELECT * 
 FROM pracownicy
JOIN dzialy ON dzialy.kod = pracownicy.dzial;

-- 11. Wyświetl imię i nazwisko każdego pracownika razem z nazwą i budżetem działu, w którym pracownik pracuje. 

SELECT imie, nazwisko, budzet, nazwa
FROM pracownicy
JOIN dzialy ON dzialy.kod = pracownicy.dzial;

-- 12. Wyświetl imiona i nazwiska pracowników, którzy pracują w działach o budżetach większych niż  $60,000 (czyli sześćdziesiąt tysięcy)
SELECT imie, nazwisko
FROM pracownicy
JOIN dzialy ON dzialy.kod = pracownicy.dzial
WHERE budzet > 60000;
-- 13. Wyświetl działy z budżetem większym niż średni budżet wszystkich działów. 
 SELECT nazwa
 FROM dzialy
 WHERE budzet> (SELECT AVG(budzet) FROM dzialy);

-- 14. Wyświetl nazwy działów z więcej niż dwoma pracownikami 
SELECT nazwa, COUNT(*)
FROM dzialy
JOIN pracownicy ON pracownicy.dzial = dzialy.kod
GROUP BY kod
HAVING count(*) > 2;
-- 15. Wyświetl imiona i nazwiska pracowników, pracujących w działach (dziale) z najmniejszym budżetem.
SELECT imie, nazwisko
FROM pracownicy
JOIN dzialy ON dzialy.kod = pracownicy.dzial
WHERE budzet = (SELECT MIN(budzet) FROM dzialy);
-- 16. Dodaj nowy dział  "Quality Assurance" z budżetem $40,000 i kodem 10. 
INSERT INTO Dzialy
VALUES(
    10, "Quality Assurance", 40000
);

-- 17. Dodaj pracownika "Mary Moore", pracującą w dziale o kodzie 10, z ID 847-21-9811.

INSERT INTO pracownicy 
(ID , imie , nazwisko , dzial)
VALUES
(847219811 , 'Mary', 'Moore' ,10)

-- 18. Zmniejsz budżet wszystkich działów o 10%.
UPDATE dzialy
SET budzet = budzet*0.9; 

-- 19. przenieś pracowników z działu Research  do działu IT  .

UPDATE pracownicy
SET dzial = (SELECT kod FROM dzialy WHERE nazwa='IT')
WHERE dzial = (SELECT kod FROM dzialy WHERE nazwa='Research');

-- 20. Usuń wszystkich pracowników pracujących w dziale   IT.
DELETE FROM pracownicy
WHERE dzial = (SELECT kod 
FROM dzialy
WHERE nazwa = "IT");
-- 21. Usuń wszystkich pracowników, którzy pracują w działach z budżetem większym bądź równym $60,000 (60 tysięcy)
DELETE FROM pracownicy
WHERE dzial IN (SELECT kod
FROM dzialy
WHERE budzet >= 60000);
-- 22. Usuń wszystkie dzialy
DELETE FROM dzialy;

UPDATE pracownicy
SET dzial = NULL;