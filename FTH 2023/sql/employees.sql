/*
Subram & Brason
ID.sql
March 17 2023
FTH 2023
*/
-- DROP the table if it already exists
DROP TABLE IF EXISTS courses;

-- CREATE the table
CREATE TABLE employees(
	employeeNumber VARCHAR(8) PRIMARY KEY,
	name VARCHAR(32) NOT  NULL,
	position VARCHAR(32) NOT NULL
);

GRANT ALL ON employees TO security;

--Record 1:
INSERT INTO employees(employeeNumber, name, position)
VALUES(
	'001',
	'John Doe',
	'Tour Guide'
);

--Record 2:
INSERT INTO employees(employeeNumber, name, position)
VALUES(
	'002',
	'Jane Doe',
	'Security'
);

--Record 3:  db
INSERT INTO employees(employeeNumber, name, position)
VALUES(
	'003',
	'Mister Meowington',
	'Supervisor'
);
