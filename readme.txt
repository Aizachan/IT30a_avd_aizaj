C:\try-today\backups

D:\Dev\it30a\backups

1. CREATE DATABASE <database_name>;
2. SHOW DATABASES;
3. CONNECT <database_name>;
4. CREATE TABLE <table_name_in_plural> ();
5. INSERT INTO <table_name_in_plural>
    (columns)
    VALUES(values);

Utility Commands
\! cls
mysqldump -u root -p --databases library_db > C:\try-today\backups\08182026_library_db.sql 

set d=%date:~-4%-%date:~3,2%-%date:~0,2%&set t=%time:~0,2%-%time:~3,2%-%time:~6,2%&set t=%t: =0%&C:\xampp\mysql\bin\mysqldump.exe -u root -p --databases library_db > "C:\try-today\backups\%d%_%t%_library_db.sql"


Laboratory 2

ALTER TABLE students ADD COLUMN student_at TIMESTAMP NULL DEFUALT NULL;
UPDATE students SET student_created_at = CURRENT_TIMESTAMP WHERE student_created_at IS NULL;
ALTER TABLE students MODIFY COLUMN student_created_at TIMESTAMP NOT NULL DEFUALT CURRENT_TIMESTAMP;

