<?php
require 'config/Connect.php';

//Chargement de la classe Slug
require 'services/Slug.php';

class Book {
    private ?int $id;
    private ?string $title;
    private ?string $author;
    private ?string $description;
    private ?string $cover;
    private ?string $category;
    private ?int $price;
    private ?int $year;
    private ?string $editor;
    private ?string $language;
    private ?int $pages;
    private ?string $format;
    private ?string $isbn;
    private ?bool $active;
    private ?string $slug;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getCover() {
        return $this->cover;
    }

    public function setCover($cover) {
        $this->cover = $cover;
        return $this;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
        return $this;
    }

    public function getEditor() {
        return $this->editor;
    }

    public function setEditor($editor) {
        $this->editor = $editor;
        return $this;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function setLanguage($language) {
        $this->language = $language;
        return $this;
    }

    public function getPages() {
        return $this->pages;
    }

    public function setPages($pages) {
        $this->pages = $pages;
        return $this;
    }

    public function getFormat() {
        return $this->format;
    }

    public function setFormat($format) {
        $this->format = $format;
        return $this;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
        return $this;
    }

    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
        return $this;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($slug) {
        $res= Slug::toSlug($slug);
        $this->slug = $res;
        return $this;
    }

//une fonction static qui retournera tous les livres. en placant :array, on spécifie le type de donné attendu sortie. void si aucun élément n'est attendu en sortie
    public static function getBooks():array{
        //requête SQL pour récupérer tous les livres

        $sql="SELECT * FROM book";

        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare($sql);
        $query->execute();
        $books = $query->fetchAll(PDO::FETCH_ASSOC);

        //on retourne les livres
        return $books;
    }
//une fonction static qui retournera un seul livre via le 
    public static function getOneBook($slug):array{

        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare('SELECT * FROM book Where slug=:slug');
        $query->bindValue(':slug',$slug, PDO::PARAM_STR);
        $query->execute();
        //on récupère le livre
        return $query->fetch(PDO::FETCH_ASSOC);

        
    }
    //une fonction static pour ajouter un livre
    public static function addBook($obj):void{
        $sql="INSERT INTO book (title,author,category,description, year,isbn,slug)
        VALUES (:title,:author,:category, :description,:year,:isbn,:slug);
        ";

        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare($sql);

        //On lie les valeurs de l'objet aux paramètres de la requête SQL. $this est souligné car il ne connait pas encore l'objet

        $query->bindValue(':title',$obj->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':author',$obj->getAuthor(), PDO::PARAM_STR);
        $query->bindValue(':category',$obj->getCategory(), PDO::PARAM_STR);
        $query->bindValue(':description',$obj->getDescription(), PDO::PARAM_STR);
        $query->bindValue(':year',$obj->getYear(), PDO::PARAM_INT);
        $query->bindValue(':isbn',$obj->getIsbn(), PDO::PARAM_STR);
        $query->bindValue(':slug',$obj->getSlug(), PDO::PARAM_STR);

        $query->execute();

        if ($query === true){
            //on redirige vers la même page avec un message de succès
            header('Location : books.php?success=1');
        }else{
            //on redirige vers la même page avec un message d'erreur
            header('Location : books.php?success=0');
        }
    }

    public static function editBook($obj,$id):void{
        $sql="UPDATE book SET 
        title = :title,
        author = :author,
        category = :category,
        description = :description,
        year = :year,
        isbn = :isbn,
        slug = :slug
    WHERE id = :id;
    
        ";

        //on exécute la connexion à la base de donnée
        $db=Connect::Connect();

        //on exécute la requête
        $query=$db->prepare($sql);

        //On lie les valeurs de l'objet aux paramètres de la requête SQL. $this est souligné car il ne connait pas encore l'objet

        $query->bindValue(':title',$obj->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':author',$obj->getAuthor(), PDO::PARAM_STR);
        $query->bindValue(':category',$obj->getCategory(), PDO::PARAM_STR);
        $query->bindValue(':description',$obj->getDescription(), PDO::PARAM_STR);
        $query->bindValue(':year',$obj->getYear(), PDO::PARAM_INT);
        $query->bindValue(':isbn',$obj->getIsbn(), PDO::PARAM_STR);
        $query->bindValue(':slug',$obj->getSlug(), PDO::PARAM_STR);
        $query->bindValue(':id',$id, PDO::PARAM_INT);

        $query->execute();

        header('Location: book.php?slug='.$obj->getSlug());
    }


    //une fonction static pour supprimer un livre
    public static function deleteBook($id):void{
 //on exécute la connexion à la base de donnée
 $db=Connect::Connect();

 //on exécute la requête de suppression
 $query=$db->prepare('DELETE FROM book Where id=:id');
 $query->bindValue(':id',$id, PDO::PARAM_INT);
 $query->execute();
 header('Location: /books.php');

    }
}

