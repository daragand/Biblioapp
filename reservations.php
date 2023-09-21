<?php
require 'classes/Book.php';
require 'classes/Reservation.php';
require 'classes/Client.php';
//on calcule le nombre total de réservations
$totalResa=count(Reservation::getALLReservations());
//on récupère les livres et les usagers pour la réservation
$books=Book::getBooks();
$clients=Client::getClients();

//au moment de rendre un livre, on récupère l'id de la réservation
if(isset($_GET)){
  if(isset($_GET['idResa'])){
      Reservation::returnResa($_GET['idResa']);
  }
}

if(isset($_POST)){
  if((isset($_POST['lastname'])&& isset($_POST['resaBook']))){
    $reservation = new Reservation();
    $reservation->setClientId($_POST['lastname'])
                ->setBookId($_POST['resaBook'])
    ;

    Reservation::addReservation($reservation);
  }
}


//traitement du formulaire

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

<div class="text-center mt-4">
    <h2><i class="bi bi-book mx-2"></i> BiblioApp - 
        <span class="badge rounded-pill text-bg-success mx-2"> <?= $totalResa; ?> Réservations</span>
    </h2>
    <br>
    <button type="button" class="btn btn-outline-danger btn-lg text-bg-warning" data-bs-toggle="modal" data-bs-target="#addReservation">
        Ajouter une Réservation
    </button>
</div>
<div class="rounded p-3 m-4 gap-4 bg-light shadow switch-row row justify-content-center">
	<?php include 'templates/_partials/_reservations-table.html.php'; ?>
</div>


<div class="modal fade" id="addReservation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       

        <h5 class="modal-title" id="exampleModalLabel">
        <i class="bi bi-book"></i>
            Réserver un livre </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- formulaire d'ajout d'une réservation- TODO : sécuriser le formulaire -->
        <form method="POST">
        <div class="mb-3">
            <label for="resaBook" class="form-label">Sélectionnez livre à réserver </label>
            <select required type="text" class="form-control" id="resaBook" name="resaBook" aria-describedby="resaBookHelp">
           <!-- récupération de la liste des livres -->
            <?php foreach($books as $book): ?>
            <!-- TODO : Il s'agira d'ajouter la gestion des livres déjà sorties avec une couleur et d'empêcher le submit  -->
              <option value="<?= $book['id'] ?>">
                <?= $book['title'] ?>  -   <?= $book['author'] ?>
              </option>
            <?php endforeach ?>
            
          </select>
            <div id="resaBookHelp" class="form-text">Sélectionner le livre dans la liste</div>
        </div>
        
      
        <div class="mb-3">
            <label for="lastname" class="form-label">Nom de l'emprunteur</label>
            <select  type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastnameHelp">
            <?php foreach($clients as $client): ?>
              <option value="<?= $client['id'] ?>">
                <?= $client['lastName'] ?> <?= $client['firstName'] ?> <span>(<?= $client['year'] ?>)</span>
              </option>
            <?php endforeach ?>
            </select>
            <div id="lastnameHelp" class="form-text">Saississez le nom de l'emprunteur du livre</div>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i>
            Réserver
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
