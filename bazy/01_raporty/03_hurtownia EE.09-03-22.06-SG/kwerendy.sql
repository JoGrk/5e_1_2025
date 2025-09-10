-- ‒ Zapytanie 1: wybierające z tabeli Klienci posortowane malejąco według punktów jedynie imię, nazwisko i punkty trzech klientów, których liczba punktów jest najwyższa
SELECT imie, nazwisko, punkty
FROM Klienci
ORDER BY punkty DESC
LIMIT 3;
-- ‒ Zapytanie 2: wybierające nazwę z tabeli Typy oraz liczbę klientów przypisanych do każdego typu. Należy posłużyć się relacją
SELECT nazwa, count(*)
FROM Typy
JOIN klienci ON  klienci.typy_id = Typy.id
GROUP BY nazwa;
-- ‒ Zapytanie 3: wybierające jedynie pola zdjecie, imie z tabeli Klienci oraz odpowiadające im pole opinia z tabeli opinie dla klientów, których typ ma id o wartościach 2, 3. Należy posłużyć się relacją
SELECT zdjecie, imie, opinia
FROM klienci
JOIN opinie ON opinie.klienci_id = klienci.id
WHERE typy_id IN (2,3);
-- ‒ Zapytanie 4: dodające do tabeli Klienci kolumnę o nazwie adres i typie napisowym, maksymalnie 50-znakowym

ALTER TABLE Klienci
ADD adres varchar(50);