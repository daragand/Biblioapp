#!/bin/bash

# Crée les répertoires
mkdir -p assets/css
mkdir -p assets/js
mkdir -p classes
mkdir -p templates
mkdir -p config

# Crée le fichier index.php
touch index.php

# Ajout du contenu dans le fichier
echo "<?php 

require 'templates/header.html.php';

echo 'Bibliothèque en ligne';

require 'templates/footer.html.php';
" > index.php

# Crée le fichier style.css
touch assets/css/style.css

# Crée le fichier script.js
touch assets/js/script.js

# Crée le fichier de la classe Book.php
touch classes/Book.php

# Ajout du contenu dans le fichier
echo "<?php
class Book {
    private ?int \$id;
    private ?string \$title;
    private ?string \$author;
    private ?string \$description;
    private ?string \$cover;
    private ?string \$category;
    private ?int \$price;
    private ?int \$year;
    private ?string \$editor;
    private ?string \$language;
    private ?int \$pages;
    private ?string \$format;
    private ?string \$isbn;
    private ?bool \$active;
    private ?string \$slug;

    public function getId() {
        return \$this->id;
    }

    public function setId(\$id) {
        \$this->id = \$id;
        return \$this;
    }

    public function getTitle() {
        return \$this->title;
    }

    public function setTitle(\$title) {
        \$this->title = \$title;
        return \$this;
    }

    public function getAuthor() {
        return \$this->author;
    }

    public function setAuthor(\$author) {
        \$this->author = \$author;
        return \$this;
    }

    public function getDescription() {
        return \$this->description;
    }

    public function setDescription(\$description) {
        \$this->description = \$description;
        return \$this;
    }

    public function getCover() {
        return \$this->cover;
    }

    public function setCover(\$cover) {
        \$this->cover = \$cover;
        return \$this;
    }

    public function getCategory() {
        return \$this->category;
    }

    public function setCategory(\$category) {
        \$this->category = \$category;
        return \$this;
    }

    public function getPrice() {
        return \$this->price;
    }

    public function setPrice(\$price) {
        \$this->price = \$price;
        return \$this;
    }

    public function getYear() {
        return \$this->year;
    }

    public function setYear(\$year) {
        \$this->year = \$year;
        return \$this;
    }

    public function getEditor() {
        return \$this->editor;
    }

    public function setEditor(\$editor) {
        \$this->editor = \$editor;
        return \$this;
    }

    public function getLanguage() {
        return \$this->language;
    }

    public function setLanguage(\$language) {
        \$this->language = \$language;
        return \$this;
    }

    public function getPages() {
        return \$this->pages;
    }

    public function setPages(\$pages) {
        \$this->pages = \$pages;
        return \$this;
    }

    public function getFormat() {
        return \$this->format;
    }

    public function setFormat(\$format) {
        \$this->format = \$format;
        return \$this;
    }

    public function getIsbn() {
        return \$this->isbn;
    }

    public function setIsbn(\$isbn) {
        \$this->isbn = \$isbn;
        return \$this;
    }

    public function getActive() {
        return \$this->active;
    }

    public function setActive(\$active) {
        \$this->active = \$active;
        return \$this;
    }

    public function getSlug() {
        return \$this->slug;
    }

    public function setSlug(\$slug) {
        \$this->slug = \$slug;
        return \$this;
    }

}
" > classes/Book.php

# Crée le fichier de la classe Client.php
touch classes/Client.php

# Ajout du contenu dans le fichier
echo "<?php
class Client {
    private ?int \$id;
    private ?string \$firstname;
    private ?string \$lastname;
    private ?string \$email;
    private ?string \$password;
    private ?string \$address;
    private ?string \$city;
    private ?string \$zip;
    private ?string \$country;
    private ?string \$phone;

    public function getId() {
        return \$this->id;
    }

    public function setId(\$id) {
        \$this->id = \$id;
        return \$this;
    }

    public function getFirstname() {
        return \$this->firstname;
    }

    public function setFirstname(\$firstname) {
        \$this->firstname = \$firstname;
        return \$this;
    }

    public function getLastname() {
        return \$this->lastname;
    }

    public function setLastname(\$lastname) {
        \$this->lastname = \$lastname;
        return \$this;
    }

    public function getEmail() {
        return \$this->email;
    }

    public function setEmail(\$email) {
        \$this->email = \$email;
        return \$this;
    }

    public function getPassword() {
        return \$this->password;
    }

    public function setPassword(\$password) {
        \$this->password = \$password;
        return \$this;
    }

    public function getAddress() {
        return \$this->address;
    }

    public function setAddress(\$address) {
        \$this->address = \$address;
        return \$this;
    }

    public function getCity() {
        return \$this->city;
    }

    public function setCity(\$city) {
        \$this->city = \$city;
        return \$this;
    }

    public function getZip() {
        return \$this->zip;
    }

    public function setZip(\$zip) {
        \$this->zip = \$zip;
        return \$this;
    }

    public function getCountry() {
        return \$this->country;
    }

    public function setCountry(\$country) {
        \$this->country = \$country;
        return \$this;
    }

    public function getPhone() {
        return \$this->phone;
    }

    public function setPhone(\$phone) {
        \$this->phone = \$phone;
        return \$this;
    }
}
" > classes/Client.php

# Crée le fichier de la classe Reservation.php
touch classes/Reservation.php

# Ajout du contenu dans le fichier
echo "<?php
class Reservation {
    private ?int \$id;
    private ?int \$book_id;
    private ?int \$client_id;
    private ?string \$date_start;
    private ?string \$date_end;
    private ?string \$date_return;
    private ?string \$status;

    public function getId() {
        return \$this->id;
    }

    public function setId(\$id) {
        \$this->id = \$id;
        return \$this;
    }

    public function getBookId() {
        return \$this->book_id;
    }

    public function setBookId(\$book_id) {
        \$this->book_id = \$book_id;
        return \$this;
    }

    public function getClientId() {
        return \$this->client_id;
    }

    public function setClientId(\$client_id) {
        \$this->client_id = \$client_id;
        return \$this;
    }

    public function getDateStart() {
        return \$this->date_start;
    }

    public function setDateStart(\$date_start) {
        \$this->date_start = \$date_start;
        return \$this;
    }

    public function getDateEnd() {
        return \$this->date_end;
    }

    public function setDateEnd(\$date_end) {
        \$this->date_end = \$date_end;
        return \$this;
    }

    public function getDateReturn() {
        return \$this->date_return;
    }

    public function setDateReturn(\$date_return) {
        \$this->date_return = \$date_return;
        return \$this;
    }

    public function getStatus() {
        return \$this->status;
    }

    public function setStatus(\$status) {
        \$this->status = \$status;
        return \$this;
    }
}
" > classes/Reservation.php

# Crée le fichier template header.html.php
touch templates/header.html.php

# Ajout du contenu dans le fichier
echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Bibliothèque en ligne</title>
    <link rel=\"stylesheet\" href=\"assets/css/style.css\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css\" integrity=\"sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"/>
</head>
<body>
    <header>
        <h1>Bibliothèque en ligne</h1>
    </header>
    <main>
        <?= \$content ?>
" > templates/header.html.php

# Crée le fichier template books.html.php
touch templates/books.html.php

# Ajout du contenu dans le fichier
echo "<?php
require 'header.html.php';

/**
* Page des livres
*/


?>
" > templates/books.html.php

# Crée le fichier template book.html.php
touch templates/book.html.php

# Ajout du contenu dans le fichier
echo "<?php
require 'header.html.php';

/**
* Page d'un livre seul
*/


?>
" > templates/book.html.php

# Crée le fichier template footer.html.php
touch templates/footer.html.php

# Ajout du contenu dans le fichier
echo "</main>
    <footer>
        <p>&copy; 2023 - Bibliothèque en ligne</p>
    </footer>
    <script src=\"assets/js/script.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL\" crossorigin=\"anonymous\"></script>

</body>
</html>
" > templates/footer.html.php

# Message de fin
echo "Structure de dossier BiblioApp créée avec succès, enjoy !

\$\$\$\$\$\$\$\  \$\$\ \$\$\ \$\$\       \$\$\ \$\$\            \$\$\$\$\$\$\                      
\$\$  __\$\$\ \$\$ |\__|\$\$ |      \$\$ |\__|          \$\$  __\$\$\                     
\$\$ |  \$\$ |\$\$ |\$\$\ \$\$\$\$\$\$\$\  \$\$ |\$\$\  \$\$\$\$\$\$\  \$\$ /  \$\$ | \$\$\$\$\$\$\   \$\$\$\$\$\$\  
\$\$\$\$\$\$\$\ |\$\$ |\$\$ |\$\$  __\$\$\ \$\$ |\$\$ |\$\$  __\$\$\ \$\$\$\$\$\$\$\$\ |\$\$  __\$\$\ \$\$  __\$\$\ 
\$\$  __\$\$\ \$\$ |\$\$ |\$\$ |  \$\$ |\$\$ |\$\$ |\$\$ /  \$\$ |\$\$  __\$\$ |\$\$ /  \$\$ |\$\$ /  \$\$ |
\$\$ |  \$\$ |\$\$ |\$\$ |\$\$ |  \$\$ |\$\$ |\$\$ |\$\$ |  \$\$ |\$\$ |  \$\$ |\$\$ |  \$\$ |\$\$ |  \$\$ |
\$\$\$\$\$\$\$  |\$\$ |\$\$ |\$\$\$\$\$\$\$  |\$\$ |\$\$ |\$\$\$\$\$\$  |\$\$ |  \$\$ |\$\$\$\$\$\$\$  |\$\$\$\$\$\$\$  |
\_______/ \__|\__|\_______/ \__|\__| \______/ \__|  \__|\$\$  ____/ \$\$  ____/ 
                                                        \$\$ |      \$\$ |      
                                                        \$\$ |      \$\$ |      
                                                        \__|      \__|      
"
