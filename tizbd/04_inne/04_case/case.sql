-- 1. Wyświetl rating, tytul i ocenę książki: jeśli rating jest > 4, to "dobra" , w przeciwnym wypadku "przeciętna", autora

SELECT rating, title, author,
    CASE 
        WHEN rating > 4 THEN 'dobra'
        ELSE 'przeciętna'
    END AS 'ocena'
FROM ksiazki;

-- 2.  >4.2 bardzo dobra, pomiędzy 3.8 a 4.3 dobra, poniżej przeciętna
SELECT rating, title, author,
    CASE 
        WHEN rating > 4.2 THEN 'bardzo dobra'
        WHEN rating BETWEEN 3.8 AND 4.3 THEN 'dobra'
        ELSE 'przeciętna'
    END AS 'ocena'
FROM ksiazki;

-- IF(warunek, wartość_jeśli_prawda , wartość_jeśli_fałsz)
-- 3. to co w zadaniu 1, ale z wykorzystaniem instrukcji IF
SELECT rating, title, author,
IF(rating>4, 'dobra', 'przeciętna') AS ocena
FROM ksiazki;

-- 4. Ile mamy książek dobrych, ale ile mniej dobrych? (granicą niech będzie rating 4)
SELECT id, 
    CASE WHEN rating > 4 THEN 'dobre' 
    ELSE 'mniej dobre'
    END AS ocena
FROM ksiazki
GROUP BY kategoria