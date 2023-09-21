<?php

// require_once 'vendor/autoload.php';
require_once 'classes/Book.php';
// use Faker\Factory;

/**
 * DONE: PDO
 * TODO: FakerPHP
 * TODO: Boucle pour créer des livres
 */

// PDO
$db_name = 'biblioapp';
$db_user = 'root';
$db_pass = 'root';
$db_host = '127.0.0.1:3306';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion à la base de données réussie";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}


// // FakerPHP
// $faker = Factory::create('fr_FR');

// // Création de la table books
// $sqlBook = "CREATE TABLE IF NOT EXISTS books (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(255) NOT NULL,
//     author VARCHAR(255) NOT NULL,
//     description TEXT,
//     cover VARCHAR(255),
//     category VARCHAR(255) NOT NULL,
//     price INT,
//     year INT NOT NULL,
//     editor VARCHAR(255),
//     language VARCHAR(255),
//     pages INT,
//     format VARCHAR(255),
//     isbn VARCHAR(13) NOT NULL,
//     active BOOLEAN,
//     slug VARCHAR(255) NOT NULL
// );";
// // Création de la table books
// $sqlClient = $db->prepare("CREATE TABLE IF NOT EXISTS client (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     firstName VARCHAR(255) NOT NULL,
//     lastName VARCHAR(255) NOT NULL,
//     address VARCHAR(255),
//     city VARCHAR(255),
//     country VARCHAR(255),
//     year INT NOT NULL,
//     deposit BOOLEAN
// );");

// $sqlClient->execute();

// for ($i=0;$i<50;$i++){
//     $client= $db->prepare("INSERT INTO client (
//         firstName,
//         lastName,
//         address,
//         city,
//         country,
//         year,
//         deposit
//     ) VALUES (
//         '" . $faker->firstName() . "',
//         '" . $faker->lastName() . "',
//         '" . $faker->address() . "',
//         '" . $faker->city() . "',
//         'France',
//         " . $faker->numberBetween(1950, 2023) . ",
//         " . ($faker->boolean() ? 1 : 0) . "
//     )");
//     $client->execute();
//     echo 'Client N°'.$i.' créé<br>';
//     if($i===49){
//         echo'c\'est bientôt fini<br>';
//     }
// }

//création de la table réservation : 
$sqlReservation = $db->prepare("CREATE TABLE IF NOT EXISTS clients_books_reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    client_id INT,
    date_start DATE,
    date_end DATE,
    date_return DATE,
    isClosed BOOLEAN,
    isArchived BOOLEAN,
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (client_id) REFERENCES clients(id)
);
");
$sqlReservation->execute();




// $sqlBook = "INSERT INTO Book (title, author, description, cover, category, price, year, editor, language, pages, format, isbn, active, slug) VALUES (:title, :author, :description, :cover, :category, :price, :year, :editor, :language, :pages, :format, :isbn, :active, :slug);";



// for ($i=0; $i < 100; $i++) { 
    // $book = new Book();
    // $book->setTitle($faker->sentence(3));
    // $book->setAuthor($faker->name());
    // $book->setDescription($faker->text(200));
    // $book->setCover($faker->imageUrl(200, 300));
    // $book->setCategory($faker->randomElement(['roman', 'poésie', 'théâtre', 'essai', 'biographie']));
    // $book->setPrice($faker->numberBetween(5, 30));
    // $book->setYear($faker->numberBetween(1900, 2021));
    // $book->setEditor($faker->company());
    // $book->setLanguage($faker->randomElement(['français', 'anglais', 'espagnol', 'italien']));
    // $book->setPages($faker->numberBetween(50, 500));
    // $book->setFormat($faker->randomElement(['poche', 'broché', 'relié']));
    // $book->setIsbn($faker->isbn13());
    // $book->setActive($faker->boolean());
    // $book->setSlug($faker->slug());

    // $stmt = $db->prepare($sqlBook);
    // $stmt->bindValue(':title', $book->getTitle());
    // $stmt->bindValue(':author', $book->getAuthor());
    // $stmt->bindValue(':description', $book->getDescription());
    // $stmt->bindValue(':cover', $book->getCover());
    // $stmt->bindValue(':category', $book->getCategory());
    // $stmt->bindValue(':price', $book->getPrice());
    // $stmt->bindValue(':year', $book->getYear());
    // $stmt->bindValue(':editor', $book->getEditor());
    // $stmt->bindValue(':language', $book->getLanguage());
    // $stmt->bindValue(':pages', $book->getPages());
    // $stmt->bindValue(':format', $book->getFormat());
    // $stmt->bindValue(':isbn', $book->getIsbn());
    // $stmt->bindValue(':active', $book->getActive());
    // $stmt->bindValue(':slug', $book->getSlug());
    
    // $stmt->execute();
    
    echo 'C\est fait n'.$i;
//}
