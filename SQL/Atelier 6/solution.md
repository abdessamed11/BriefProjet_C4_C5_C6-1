# solution Atelier 6

## vous devez créer une base données, et imiter les requêtes dans le fichier sql shema.
## Exprimer les requêtes suivantes en SQL :

### 6.1 Listez les noms de tous les scientifiques, les noms de leurs projets, 
 ### -- et les heures travaillées par ce scientifique sur chaque projet, 
 ### -- dans l'ordre alphabétique du nom du projet, puis du nom du scientifique.

```sql
SELECT s.Name, p.Name as Name_Project, p.Hours FROM scientists s INNER JOIN assignedto a ON s.SSN=a.Scientist INNER JOIN projects p ON a.Project = p.Code ORDER BY p.Name, s.Name;
```
### 6.2 Sélectionnez les noms de projets qui ne sont pas encore attribués.
```sql
SELECT name FROM projects WHERE CODE not IN (SELECT project FROM assignedto)
```
