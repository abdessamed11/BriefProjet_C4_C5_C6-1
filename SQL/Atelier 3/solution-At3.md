# sollution Atelier 3
__________________________________________________________________________________________
## 1 Sélectionner tous les entrepôts.
```sql
    SELECT Warehouse FROM boxes
```
__________________________________________________________________________________________
## 2 Sélectionnez toutes les cases dont la valeur est supérieure à 150 $.
```sql
    SELECT * FROM boxes WHERE Value >150;
```
__________________________________________________________________________________________
## 3 Sélectionner tous les contenus distincts dans toutes les cases.
```sql
    SELECT DISTINCT Contents FROM boxes 
```
__________________________________________________________________________________________
## 4 Sélectionner la valeur moyenne de toutes les boîtes.
```sql
    SELECT AVG(Value) FROM boxes
```
__________________________________________________________________________________________
## 5 Sélectionner le code de l'entrepôt et la valeur moyenne des boîtes dans chaque entrepôt.
```sql
    SELECT w.code, b.value FROM  warehouses w INNER JOIN boxes b ON w.Code=b.Warehouse;
```
__________________________________________________________________________________________
## 6 Identique à l'exercice précédent, mais ne sélectionnez que les entrepôts où la valeur moyenne des boîtes est supérieure à 150.
```sql
    6-SELECT w.code, AVG(b.value) FROM warehouses w INNER JOIN boxes b ON w.Code=b.Warehouse GROUP BY w.Code HAVING AVG(b.value)>150;
```
__________________________________________________________________________________________
## 7 Sélectionnez le code de chaque boîte, ainsi que le nom de la ville dans laquelle la boîte est située.
```sql
    SELECT b.code, w.location from boxes b INNER JOIN warehouses w on b.Warehouse=w.code;
```
__________________________________________________________________________________________
## 8 Sélectionnez les codes des entrepôts, ainsi que le nombre de boîtes dans chaque entrepôt.
```sql
    SELECT w.Code, COUNT(b.Contents) FROM warehouses w INNER JOIN boxes b ON w.Code=b.Warehouse GROUP BY w.Code;
```
__________________________________________________________________________________________
## 9 Sélectionnez les codes de tous les entrepôts qui sont saturés (un entrepôt est saturé si le nombre de boîtes qu'il contient est supérieur à la capacité de l'entrepôt).
```sql
    SELECT w.Code, COUNT(b.Contents), w.Capacity FROM warehouses w INNER JOIN boxes b ON w.Code=b.Warehouse GROUP BY w.Code HAVING w.Capacity < COUNT(b.Contents) ;
```
__________________________________________________________________________________________
## 10 Sélectionnez les codes de toutes les boîtes situées à Chicago.
```sql
    SELECT w.location, b.code FROM warehouses w INNER JOIN boxes b ON w.Code=b.Warehouse WHERE w.Location= 'chicago';
```
__________________________________________________________________________________________
## 11 Créer un nouvel entrepôt à New York avec une capacité de 3 boîtes.
```sql
    INSERT INTO Warehouses(Code,Location,Capacity) VALUES(6,'New York',3);
```
__________________________________________________________________________________________
## 12 Créer une nouvelle boîte, avec le code "H5RT", contenant des "Papers" d'une valeur de 200 $, et située dans l'entrepôt 2.
```sql
    12-INSERT INTO boxes (code,contents,Value,warehouse) VALUES ('H5RT','Papers',200,2)
```
_______________________________________________________________________________________
## 13 Réduire la valeur de toutes les boîtes de 15 %.
```sql
    UPDATE boxes SET VALUE=0.85*VALUE
```
__________________________________________________________________________________________
## 14 Retirer toutes les boîtes d'une valeur inférieure à 100 $.
```sql
    DELETE FROM boxes WHERE value<100
```
__________________________________________________________________________________________
## 15 Retirer toutes les boîtes des entrepôts saturés.
```sql
    delete from warehouses WHERE w.Capacity <COUNT(b.Contents) 
```
__________________________________________________________________________________________
## 16 Ajouter un indice pour la colonne "Entrepôt" dans le tableau "boîtes".
```sql
    CREATE index indice on boxes(Warehouse)
```
__________________________________________________________________________________________
## 17 Imprimer tous les index existants
```sql
    SHOW INDEX FROM boxes;
```