<?php
 
  // Set default timezone
  date_default_timezone_set('UTC');
 
  try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    $books_db = new PDO('sqlite:books.db');
    // Set errormode to exceptions
    $books_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);

    /**************************************
    * Set initial data                    *
    **************************************/
 /*
    // Array with some test data to insert to database             
    $books = array(
                  array('title_id' => 1,
                        'title' => 'nutshell',
                        'pages' => 112),
                  array('title_id' => 2,
                        'title' => 'classic',
                        'pages' => 1339428612),
                );

    $authors = array(
                  array('authors_id' => null,
                        'tittle_id' => 1,
                        'author' => 'authornutshell'),
                  array('authors_id' => null,
                        'tittle_id' => 1,
                        'author' => 'authornutshell'),
                  array('authors_id' => null,
                        'tittle_id' => 2,
                        'author' => 'authorclassic'),
                  array('authors_id' => null,
                        'tittle_id' => 2,
                        'author' => 'authorclassic'),
                );
*/
    /**************************************
    * Play with databases and tables      *
    **************************************/
 /*
    // Prepare INSERT statement to SQLite3 file db
    $insert = "INSERT INTO books (title_id, title, pages) 
                VALUES (:title_id, :title, :pages)";
    $stmt = $books_db->prepare($insert);
 
    // Bind parameters to statement variables
    $stmt->bindParam(':title_id', $title_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':pages', $pages);
 
    // Loop thru all messages and execute prepared insert statement
    foreach ($books as $m) {
      // Set values to bound variables
      $title_id = $m['title_id'];
      $title = $m['title'];
      $pages = $m['pages'];
 
      // Execute statement
      $stmt->execute();
    }


    // Prepare INSERT statement to SQLite3 file db
    $insert = "INSERT INTO authors (authors_id, tittle_id, author) 
                VALUES (:authors_id, :tittle_id, :author)";
    $stmt = $books_db->prepare($insert);
 
    // Bind parameters to statement variables
    $stmt->bindParam(':authors_id', $authors_id);
    $stmt->bindParam(':tittle_id', $tittle_id);
    $stmt->bindParam(':author', $author);
 
    // Loop thru all messages and execute prepared insert statement
    foreach ($authors as $m) {
      // Set values to bound variables
      $authors_id = $m['authors_id'];
      $tittle_id = $m['tittle_id'];
      $author = $m['author'];
 
      // Execute statement
      $stmt->execute();
    }
 */

    $result = $books_db->query('SELECT * FROM books');

    foreach($result as $row) {
      $newPages = $row['pages']+100; 
      $currentTitleId = $row['title_id'];
      $update = "UPDATE books SET pages = {$newPages} 
                WHERE title_id = {$currentTitleId}";
    // Execute update
      $books_db->exec($update);
    }

    
    // Select all data from memory db messages table 
    $result = $books_db->query('SELECT * FROM books');

    foreach($result as $row) {
      echo "title_id: " . $row['title_id'] . "<br/>";
      echo "title: " . $row['title'] . "<br/>";
      echo "pages: " . $row['pages'] . "<br/>";
      echo "<br/>";
      $result2 = $books_db->query('SELECT * FROM authors where tittle_id ='.$row['title_id']);
      foreach($result2 as $row) {
        echo "authors_id: " . $row['authors_id'] . "<br/>";
        echo "tittle_id: " . $row['tittle_id'] . "<br/>";
        echo "author: " . $row['author'] . "<br/>";
        echo "<br/>";
      }
    }

    /**************************************
    * Close db connections                *
    **************************************/
 
    // Close file db connection
    $books_db = null;
    // Close memory db connection
    $memory_db = null;
  }
  catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }


?>