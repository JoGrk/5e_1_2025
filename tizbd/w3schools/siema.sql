-- 1.  Wyświetlana nazwa produktu, cena i kategoria cenowa:  cheap (do 20), expensive (powyżej). IF
SELECT productName, categoryName, IF(price<=20, 'cheap', 'expensive')
FROM products
JOIN categories ON categories.categoryID=products.categoryID;
-- 2. Rozbuduj poprzedni przykład o średnią półkę cenową: cheap(do 20), standard (do 100), expensive (powyżej) (CASE  OF)
SELECT productName, categoryName, 
    CASE price 
        WHEN price<20 THEN 'cheap'
        WHEN price>100 THEN 'expensive'
        WHEN price>20 AND price<100 THEN 'standard' 
        END AS priceCategory 
FROM products
JOIN categories ON categories.categoryID=products.categoryID;
-- 3. Ilu dostawców mamy z UE (Germany, Italy, France, Denmark, Spain, Sweden, Netherlands, Finland), z Ameryki (USA, Canada, Brazil), a ilu z pozostałych krajów