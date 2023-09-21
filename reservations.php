<?php
require 'classes/Book.php';
require 'classes/Reservation.php';
require 'classes/Client.php';
//on calcule le nombre total de réservations
$totalResa=count(Reservation::getALLReservations());

//au moment de rendre un livre, on récupère l'id de la réservation
if(isset($_GET)){
  if(isset($_GET['idResa'])){
      Reservation::returnResa($_GET['idResa']);
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

<?php
require 'templates/footer.html.php';
