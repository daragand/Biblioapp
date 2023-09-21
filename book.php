<?php
require 'templates/header.html.php';
require 'Classes/Book.php';

/**
* Page d'un livre seul
*/

$book = Book::getOneBook($_GET['slug']);

if(isset($_POST['id'])){//si la donnée existe dans le tableau $_POST
    if (isset($_POST['delete'])){
    Book::deleteBook($_POST['id']);//on execute la méthode deleteBook avec l'id en paramètre
      }else if(isset($_POST['edit'])){
        $book = new Book();
        $book->setTitle($_POST['title'])
            ->setAuthor($_POST['author'])
            ->setYear($_POST['year'])
            ->setDescription($_POST['description'])
            ->setIsbn($_POST['isbn'])
            ->setCategory($_POST['category'])
            ->setSlug($_POST['title'])
            ;


        Book::editBook($book,$_POST['id']);
      }
}



?>
<h1 class="justify-content-center"><?=$book['title'];?></h1>
<!-- bouton de suppression du livre -->
<div class="justify-content-center d-flex gap-3">
<button type="button" class="btn btn-outline-dark text-center" data-bs-toggle="modal" data-bs-target="#editBook">
    Modifier
</button>
<form action="" method="POST">
    <input type="number" name="id" value="<?=$book['id'];?>" hidden>
    <input type="submit" name="delete" class="btn  btn-danger" value="supprimer">
      
</form>
</div>
<!-- Modal de modification -->
<div class="modal fade" id="editBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        <i class="bi bi-book"></i>
        Modifier : <?=$book['title'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- formulaire d'ajout - TODO : sécuriser le formulaire -->
        <form method="POST">
        <input type="text" name="formType" value="edit" hidden>
        <input type="text" name="id" value="<?=$book['id'];?>" hidden>
        <div class="mb-3">
            <label for="title" class="form-label">Titre du livre</label>
            <input required type="text" class="form-control" id="title" name="title" value="<?=$book['title'];?>" aria-describedby="titleHelp">
            <div id="titleHelp" class="form-text">Saississez le titre du livre</div>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Auteur du livre</label>
            <input required type="text" class="form-control" id="author" name="author" value="<?=$book['author'];?>" aria-describedby="authorHelp">
            <div id="authorHelp" class="form-text">Saississez le nom de l'auteur du livre</div>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Choisissez une catégorie</label>
            <input required  list="listCategory" class="form-control" id="category" name="category" value="<?=$book['category'];?>" >
            <datalist id="listCategory">
                <option value="roman">Roman</option>
                <option value="théâtre">Théâtre</option>
                <option value="biographie">Biographie</option>
                <option value="poésie">Poésie</option>
                <option value="essai">Essai</option>
            </datalist>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Quelle est l'année d'édition.</label>
            <input required type="text" class="form-control" id="year" value="<?=$book['year'];?>" name="year" aria-describedby="yearHelp">
            <div id="yearHelp" class="form-text">Saississez l'année d'édition du livre au format "1980"</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Résumé du livre</label>
            <textarea required type="text" class="form-control" id="description"  name="description" aria-describedby="descriptionHelp"><?=$book['description'];?></textarea>
            <div id="descriptionHelp" class="form-text">Saississez le résumé</div>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Fournissez l'ISBN du livre</label>
            <input required type="text" class="form-control" value="<?=$book['isbn'];?>" id="isbn" name="isbn" aria-describedby="isbnHelp">
            <div id="isbnHelp" class="form-text">Format attendu : "978-2-1234-5680-3"</div>
        </div>
        
       
       
        <button name="edit" type="submit" class="btn btn-success">
            <i class="bi bi-save"></i>
            Enregistrer
        </button>
        </form>
<!-- fin du formulaire d'ajout -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
        
      </div>
    </div>
  </div>
</div>







<?php
require 'templates/footer.html.php';
?>