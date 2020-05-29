<?php
    function getDb(){
        // return mysqli_connect("picachosystems.com", "sqldmp", "sqldmp123", "equipo2");
        return mysqli_connect("localhost", "root", "", "dogolove");
    }

    class User
    {
        public $name = '';
        public $lastName = '';
        public $username = '';
        public $id = 0;
        public $birthDate = '';
        public $bio = '';
        public $profile = '';
        public $hasDog = false;
        public $dogName = '';
        public $dogBirth = '';
        public $dogBreed = '';
        public $img = '';

        public function __construct($data) {
            $this->name = $data['name'];
            $this->lastName = $data['last_name'];
            $this->username= $data['user'];
            $this->id = $data['idusers'];
            $this->bio = $data['bio'];
            $this->profile = $data['profile_pic'];
            $this->birthDate = $data['birth_date'];
            $this->hasDog = $data['hasDog'];
            $this->dogName = $data['dog_name'];
            $this->dogBirth = $data['dog_birth'];
            $this->dogBreed = $data['dog_breed'];
            $this->img = $data['img'];
        }
    }

    function getUserInfo($id) {
        $conn = getDb();
        $sql = "SELECT * FROM users where idusers='$id'";
        $result = mysqli_query($conn, $sql);
        $conn->close();
        $data = $result->fetch_assoc();
        print_r($data);
        return new User($data);
    }