-- 1. Utwórz użytkownika u1  z hasłem abcd
CREATE USER 'u1'@'localhost' IDENTIFIED BY 'abcd';

-- 2. Użytkownikowi u1 nadaj prawo do efektywnego wstawiania, usuwania i modyfikowania danych dla tabeli auta (baza komis).
GRANT INSERT, DELETE, UPDATE , SELECT ON 5e_1_komis.auta TO 'u1'@'localhost';
-- 3. Użytkownikowi u1 odbierz prawo do usuwania danych w tabeli auta
REVOKE DELETE ON  5e_1_komis.auta FROM 'u1'@'localhost';
-- 4. Zablokuj koto u1
ALTER USER 'u1'@'localhost' ACCOUNT LOCK;
-- 5. Odblokuj konto u1
ALTER USER 'u1'@'localhost' ACCOUNT UNLOCK;
-- 6.Ustaw hasło dla użytkownika u1 na 1234
SET PASSWORD FOR 'u1'@'localhost' = PASSWORD('1234');
-- 7, utwórz rolę r1 z prawami do wyświetlania danych z wszystkich tabel bazy b
CREATE ROLE 'r1_1';
GRANT SELECT ON 5e_1_komis.* TO 'r1_1';
-- 8. Użytkownikowi u1 przypisz prawo do roli r1
GRANT 'r1_1' TO 'u1'@'localhost';
-- 9 zaloguj się jako u1 i sprawdź uprawniania (show grants)

--        10. Sprawdź, czy możesz wyświetlić dane z tabeli zamowienia
SELECT 
--        11. włącz (ustaw) rolę r1

--        12. sprawdź, czy możesz wyświetlić dane z tabeli zamowienia

--         13. sprawdź, czy możesz usunąć zamowienie o id 3

-- 14. do roli r1 dodaj prawo do usuwania danych z tabeli zamowienia

--          15. sprawdź uprawnienia

--          16. usuń zamówienie o id 2

-- 17. usuń rolę r1

-- 18. usuń użytkownika u1