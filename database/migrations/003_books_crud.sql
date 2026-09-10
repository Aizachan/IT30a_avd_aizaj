-- Book Query #1
SELECT * FROM books;

-- Book SQL #2 - Select books order by id ASC
SELECT * FROM books
    ORDER BY book_id ASC;

-- Books SQL #3 - Select books order by id DESC
SELECT * FROM books
    ORDER BY book_id DESC;

-- Book SQL #4 - Select books order by title ASC
SELECT
    book_title,
    book_author,
    book_category
FROM books
    ORDER BY book_title ASC;

-- Book SQL #5 - Select books order by title DESC
SELECT
    book_title,
    book_author,
    book_category
FROM books
    ORDER BY book_title DESC;

-- Book SQL #6 - Select books order by author ASC
SELECT
    book_title,
    book_author,
    book_category
FROM books
    ORDER BY book_author ASC;

-- Book SQL #7 - Select books order by author DESC
SELECT
    book_title,
    book_author,
    book_category
FROM books
    ORDER BY book_author DESC;

-- Book SQL #8 - Select books with specific id number
SELECT
    book_title,
    book_author,
    book_category
FROM books
WHERE BOOK_ID = 3
LIMIT 1;

-- Book SQL #9 - Update book title and author using specific id number
UPDATE books
SET
    book_title = 'Sayonara Lara',
    book_author = 'Anna Kawahara',
    book_category = 'Fiction'
WHERE BOOK_ID = 3;
