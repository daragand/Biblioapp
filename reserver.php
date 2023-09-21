<?php
require 'templates/header.html.php';
require 'Classes/Book.php';
require 'Classes/Client.php';
require 'Classes/Reservation.php';

//récupération du livre via le slug
$book = Book::getOneBook($_GET['slug']);

//Pour la gestion de recherche du client
if(isset($_POST['lastName']) && !empty($_POST['lastName'])){
    $resClts = Client::getClientByName($_POST['lastName']);
}

//pour la gestion du client selectionné pour la réservation

if(isset($_POST['selectedClt']) && !empty($_POST['selectedClt'])){
   

   //https://www.php.net/manual/fr/class.dateinterval.php
    $reservation = new Reservation();
    $reservation->setClientId($_POST['selectedClt'])
    ->setBookId($book['id'])
    ;
   
    Reservation::addReservation($reservation);
    // $reservation = Reservation::addReservation()
   
}

?>






<h1>Réservation de : <?= $book['title']?></h1>


<!-- insertion d'un formulaire de recherche pour le lecteur souhaité -->


<form action="" method="POST">
    <label class="form-label" for="searchClt">
        <input type="text" id="searchClt" name="lastName"   >
    Saississez le nom de l'usager emprunteur
    </label>
    <button  type="submit"  class="btn  btn-danger" >Rechercher</button>
      
</form>
<!-- Prise en compte des résultats du client -->
<?php if (isset($resClts) && !empty($resClts)):?>
   <form action="" method="POST">
   
    
   <?php foreach ($resClts as $suggclt): ?>
        <label class="form-label" for="client<?= $suggclt['id'] ?>">
            <input class="form-check-input" type="radio" id="client<?= $suggclt['id'] ?>" name="selectedClt" value="<?= $suggclt['id'] ?>"> 
            <?= $suggclt['lastName'].' '.$suggclt['firstName'] ?>
        </label><br />
       <?php endforeach ?>
 
    <button type="submit" class="btn btn-success">Sélectionner</button>';
 </form>
<?php endif ?>





