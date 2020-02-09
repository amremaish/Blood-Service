<?php

require_once 'TableRoot.php';

class post extends TableRoot {

    //post table var
    var $user_ID, $file_number, $post_status , $patient_name;
    var $title, $description, $blood_type, $city, $country, $hospital_name;

    function getUser_ID() {
        return $this->user_ID;
    }

    function getFile_number() {
        return $this->file_number;
    }

    function getPost_status() {
        return $this->post_status;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getBlood_type() {
        return $this->blood_type;
    }

    function getCity() {
        return $this->city;
    }

    function getCountry() {
        return $this->country;
    }

    function getHospital_name() {
        return $this->hospital_name;
    }

    function setUser_ID($user_ID) {
        $this->user_ID = $user_ID;
    }

    function setFile_number($file_number) {
        $this->file_number = $file_number;
    }

    function setPost_status($post_status) {
        $this->post_status = $post_status;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setBlood_type($blood_type) {
        $this->blood_type = $blood_type;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setHospital_name($hospital_name) {
        $this->hospital_name = $hospital_name;
    }

    function getPatient_name() {
        return $this->patient_name;
    }

    function setPatient_name($patient_name) {
        $this->patient_name = $patient_name;
    }


    
    
}
