<?php

/**
 * Fichier de composant (partial) pour la liste des livres sous formes de cartes.
 */

 require_once 'classes/Book.php';

foreach (Book::getBooks() as $book):?>

    <div class="card col-md-3 col-sm-5 col-sm-12 card-bg flex-grow-1">
    <div class="card-body text-light  ">
        <h5 class="card-title"><?=substr($book['title'],0,20) ?>...</h5>
        <h6 class="card-subtitle mb-2"><?=$book['author'] ?></h6>
        <?php if(isset($book['description'])):?>
        <p class="card-text"><?=substr($book['description'],0,110) ?>...</p>
        <?php endif ?>
        <a href="/book.php?slug=<?=$book['slug'] ?>" class="btn btn-sm btn-outline-light">Voir</a>
        <a href="/reserver.php?slug=<?=$book['slug'] ?>" class="btn btn-sm btn-success">Réserver</a>
    </div>
    </div>
<?php endforeach?>
