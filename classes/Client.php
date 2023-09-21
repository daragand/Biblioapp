<?php


class Client {
    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $email;
    private ?string $phone;
    private ?string $year;
    private ?string $address;
    private ?string $city;
    private ?string $country;
    private ?string $deposit;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
        return $this;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }
    public function getDeposit() {
        return $this->deposit;
    }

    public function setDeposit($deposit) {
        $this->deposit = $deposit;
        return $this;
    }
// pour récupérer la liste complète des clients
    public static function getClients():array{
        //requête SQL pour récupérer tous les livres

        $sql="SELECT * FROM client
        ORDER BY lastname";

        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare($sql);
        $query->execute();
        $clients = $query->fetchAll(PDO::FETCH_ASSOC);

        //on retourne les livres
        return $clients;
    }

    //pour récupérer un client spécifique
    public static function getOneClient($id):array{

        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare('SELECT * FROM client Where id=:id');
        $query->bindValue(':slug',$id, PDO::PARAM_STR);
        $query->execute();
        //on récupère le livre
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    //fonction pour permettre le prêt par le nom. A lier au fichier JS avec l'idée du onChange.voir fonction handleClientId() et page reserver.php
    public static function getClientByName($name):array{

        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête en précisant que le nom peut avoir une troncature ainsi si le nom est difficile à écrire on simplifie la saisie d'où les pourcentages
        $query=$db->prepare('SELECT * FROM client WHERE lastname LIKE :name');
        $name ='%' . $name . '%';
        $query->bindValue(':name',$name, PDO::PARAM_STR);
        $query->execute();
        //on récupère le livre
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }



    //inscription d'un client
    public static function addClient($clt):void{
        $sql="INSERT INTO client (id,
        firstName,
        lastName,
        address,
        city,
        country,
        year,
        deposit)
        VALUES (:id,:firstName,:lastName,:address,:city,:country,:year,:deposit);";

        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare($sql);

        //On lie les valeurs de l'objet aux paramètres de la requête SQL. $this est souligné car il ne connait pas encore l'objet

        $query->bindValue(':firstName',$clt->getFirstname(), PDO::PARAM_STR);
        $query->bindValue(':lastName',$clt->getLastname(), PDO::PARAM_STR);
        $query->bindValue(':address',$clt->getAddress(), PDO::PARAM_STR);
        $query->bindValue(':city',$clt->getCity(), PDO::PARAM_STR);
        $query->bindValue(':country',$clt->getCountry(), PDO::PARAM_INT);
        $query->bindValue(':year',$clt->getYear(), PDO::PARAM_STR);
        $query->bindValue(':deposit',$clt->getSlug(), PDO::PARAM_STR);

        $query->execute();

        if ($query === true){
            //on redirige vers la même page avec un message de succès
            header('Location : books.php?success=1');
        }else{
            //on redirige vers la même page avec un message d'erreur
            header('Location : books.php?success=0');
        }
    }
}

