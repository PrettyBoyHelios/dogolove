<?php
if(isset($_POST['yay'])) { 
    addMatch($_POST['idUser'],$_POST['idOther']); 
} 

function getDb(){
    return mysqli_connect("picachosystems.com", "sqldmp", "sqldmp123", "equipo2");
    // return mysqli_connect("localhost", "root", "", "equipo2");
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
    return new User($data);
}

function updateUserInfo($user){
    $conn = getDb();
    $sql = "UPDATE users SET user='$user->username',name='$user->name',last_name='$user->lastName',birth_date='$user->birthDate',bio='$user->bio',profile_pic='$user->profile',hasDog='$user->hasDog',dog_name='$user->dogName',dog_birth='$user->dogBirth',dog_breed='$user->dogBreed',img='$user->img' WHERE idusers=" . $user->id;
    $result = mysqli_query($conn, $sql);
    $conn->close();
}

function getOtherProfiles($user){
    $conn = getDb();
    $sql = "SELECT * FROM users WHERE idusers !='$user->id' and hasDog = 1 ORDER BY RAND() LIMIT 1";
        //$sql = "SELECT * FROM users WHERE idusers !=" . $user->id . " and hasDog = 1";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_array(MYSQLI_ASSOC);
    return new User($data);
}

function getUserAge($user){
    $date1 = strtotime($user->birthDate);
    $date2 = time();
    $diff = abs($date2-$date1);
    return floor($diff / (365*60*60*24));
}

function getDogAge($user){
    $date1 = strtotime($user->dogBirth);
    $date2 = time();
    $diff = abs($date2-$date1);
    return floor($diff / (365*60*60*24));
}

function getMatches($user){
    $conn = getDb();
    $sql = "SELECT * FROM matches WHERE (user_id = '$user->id' OR target_id = '$user->id') and match_approved = 1 ORDER BY timestamp";
        // fOR CONFIRMED MATCHES// "SELECT * FROM matches WHERE (user_id = 1 OR target_id = 1) AND match_approved = 1 ORDER BY timestamp"
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_assoc()) {
        if ($row['user_id'] == $user->id){
            $matchUser = getUserInfo($row['target_id']);
        } else {
            $matchUser = getUserInfo($row['user_id']);
        }
        $matchComponent = "
        <div class=\"card\" style=\"width: 100%; border-radius: 20px;margin-top: 10px;\">
        <div class=\"row\" style=\"margin-left: 5px;\">
        <img src=\"images/$matchUser->profile\" alt=\"...\" class=\"avatar\">
        <img src=\"images/$matchUser->img\" alt=\"...\" class=\"avatar\">
        </div>
        <div class=\"card-body\">
        <h5 class=\"card-title\">$matchUser->name & $matchUser->dogName want to meet you!</h5>
        <p class=\"card-text\">$matchUser->bio</p>
        <a type=\"button\" class=\"btn\" style=\"background-color: darkgreen\" href=\"https://wa.me/$matchUser->phone\"><i class=\"fab fa-whatsapp\"></i> Contact</a>
        </div>
        </div>
        ";
        echo $matchComponent;
    }
    return $result->fetch_array(MYSQLI_NUM);
}

function addMatch($idUser, $idOther){
    $conn = getDb();

    // $sql = "IF  EXISTS (SELECT * FROM matches WHERE user_id = '$idUser') OR 
    //             EXISTS (SELECT * FROM matches WHERE target_id = '$idOther')
    //         THEN
    //             UPDATE matches SET match_approved = 1 where user_id = '$idUser';
    //         ELSE
    //             INSERT INTO matches (user_id, target_id, match_approved) VALUES ('$idUser', '$idOther', 0);
    //         END IF";
    $x = "matching".rand(1,100)."";
    $sql = "
            create procedure $x()
              begin
                if (
                  exists (
                    select *
                    from matches
                    where user_id = '$idUser'
                  )
                  or exists (
                    select *
                    from matches
                    where target_id = '$idOther'
                  )
                ) then
                  update matches
                  set match_approved = 1
                  where user_id = '$idUser';
                else
                  insert into matches (
                    user_id,
                    target_id,
                    match_approved
                  )
                  values (
                    '$idUser', 
                    '$idOther', 
                    0
                  );
                end if;
              end;";

    if (mysqli_query($conn, $sql)) {} else {}
        
    // $sql = "IF  EXISTS (SELECT * FROM matches WHERE user_id = '$idUser') OR 
    //             EXISTS (SELECT * FROM matches WHERE target_id = '$idOther')
    //         THEN
    //             UPDATE matches SET match_approved = 1 where user_id = '$idUser';
    //         ELSE
    //             INSERT INTO matches (user_id, target_id, match_approved) VALUES ('$idUser', '$idOther', 0);
    //         END IF";
}