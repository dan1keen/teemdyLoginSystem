<?php
// 'item' object
class Item{
    public $result = array();
    // database connection and table name
    private $conn;
    private $table_name = "items";
    // object properties
    public $id;
    public $date;
    public $number;
    public $text1;
    public $text2;
    public $user_id;
    public $created;


 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

function create(){
 
    // to get time stamp for 'created' field
    $this->created=date('Y-m-d H:i:s');
 
    // insert query
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                date = :date,
                number = :number,
                text1 = :text1,
                text2 = :text2,
                user_id = :user_id,
                created = :created";
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->date=htmlspecialchars(strip_tags($this->date));
    $this->number=htmlspecialchars(strip_tags($this->number));
    $this->text1=htmlspecialchars(strip_tags($this->text1));
    $this->text2=htmlspecialchars(strip_tags($this->text2));
 
    // bind the values
    $stmt->bindParam(':date', $this->date);
    $stmt->bindParam(':number', $this->number);
    $stmt->bindParam(':text1', $this->text1);
    $stmt->bindParam(':text2', $this->text2);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->bindParam(':created', $this->created);

 
    
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }else{
        $this->showError($stmt);
        return false;
    }
 
}
public function show($from_record_num, $records_per_page){
    if(!empty($_SESSION['user_id'])){
        $query = "SELECT * FROM
                    " . $this->table_name . ",users
                WHERE
                    items.user_id = " . $_SESSION['user_id']. " AND users.id = items.user_id ORDER BY items.id DESC
            LIMIT ?, ?";
        // prepare query statement
        $result = $this->conn->prepare($query);
        // bind limit clause variables
        $result->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $result->bindParam(2, $records_per_page, PDO::PARAM_INT);
        // execute the query, also check if query was successful
        $result->execute();
            // else{
        //     $this->showError($res);
        //     return false;
        // }
        return $result;
    }
}
public function counter(){
    $query = "SELECT * FROM
                    " . $this->table_name . ",users
                WHERE
                    items.user_id = " . $_SESSION['user_id']. " AND users.id = items.user_id ";
    $result = $this->conn->query($query);
    $result->execute();
    $count = $result->rowCount();
    return $count;
}
public function showError($stmt){
    echo "<pre>";
        print_r($stmt->errorInfo());
    echo "</pre>";
}
}