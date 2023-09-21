<?php


class Reservation {
    private ?int $id;
    private ?int $book_id;
    private ?int $client_id;
    private ?string $date_start;
    private ?string $date_end;
    private ?string $date_return;
    private ?bool $isClosed;
    private ?bool $isArchived;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getBookId() {
        return $this->book_id;
    }

    public function setBookId($book_id) {
        $this->book_id = $book_id;
        return $this;
    }

    public function getClientId() {
        return $this->client_id;
    }

    public function setClientId($client_id) {
        $this->client_id = $client_id;
        return $this;
    }

    public function getDateStart() {
        return $this->date_start;
    }

    public function setDateStart($date_start) {
        $this->date_start = $date_start;
        return $this;
    }

    public function getDateEnd() {
        return $this->date_end;
    }

    public function setDateEnd() {
        $dateEnd=new DateTime('now');
        //on rajoute 28 jours pour la date de retour. une info qui pourrait être variable par la suite
        $dateEnd = $dateEnd->add(new DateInterval('P28D'));
        $date_end=$dateEnd->format('Y-m-d');
        $this->date_end = $date_end;
        return $this;
    }

    public function getDateReturn() {
        return $this->date_return;
    }

    public function setDateReturn($date_return) {
        $this->date_return = $date_return;
        return $this;
    }

    public function getIsClosed() {
        return $this->isClosed;
    }

    public function setIsClosed($isClosed) {
        $this->isClosed = $isClosed;
        return $this;
    }
    public function getIsArchived() {
        return $this->isArchived;
    }

    public function setIsArchived($isArchived) {
        $this->isArchived = $isArchived;
        return $this;
    }

    public static function addReservation($obj):void{
        $sql="INSERT INTO clients_books_reservations (book_id,client_id,date_start,date_end, date_return,isClosed,isArchived)
        VALUES (:book_id,:client_id,:date_start, :date_end,:date_return,:isClosed,:isArchived);
        ";
        //prise en compte de la date du jour pour calculer la date de retour
        $dateStart = new DateTime('now');
        $dateEnd=new DateTime('now');
        $dateEnd = $dateEnd->add(new DateInterval('P28D'));
        $dateStart=$dateStart->format('Y-m-d');
        $dateEnd=$dateEnd->format('Y-m-d');
        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare($sql);

        //On lie les valeurs de l'objet aux paramètres de la requête SQL. $this est souligné car il ne connait pas encore l'objet

        $query->bindValue(':book_id',$obj->getBookId(), PDO::PARAM_STR);
        $query->bindValue(':client_id',$obj->getClientId(), PDO::PARAM_STR);
        $query->bindValue(':date_start',$dateStart, PDO::PARAM_STR);
        $query->bindValue(':date_end',$dateEnd, PDO::PARAM_STR);
        $query->bindValue(':date_return',null, PDO::PARAM_INT);
        $query->bindValue(':isClosed',false, PDO::PARAM_STR);
        $query->bindValue(':isArchived',false, PDO::PARAM_STR);

        $query->execute();

        if ($query === true){
            //on redirige vers la même page avec un message de succès
            header('Location : reservations.php?success=1');
        }else{
            //on redirige vers la même page avec un message d'erreur
            header('Location : reservations.php?success=0');
        }
    }
//récupération des réservations
    public static function getCurrentReservation():array{
        //requête SQL pour récupérer les livres et les utilisateurs qui ont effectués une réservation mais en limitant à 20 résultats. Pour la partie Dashbord.

        $sql = "SELECT cbr.*, c.firstname, c.lastname, b.title, b.author FROM clients_books_reservations AS cbr
        LEFT JOIN client AS c ON cbr.client_id = c.id
        LEFT JOIN book AS b ON cbr.book_id = b.id
        WHERE cbr.isClosed = 0 AND cbr.isArchived = 0
        ORDER BY cbr.date_start;
        LIMIT 20";


        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare($sql);
        $query->execute();
        $reservations = $query->fetchAll(PDO::FETCH_ASSOC);

        //on retourne les livres
        return $reservations;
    }
    //récupération de l'ensemble des réservation
    public static function getALLReservations():array{
        //requête SQL pour récupérer toutes les réservations.

        $sql = "SELECT cbr.*, c.firstname, c.lastname, b.title, b.author FROM clients_books_reservations AS cbr
        LEFT JOIN client AS c ON cbr.client_id = c.id
        LEFT JOIN book AS b ON cbr.book_id = b.id
        ORDER BY cbr.isArchived,cbr.isClosed,cbr.date_start;";


        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare($sql);
        $query->execute();
        $reservations = $query->fetchAll(PDO::FETCH_ASSOC);

        //on retourne les livres
        return $reservations;
    }
    
    //enregistrement du retour du livre
    public static function returnResa($id){
        $sql = "UPDATE clients_books_reservations SET isClosed=1, date_return=:dateRetour
        WHERE id=:id;";

        $dateRetour = (new DateTime('now'))->format('Y-m-d');
        
        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare($sql);
        $query->bindValue(':id',$id, PDO::PARAM_INT);
        $query->bindValue(':dateRetour',$dateRetour,PDO::PARAM_STR);
        

        $query->execute();
        //redirecation vers reservations.php
        header('Location:/reservations.php');
    }
}

