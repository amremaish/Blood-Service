<?php
require_once 'TableRoot.php';
class user extends TableRoot{

    // user table var
    var  $age, $user_type, $receive_notifi;
    var $name, $phone_no, $email_address, $password, $city, $country;


    function getAge() {
        return $this->age;
    }

    function getUser_type() {
        return $this->user_type;
    }

    function getReceive_notifi() {
        return $this->receive_notifi;
    }

    function getName() {
        return $this->name;
    }

    function getPhone_no() {
        return $this->phone_no;
    }

    function getEmail_address() {
        return $this->email_address;
    }

    function getPassword() {
        return $this->password;
    }

    function getCity() {
        return $this->city;
    }

    function getCountry() {
        return $this->country;
    }


    function setAge($age) {
        $this->age = $age;
    }

    function setUser_type($user_type) {
        $this->user_type = $user_type;
    }

    function setReceive_notifi($receive_notifi) {
        $this->receive_notifi = $receive_notifi;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPhone_no($phone_no) {
        $this->phone_no = $phone_no;
    }

    function setEmail_address($email_address) {
        $this->email_address = $email_address;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setCountry($country) {
        $this->country = $country;
    }

}
