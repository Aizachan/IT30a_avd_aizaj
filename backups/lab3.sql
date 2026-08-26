CREATE TABLE BOOKS(
    book_id INT PRIMARY KEY AUTO_INCREMENT,
    book_title VARCHAR(50) NOT NULL,
    book_author VARCHAR(50) NOT NULL,
    book_category VARCHAR(50) NOT NULL,
    book_created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO BOOKS (book_title, book_author, book_category) VALUES
('Painters of the night', 'Beogduck', 'BL'),
('Jinx', 'Mingwa', 'BL'),
('hunter x hunter', 'Yamagata Prefecture', 'Adventure'),
('Sayonara Lara', 'Anna Kawahara', 'Fiction');