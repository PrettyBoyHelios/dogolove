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
        public $phone = '';
        public $hasDog = false;
        public $dogName = '';
        public $dogBirth = '';
        public $dogBreed = '';
        public $img = '';

        public function __construct($data) {
            $this->name = $data['name'];
            $this->lastName = $data['last_name'];
            $this->username = $data['user'];
            $this->phone = $data['phone'];
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
        //print_r($data);
        return new User($data);
    }

    function updateUserInfo($user){
        $conn = getDb();
        $sql = "UPDATE users SET user='$user->username',name='$user->name',last_name='$user->lastName',birth_date='$user->birthDate',bio='$user->bio',profile_pic='$user->profile',hasDog='$user->hasDog',dog_name='$user->dogName',dog_birth='$user->dogBirth',dog_breed='$user->dogBreed',img='$user->img' WHERE idusers=" . $user->id;
        echo $sql;
        $result = mysqli_query($conn, $sql);
        $conn->close();
    }

    function getOtherProfiles($user){
        $conn = getDb();
        $sql = "SELECT * FROM users WHERE idusers !=" . $user->id;
        $result = mysqli_query($conn, $sql);
        $data = $result->fetch_array(MYSQLI_NUM);
        return $data;
    }

    function getUserAge($user){
        $date1 = date("Y-M-d", strtotime($user->birthDate));
        $date2 = date("Y-M-d", time());

        $d1 = DateTime::createFromFormat("Y-M-d", $date1);
        $d2 = DateTime::createFromFormat("Y-M-d", $date2);

// Formulate the Difference between two dates
        $diff = abs($d2-$d1);
        return floor($diff / (365*60*60*24));
    }