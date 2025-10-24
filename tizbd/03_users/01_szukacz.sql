-- (wiersz poleceń)

-- 1. Dodaj nowego użytkownika kupiec łączącego się z lokalnej maszyny z hasłem kupiecE14
CREATE USER 'kupiec_25'@'localhost' IDENTIFIED BY '1234';
 
-- 2. Wykonaj testowe połączenie (zaloguj się) na koncie kupiec. Jakie bazy danych są widoczne?
 mysql -u kupiec_25 -p

-- 3. jako root sprawdź zawartość tabeli user (tylko pola host, user, password) (w bazie danych mysql) (pokaż zawartość tej tabeli)

SELECT host, user, password
FROM mysql.user;
 
-- 4. Utwórz użytkownika szukacz z hasłem szukaczE14
 CREATE USER 'szukacz_25'@'localhost' IDENTIFIED BY '1234';
-- 5. Wyloguj się z sesji kupca i wykonaj testowe połączenie jako szukacz
mysql -u szukacz_25 -p
--  6. Utwórz
-- A. bazę danych Egzaminy
CREATE DATABASE Egzaminy_1;
-- B. w tej bazie tabelę Test (pole id typu int, klucz podstawowy, bez autoinkrementacji). 
CREATE TABLE Test(
    id INT PRIMARY KEY
);
-- C. Dodaj do tabeli Test cyfry 1, 2 i 3 
INSERT INTO test
VALUES
(1),(2),(3);
-- D. Utwórz tabelę tabela z jednym polem id typu całkowitego.
CREATE TABLE tabela(
    id INT
);
 
-- 7. Daj kupcowi prawo do wprowadzania danych do tabeli test w bazie Egzaminy (samo wprowadzanie, bez wyszukiwania)

GRANT INSERT ON Egzaminy_1.test TO 'kupiec_25'@'localhost';
 
-- 8. Daj szukaczowi prawo do wyświetlania danych z tabeli test w bazie Egzaminy
GRANT SELECT ON Egzaminy_1.test TO 'szukacz_25'@'localhost';
-- 9. Sprawdź, czy kupiec (prawo do wprowadzania danych):

-- A. widzi bazę Egzaminy
-- B. Może jej użyć
-- C. Widzi tabele w tej bazie
-- D. Może wyświetlić zawartość tabeli Test
-- E. Może dodać dane (liczbę 4)
 
-- 10. Sprawdź, czy szukacz (prawo do wyświetlania danych):
-- A. widzi bazę Egzaminy
-- B. Może jej użyć
-- C. Widzi tabele w tej bazie
-- D. Może wyświetlić zawartość tabeli Test
-- E. Może dodać dane (liczbę 5)
-- 11. Utwórz użytkownika serwisant
  CREATE USER 'serwisant_25'@'localhost' IDENTIFIED BY '1234';
-- 12. Daj prawo serwisantowi do usuwania danych z tabeli test w bazie egzaminy (samo usuwanie, bez prawa do wyszukiwania).
 
GRANT DELETE ON Egzaminy_1.test TO 'serwisant_25'@'localhost';
-- 13. Sprawdź, czy serwisant (prawo do usuwania danych):
-- A. widzi bazę Egzaminy
SHOW DATABASES;
-- B. Może jej użyć
USE Egzaminy_1;
-- C. Widzi tabele w tej bazie
SHOW TABLES;
-- D. Może wyświetlić zawartość tabeli Test
SELECT * 
FROM Test;
-- E. Może usunąć dane (liczbę 3)
DELETE FROM test
WHERE id=3;
-- F. Może usunąć wszystkie dane;
DELETE FROM test;
-- 14. Jeśli użytkownik serwisant ma problemy z usuwaniem, popraw to (ale nie dawaj mu za dużo praw, a już na pewno nie wszystkie), najpierw dodaj do tabeli liczby 1,2,3
INSERT INTO test
VALUES
(1),(2),(3);
GRANT SELECT ON Egzaminy_1.test TO 'serwisant_25'@'localhost';