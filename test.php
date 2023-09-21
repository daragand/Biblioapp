<?php

// require 'classes/Book.php';

// foreach(Book::getBooks() as $book){
//     echo $book['title'].'<br />';
// };

require_once 'services/Slug.php';

echo Slug::toSlug('Bonjour mon pote');