<?php

// ---------- 1. CURRENT SECTION ----------

$currentSection = $_GET['section'] ?? 'dashboard';

function navActive($section, $currentSection) {
    return $section === $currentSection ? 'active' : '';
}


// ---------- 2. DATABASE CONNECTION ----------

$host = 'localhost';
$db   = 'it30a_lab_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


// ---------- 3. DEFINE DASHBOARD KPI VARIABLES ----------

// Total Students
$studentCount = $pdo->query("
    SELECT COUNT(*) FROM students
")->fetchColumn();

// Total Books
$bookCount = $pdo->query("
    SELECT COUNT(*) FROM books
")->fetchColumn();

// Total Borrow Records
$totalBorrows = $pdo->query("
    SELECT COUNT(*) FROM borrow
")->fetchColumn();

// Active Borrowed Books
$activeBorrows = $pdo->query("
    SELECT COUNT(*)
    FROM borrow
    WHERE borrow_return_date IS NULL
")->fetchColumn();

?>

<!-- ---------- 4. DASHBOARD STATISTICS ---------- -->

<div class="stats-grid">

    <!-- Students -->
    <div class="stat-card">
        <div class="stat-header">
            <span class="stat-label">Students</span>
            <span class="material-icons">school</span>
        </div>
        <div class="stat-number"><?= $studentCount ?></div>
        <div class="stat-sub">enrolled</div>
    </div>

    <!-- Books -->
    <div class="stat-card">
        <div class="stat-header">
            <span class="stat-label">Books</span>
            <span class="material-icons">auto_stories</span>
        </div>
        <div class="stat-number"><?= $bookCount ?></div>
        <div class="stat-sub">in collection</div>
    </div>

    <!-- Borrow Records -->
    <div class="stat-card">
        <div class="stat-header">
            <span class="stat-label">Borrow records</span>
            <span class="material-icons">history</span>
        </div>
        <div class="stat-number"><?= $totalBorrows ?></div>
        <div class="stat-sub">all time</div>
    </div>

    <!-- Active Loans -->
    <div class="stat-card">
        <div class="stat-header">
            <span class="stat-label">Active loans</span>
            <span class="material-icons">pending_actions</span>
        </div>
        <div class="stat-number"><?= $activeBorrows ?></div>
        <div class="stat-sub">not returned</div>
    </div>

</div>


<!-- Material Icons --> 
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

 <style>
    .app-header{
        display:flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap:1rem;
        font-family: Roboto,system-ui,-apple-system, sans-serif;
    }

    .app-header h1{
        font-weight: 400;
        font-size: 1.8rem;
        display: flex;
        align-items: center;
        gap:0.5rem;
        color:#212121;
        margin: 0;
    }

    .app-header h1 material-icons{
        font-size:2.2rem;
        color: #1976d2; 
    }

    .nav-links{
        display:flex;
        gap:0.25rem;
        background: transparent;
    }

    .nav-links a{
        text-decoration:none;
        color:#616161;
        font-size:0.9rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: .6rem 1.2rem;
        border-radius: 4px;
        transition: background-color 0.2s, color 0.2s;
        display:flex;
        align-items: center;
        gap:.35rem;
    }

    .nav-links a .material-icons{
        font-size:1.2rem;
    }

    .nav-links a:hover{
        background:#e3f2fd;
        color:#1976d2;
    }

    .nav-links a.active{
        background:#1976d2;
        color:white;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, .14), 0 3px 1px -2px  rgba(0, 0, 0, .12), 0 1px 5px 0  rgba(0, 0, 0, .2);
    }


    .nav-link a.active .material-icons{
        color:white;
    }

    @media(max-width:760px){
        .app-header{
            flex-direction: column;
            align-items: flex-start;
        }

        .nav-links{
            width: 100%;
            overflow-x: auto;
            padding-bottom:  0.5rem;
        }

        .nav-links a{
            padding: .5rem .8rem;
            font-size: .8rem;
            white-space: nowrap;
        }
    }

 </style>

 <header class="app-header">
    <h1>
        <span class="material-icons">local_library</span>
        Libary Dashboard
    </h1>

    <nav class="nav-links">

        <a href="index.php?section=dashboard" class="<?=  navActive('dashboard',$currentSection) ?>">
            <span class="material-icons">dashboard</span>
            Dashboard
        </a>

        <a href="index.php?section=students" class="<?=  navActive('students',$currentSection) ?>">
            <span class="material-icons">people</span>
            Students
        </a>

        <a href="index.php?section=books" class="<?=  navActive('books',$currentSection) ?>">
            <span class="material-icons">menu_book</span>
            Books
        </a>

        <a href="index.php?section=borrow" class="<?=  navActive('borrow',$currentSection) ?>">
            <span class="material-icons">swap_horiz</span>
            Borrow
        </a>

    </nav>

 </header>