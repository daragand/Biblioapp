<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bibliothèque en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&family=Inter:wght@200&display=swap" rel="stylesheet">
</head>

<body>
    <div class="biblioapp">
        <aside class="d-flex flex-column flex-shrink-0 col-md-2 d-none d-sm-block p-3 bg-light">
            <div class="d-flex">
                <a href="/" class="d-flex align-items-center fs-4 mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <i class="bi bi-book mx-1"></i> BiblioApp
                </a>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link" aria-current="page">
                        <i class="bi bi-speedometer2"></i>
                        Tableau de bord
                    </a>
                </li>
                <li>
                    <a href="books.php" class="nav-link link-body-emphasis">
                        <i class="bi bi-book"></i>
                        Bibliothèque
                    </a>
                </li>
                <li>
                    <a href="reservations.php" class="nav-link link-body-emphasis">
                        <i class="bi bi-calendar"></i>
                        Réservations
                    </a>
                </li>
                <li>
                    <a href="clients.php" class="nav-link link-body-emphasis">
                        <i class="bi bi-people"></i>
                        Clients
                    </a>
                </li>
                <li>
                    <a href="docs.php" class="nav-link link-body-emphasis">
                        <i class="bi bi-gear"></i>
                        Documentation
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://placeholder.com/50/" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Administration</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">Mes infos</a></li>
                    <li><a class="dropdown-item" href="#">Paramètres</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                </ul>
            </div>
        </aside>
        <main class="col-md-10 col-sm-12 offset-md-2 offset-sm-0 mb-4">