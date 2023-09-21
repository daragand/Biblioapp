<?php
require 'classes/Book.php';
//on calcule le nombre total de livres
$totalBooks=count(Book::getBooks());

//traitement du formulaire
if(!empty($_POST)){
  
    $book = new Book();
    $book->setTitle($_POST['title'])
    ->setAuthor($_POST['author'])
    ->setCategory($_POST['category'])
    ->setYear($_POST['year'])
    ->setDescription($_POST['description'])
    ->setIsbn($_POST['isbn'])
    ->setSlug($_POST['title'])
    ;
    var_dump($book);

    //on utilise la méthode static d'ajout de livre dans la classe Book
    Book::addBook($book);
}
if(isset($_GET['success']) && $_GET['success']===1){
   echo' <div class="alert alert-success" role="alert">
    Enregistrement réussi !
  </div>';
  
}else if(isset($_GET['success']) && $_GET['success']==0){

    echo '<div class="alert alert-danger" role="alert">
    Une erreur s\'est produite. Merci de réessayer !
  </div>';
}


require_once 'templates/header.html.php';

?>

<!-- bibliothèque -->
<div class="text-center mt-4">
<h2>Bibliothèque 
    <span class="badge rounded-pill text-bg-primary mx-2">
        <?= $totalBooks; ?>
    </span>
</h2>
<button type="button" class="btn btn-outline-dark text-center" data-bs-toggle="modal" data-bs-target="#addBook">
    Ajouter un livre
</button>
</div>
<div class="rounded p-3 m-4  gap-4 bg-light shadow switch-row row justify-content-center">
   
<?php include 'templates/_partials/_books_card.html.php' ?>   
</div>

<!-- Modal -->
<div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        <i class="bi bi-book"></i>
            Ajouter un livre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- formulaire d'ajout - TODO : sécuriser le formulaire -->
        <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Titre du livre</label>
            <input required type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">
            <div id="titleHelp" class="form-text">Saississez le titre du livre</div>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Auteur du livre</label>
            <input required type="text" class="form-control" id="author" name="author" aria-describedby="authorHelp">
            <div id="authorHelp" class="form-text">Saississez le nom de l'auteur du livre</div>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Choisissez une catégorie</label>
            <input required  list="listCategory" class="form-control" id="category" name="category" >
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
            <input required type="text" class="form-control" id="year" name="year" aria-describedby="yearHelp">
            <div id="yearHelp" class="form-text">Saississez l'année d'édition du livre au format "1980"</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Résumé du livre</label>
            <textarea required type="text" class="form-control" id="description" name="description" aria-describedby="descriptionHelp"></textarea>
            <div id="descriptionHelp" class="form-text">Saississez le résumé</div>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">Fournissez l'ISBN du livre</label>
            <input required type="text" class="form-control" id="isbn" name="isbn" aria-describedby="isbnHelp">
            <div id="isbnHelp" class="form-text">Format attendu : "978-2-1234-5680-3"</div>
        </div>
        
       
       
        <button type="submit" class="btn btn-success">
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
