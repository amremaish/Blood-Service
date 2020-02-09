
<?php

require_once 'database.php';
require_once 'user.php';
require_once 'post.php';
require_once 'contact.php';
require_once 'comment.php';
// method = Update or delete or insert or view  
// table = what is the table ( user or post or contact)
$method = $table = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = $_POST["method"];
    $table = $_POST["table"];
    $db = new database();

    // if table is user 
    if ($table == "user") {
        if ($method == "INSERT") {
            $user = new user();
            $user->setName($_POST["name"]);
            $user->setPhone_no($_POST["phone_no"]);
            $user->setEmail_address($_POST["email_address"]);
            $user->setPassword($_POST["password"]);
            $user->setAge($_POST["age"]);
            $user->setCity($_POST["city"]);
            $user->setCountry($_POST["country"]);
            $user->setUser_type($_POST["user_type"]);
            $user->setReceive_notifi($_POST["receive_notifi"]);
            $db->insert($user, $table);
        } else if ($method == "UPDATE") {
            $user = new user();
            $user->setId($_POST["id"]);
            $user->setName($_POST["name"]);
            $user->setPhone_no($_POST["phone_no"]);
            $user->setEmail_address($_POST["email_address"]);
            $user->setPassword($_POST["password"]);
            $user->setAge($_POST["age"]);
            $user->setCity($_POST["city"]);
            $user->setCountry($_POST["country"]);
            $user->setUser_type($_POST["user_type"]);
            $user->setReceive_notifi($_POST["receive_notifi"]);
            $db->update($user, $table);
        } elseif ($method == "DELETE") {
            $db->delete($_POST["id"], $table);
        } else if ($method == "VIEW") {
            $db->view($table);
        }
        // if table is post 
    } else if ($table == "post") {
        if ($method == "INSERT") {
            $post = new post();
            $post->setBlood_type($_POST["blood_type"]);
            $post->setUser_ID($_POST["user_ID"]);
            $post->setCity($_POST["city"]);
            $post->setPost_status($_POST["post_status"]);
            $post->setFile_number($_POST["file_number"]);
            $post->setDescription($_POST["description"]);
            $post->setHospital_name($_POST["hospital_name"]);
            $post->setCountry($_POST["country"]);
            $post->setTitle($_POST["title"]);
            $post->setPatient_name($_POST["patient_name"]);
            $db->insert($post, $table);
        } else if ($method == "UPDATE") {
            $post = new post();
            $post->setId($_POST["id"]);
            $post->setUser_ID($_POST["user_ID"]);
            $post->setPost_status($_POST["post_status"]);
            $post->setBlood_type($_POST["blood_type"]);
            $post->setCity($_POST["city"]);
            $post->setFile_number($_POST["file_number"]);
            $post->setDescription($_POST["description"]);
            $post->setHospital_name($_POST["hospital_name"]);
            $post->setCountry($_POST["country"]);
            $post->setPatient_name($_POST["patient_name"]);
            $post->setTitle($_POST["title"]);
            $db->update($post, $table);
        } elseif ($method == "DELETE") {
            $db->delete($_POST["id"], $table);
        } else if ($method == "VIEW") {
            $db->view($table);
        }
    } else if ($table == "contact") {
        if ($method == "INSERT") {
            $contact = new contact();
            $contact->setContent($_POST["content"]);
            $db->insert($contact, $table);
        } else if ($method == "UPDATE") {
            $contact = new contact();
            $contact->setId($_POST["id"]);
            $contact->setContent($_POST["content"]);
            $db->update($contact, $table);
        } elseif ($method == "DELETE") {
            $db->delete($_POST["id"], $table);
        } else if ($method == "VIEW") {
            $db->view($table);
        }
    } else if ($table == "comment") {
        if ($method == "INSERT") {
            $comment = new comment();
            $comment->setComment($_POST["comment"]);
            $comment->setPost_id($_POST["post_id"]);
            $comment->setUser_id($_POST["user_id"]);
            $comment->setSeen($_POST["seen"]);
            $db->insert($comment, $table);
        } else if ($method == "UPDATE") {
            $comment = new comment();
            $comment->setId($_POST["id"]);
            $comment->setComment($_POST["comment"]);
            $comment->setPost_id($_POST["post_id"]);
            $comment->setUser_id($_POST["user_id"]);
            $comment->setNumber($_POST["number"]);
            $comment->setSeen($_POST["seen"]);
            $db->update($comment, $table);
        } elseif ($method == "DELETE") {
            $db->delete($_POST["id"], $table);
        } else if ($method == "VIEW") {
            $db->view($table);
        }
    }
}


