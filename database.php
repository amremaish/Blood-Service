<?php

require_once 'TableRoot.php';
require_once 'post.php';
require_once 'contact.php';
require_once 'comment.php';
class database {

    // database var 
    var $conn = null;

    function __construct() {
        // Create connection
        $this->conn = new mysqli("localhost", "root", "", "bloodsystem");
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function view($table) {
        $result = $this->conn->query("SELECT * FROM " . $table);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($table == "user") {
                    $user = new user();
                    $user->setId($row["id"]);
                    $user->setCity($row["city"]);
                    $user->setCountry($row["country"]);
                    $user->setName($row["name"]);
                    $user->setAge($row["age"]);
                    $user->setReceive_notifi($row["receive_notifi"]);
                    $user->setUser_type($row["user_type"]);
                    $user->setEmail_address($row["email_address"]);
                    $user->setPhone_no($row["phone_no"]);
                    $user->setPassword($row["password"]);
                    $myJSON = json_encode($user);
                    echo $myJSON;
                } else if ($table == "post") {
                    $post = new post();
                    $post->setTitle($row["title"]);
                    $post->setId($row["id"]);
                    $post->setCity($row["city"]);
                    $post->setCountry($row["country"]);
                    $post->setUser_ID($row["user_ID"]);
                    $post->setDescription($row["description"]);
                    $post->setFile_number($row["file_number"]);
                    $post->setPost_status($row["post_status"]);
                    $post->setHospital_name($row["hospital_name"]);
                    $post->setBlood_type($row["blood_type"]);
                    $post->setPatient_name($row["patient_name"]);
                    $myJSON = json_encode($post);
                    echo $myJSON;
                } else if ($table == "contact") {
                    $contact = new contact ();
                    $contact->setId($row["id"]);
                    $contact->setContent($row["content"]);
                    $myJSON = json_encode($contact);
                    echo $myJSON;
                } else if ($table == "comment") {
                    $comment = new comment ();
                    $comment->setId($row["id"]);
                    $comment->setComment($row["comment"]);
                    $comment->setPost_id($row["post_id"]);
                    $comment->setUser_id($row["user_id"]);
                    $comment->setNumber($row["number"]);
                     $comment->setSeen($row["seen"]);
                    $myJSON = json_encode($comment);
                    echo $myJSON;
                }
            }
        }
    }

    function delete($id, $table) {
        // sql to delete a record
        $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
        if ($this->conn->query($sql) === TRUE) {
            echo "1";
        } else {
            echo "0";
        }
    }
    function update(TableRoot $root, $table) {
        if ($table == "user") {
            $set = "age = " . "'" . $root->getAge() . "'" . " , user_type = " . "'" . $root->getUser_type() . "'" .
                    " , receive_notifi = " . "'" . $root->getReceive_notifi() . "'" . " , name = " . "'" . $root->getName() . "'" .
                    " , phone_no = " . "'" . $root->getPhone_no() . "'" . " , email_address = " . "'" . $root->getEmail_address() . "'" .
                    " , password = " . "'" . $root->getPassword() . "'" . " , city = " . "'" . $root->getCity() . "'" .
                    " , country = " . "'" . $root->getCountry() . "'";
        } else if ($table == "post") {
            $set = "user_ID = " . "'" . $root->getUser_ID() . "'" . " , title = " . "'" . $root->getTitle() . "'" .
                    " , description = " . "'" . $root->getDescription() . "'" . " , blood_type = " . "'" . $root->getBlood_type() . "'" .
                    " , file_number = " . "'" . $root->getFile_number() . "'" . " , city = " . "'" . $root->getCity() . "'" .
                    " , country = " . "'" . $root->getCountry() . "'" . " , hospital_name = " . "'" . $root->getHospital_name() . "'" .
                    " , post_status = " . "'" . $root->getPost_status() . "'"." , patient_name = " . "'" . $root->getPatient_name() . "'";
        } else if ($table == "contact") {
            $set = "content = " . "'" . $root->getContent() . "'";
        } else if ($table == "comment") {
            $set = "user_id = " . "'" . $root->getUser_id() . "'" . " , post_id = " . "'" . $root->getPost_id() . "'" .
                    " , number = " . "'" . $root->getNumber() . "'" . " , comment = " . "'" . $root->getComment() . "'".
                     " , seen = " . "'" . $root->getSeen() . "'";
        }

        $sql = "UPDATE " . $table . " SET " . $set . " WHERE id = " . $root->getId();
        if ($this->conn->query($sql) === TRUE) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function getNextNumberOfComment($post_id) {
        $result = $this->conn->query("SELECT * FROM comment");
        $max = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                if ($row["post_id"] == $post_id) {
                    $max = max((int) $row["number"], $max);
                }
            }
        }
        return $max + 1;
    }
    

    function insert(TableRoot $root, $table) {

        if ($table == "user") {
            $values = "'" . $root->getName() . "'," . "'" . $root->getPhone_no() . "'," . "'" . $root->getEmail_address() . "'," . "'" . $root->getPassword() . "',"
                    . "'" . $root->getAge() . "'," . "'" . $root->getCity() . "'," . "'" . $root->getCountry() . "'," . "'" . $root->getUser_type() . "',"
                    . "'" . $root->getReceive_notifi() . "'";
            $sql = "INSERT INTO " . $table . " (name, phone_no,email_address,password,age,city,country,user_type,receive_notifi)
                VALUES (" . $values . ")";
        } else if ($table == "post") {
            $values = "'" . $root->getUser_ID() . "'," . "'" . $root->getFile_number() . "'," . "'" . $root->getPost_status() . "'," . "'" . $root->getTitle() . "',"
                    . "'" . $root->getDescription() . "'," . "'" . $root->getBlood_type() . "'," . "'" . $root->getCity() . "'," . "'" . $root->getCountry() . "',"
                    . "'" . $root->getHospital_name() . "',"."'" . $root->getPatient_name() . "'";
            $sql = "INSERT INTO " . $table . " (user_ID, file_number,post_status,title,description,blood_type,city,country,hospital_name,patient_name)
                VALUES (" . $values . ")";
        } else if ($table == "contact") {
            $values = "'" . $root->getContent() . "'";
            $sql = "INSERT INTO " . $table . " (content)
                VALUES (" . $values . ")";
        } else if ($table == "comment") {
          $number = $this->getNextNumberOfComment($root->getPost_id()) ;
            $values = "'" . $root->getUser_id() . "'," . "'" . $root->getPost_id() . "'," 
                    . "'" . $number . "'," . "'" . $root->getComment() . "'," . "'" . $root->getSeen() . "'";
            $sql = "INSERT INTO " . $table . " (user_id,post_id,number,comment,seen)
                VALUES (" . $values . ")";
        }
        if ($this->conn->query($sql) === TRUE) {
            echo "1";
        } else {
            echo "0";
        }
    }


}
