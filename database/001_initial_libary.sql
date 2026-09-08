-- Table #1 students
CREATE TABLE IF NOT EXISTS students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,

    student_first_name VARCHAR(50) NOT NULL,
    student_last_name VARCHAR(50) NOT NULL,
    student_course VARCHAR(50) NOT NULL,

    student_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


-- Table #2 books
CREATE TABLE IF NOT EXISTS books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,

    book_title VARCHAR(100) NOT NULL,
    book_author VARCHAR(100) NOT NULL,
    book_category VARCHAR(50) NOT NULL,

    book_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


-- Table #3 borrow
CREATE TABLE IF NOT EXISTS borrow (
    borrow_id INT AUTO_INCREMENT PRIMARY KEY,

    book_id INT NOT NULL,
    student_id INT NOT NULL,

    borrow_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    borrow_return_date TIMESTAMP NULL DEFAULT NULL,

    CONSTRAINT fk_borrow_students
    FOREIGN KEY (student_id)
    REFERENCES students(student_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    CONSTRAINT fk_borrow_book
    FOREIGN KEY (book_id)
    REFERENCES books(book_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT

) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


-- Insert Students
INSERT INTO students
    (student_first_name, student_last_name, student_course)
VALUES
    ('AIZA', 'JANLAY', 'BSIT'),
    ('RIRI', 'PEREZ', 'BSIT'),
    ('RURU', 'NEKO', 'BSIT'),
    ('EBOY', 'HALANGDON', 'BSBA');


-- Insert Books
INSERT INTO books
    (book_title, book_author, book_category)
VALUES
    ('Painters of the night', 'Beogduck', 'BL'),
    ('Jinx', 'Mingwa', 'BL'),
    ('Hunter x Hunter', 'Yoshihiro Togashi', 'Adventure'),
    ('Sayonara Lara', 'Anna Kawahara', 'Fiction');


-- Insert Borrow Transactions
INSERT INTO borrow
    (student_id, book_id)
VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4);