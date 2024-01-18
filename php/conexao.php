<?php 
// contecta todos as files que o-incluem ao banco de dados 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_games";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Returns an array with each row as an object
    function get_result($stmt){
        $stmt->execute(); //Execute query
        $stmt->store_result(); //Store the results
        $num_rows = $stmt->num_rows; //Get the number of results
        $results = NULL;
        if($num_rows > 0){
            //Get metadata about the results
            $meta = $stmt->result_metadata();
            //Here we get all the column/field names and create the binding code
            $bind_code = "return mysqli_stmt_bind_result(\$stmt, ";
            while($_field = $meta->fetch_field()){
                $bind_code .= "\$row[\"".$_field->name."\"], ";
            }
            //Replace trailing ", " with ");"
            $bind_code = substr_replace($bind_code,");", -2);
            //Run the code, if it doesn't work return NULL
            if(!eval($bind_code)) { 
                $stmt->close(); 
                return NULL;
            }
            //This is where we create the object and add it to our final result array
            for($i=0;$i<$num_rows;$i++){
                //Gets the row by index
                $stmt->data_seek($i);
                //Update bound variables used in $bind_code with new row values
                $stmt->fetch();
                foreach($row as $key=>$value){
                    //Create array using the column/field name as the index
                    $_result[$key] = $value;
                }
                //Cast $_result to object and append to our final results
                $results[$i] = (object)$_result;
            }
        }
        $stmt->close(); 
        return $results;
    }
?>
