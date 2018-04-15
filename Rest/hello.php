<?php
require("Toro.php");

class DBHandler {
    function get() {
        try {
          $dbh = new PDO('sqlite:books.db');
        } catch (Exception $e) {
          die("Unable to connect: " . $e->getMessage());
        }
        try {

            $stmt = $dbh->prepare('SELECT * FROM books');
            $stmt->execute();

            $data = Array();
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $result;
            }
            echo json_encode($data);
        } catch (Exception $e) {
          echo "Failed: " . $e->getMessage();
        }
    }
}

Toro::serve(array(
    "/country" => "DBHandler",
));
?>