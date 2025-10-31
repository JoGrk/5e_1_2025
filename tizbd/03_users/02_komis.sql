-- 1. Dodaj użytkowników:
-- A. Kasia, odpowiadająca za wprowadzanie danych o klientach, hasło 1234
CREATE USER 'Kasia'@'localhost'
IDENTIFIED BY '1234';

-- B. Jan - głównego mechanika wpisującego informacje o naprawach, hasło 1234
CREATE USER 'Jan'@'localhost'
IDENTIFIED BY '1234';
-- C. Kasjer - odpowiedzialnych za wystawianie rachunków, ale nie mogących wprowadzać zmian do bazy, hasło 1234
create user 'Kasjer'@'localhost'
identified by '1234';
-- 2. Utwórz perspektywę (widok)  KlienciKoszty (nazwa, adres, kwota, data_wpisu z tabeli rejestry pod nazwą data_rejestru) łączącą dane z tabel Klienci i Rejestry, która będzie potrzebna kasjerowi do pracy
 CREATE VIEW KlienciKoszty AS 
 SELECT nazwa, adres, kwota, rejestry.data_wpisu as data_rejestru
 FROM Klienci
    JOIN rejestry ON rejestry.klient = klienci.id;
-- 3. Ustal minimalny zestaw uprawnień dla utworzonych użytkowników, kierując się zasadą "im mniejsze uprawnienia, tym mniej można zepsuć"
-- A. Kasia, wszystkie prawa do tabeli Klienci
GRANT ALL ON 5e_1_komis.klienci TO 'Kasia'@'localhost';
-- B. Jan - prawa do modyfikacji, dodawania i usuwania  dla tabel operacje i rejestry oraz wyszukiwania dla wszystkich tabel w bazie
GRANT UPDATE, INSERT, DELETE ON 5e_1_komis.operacje TO 'Jan'@'localhost'; 
GRANT UPDATE, INSERT, DELETE ON 5e_1_komis.rejestry TO 'Jan'@'localhost'; 
 
GRANT SELECT ON 5e_1_komis.* TO 'Jan'@'localhost'; 
-- C. Kasjer - prawa do przeszukiwania perspektywy KlienciKoszty
 GRANT SELECT ON 5e_1_komis.KlienciKoszty TO 'Kasjer'@'localhost';
-- 4. Utwórz nowego użytkownika uczendba z hasłem dostępu zaq1@WSX 
CREATE USER 'uczendba'@'localhost'
IDENTIFIED BY 'zaq1@WSX';
-- A. przypisz mu wszystkie uprawnienia do tabel Klienci i Handlowcy.
 GRANT ALL ON 5e_1_komis.Klienci TO 'uczendba'@'localhost';
 GRANT ALL ON 5e_1_komis.Handlowcy TO 'uczendba'@'localhost';
-- B. zabroń mu usuwania rekordów z tabeli Klienci
-- DENY DELETE ON 5e_1_komis.Klienci TO 'uczendba'@'localhost'; 



-- C. odbierz uprawnienia wykonywania zapytań usuwania rekordów i modyfikowania wartości w tabeli Handlowcy

REVOKE DELETE, UPDATE ON 5e_1_komis.handlowcy FROM 'uczendba'@'localhost';

-- 5. Utwórz użytkowników jeden i dwa (bez hasła).
CREATE USER 'jeden_1';
CREATE USER 'dwa_1';
--  A. Nadaj uprawnienia wprowadzania, zmiany i usuwania danych w całej bazie komis dla użytkownika jeden
GRANT INSERT, UPDATE, DELETE ON 5e_1_komis.* TO 'jeden_1';
-- B. nadaj wszystkie uprawnienia do tabeli Auta użytkownikowi dwa
GRANT ALL ON 5e_1_komis.auta TO 'dwa_1';
-- C. odbierz użytkownikowi jeden prawa usuwania danych 
REVOKE DELETE ON 5e_1_komis.* FROM 'jeden_1';
-- D. odbierz wszystkie uprawnienia użytkownikowi dwa do tabeli Auta
revoke all on 5e_1_komis.auta from 'dwa_1';
-- 6. 
-- A. Zaloguj się jako użytkownik jeden i ustaw hasło 'zaq1@WSX'
mysql -u jeden_1
SET PASSWORD = PASSWORD('zaq1@WSX');
-- B. Ustaw hasło dla użytkownika dwa na 'zaq1@WSX'
SET PASSWORD FOR dwa_1 = PASSWORD('zaq1@WSX');
-- C. z poziomu konta root zmień hasło dla użytkownika jeden na 'haslo'
SET PASSWORD FOR jeden_1 = PASSWORD('haslo');