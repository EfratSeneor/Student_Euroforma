<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * database_connection
 */

include 'data_connection.php';

class Pdo_euroforma
{
    private static $pdo;
    private static $database_euroforma = null;

    public function __construct() 
    {
        Pdo_euroforma::$pdo = new PDO("mysql:host=".SERVERNAME.";"
                . "dbname=".DBNAME.";charset:utf8", USERNAME, PASSWORD);
    }

    public static function getBdEuroforma()
    {
        if (Pdo_euroforma::$database_euroforma == null) {
            Pdo_euroforma::$database_euroforma = new Pdo_euroforma();
        }
        return Pdo_euroforma::$database_euroforma;
    }

    public function __destruct()
    {
        Pdo_euroforma::$pdo = null;
    }
    
    /**
     * Function that returns in table form all the information of a user according to an email
     * 
     * @param String $email         User email
     * @return Array                Array of user information
     */
    public function get_user_information($email)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT user.id AS id, user.title as title, user.name AS name, '
            . 'user.forename AS forename, user.password AS password, is_admin AS is_admin '
            . 'FROM user '
            . 'WHERE user.email = :an_email '
        );
        $requetePrepare->bindParam(':an_email', $email, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
    
    public function clean_all_connections()
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            ' DELETE '
            . 'FROM connection '
            . 'WHERE TIMESTAMPDIFF(HOUR, date_time, CURTIME()) >= 24  '
        );
        $requetePrepare->execute();
    }
    
    /**
     * Function that returns the number of connections for an email and a IP adress 
     * 
     * @param String $email         User email
     * @param String $ip            User IP adress
     * @return int                  Number of connections
     */
    public function get_count_connections($email, $ip) 
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT count(*) as number '
            . 'FROM connection '
            . 'WHERE login= :a_login AND IP_adress= :an_ip '
        );
        $requetePrepare->bindParam(':a_login', $email, PDO::PARAM_STR);
        $requetePrepare->bindParam(':an_ip', $ip, PDO::PARAM_STR);    
        $requetePrepare->execute();
        $return = $requetePrepare->fetch();
        return $return['number'];
    }
    
    /**
     * Function that saves a new connection in the connection table
     * @param type $email
     * @param type $user_ip
     */
    public function save_connection($email, $user_ip)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            ' INSERT INTO connection (date_time, IP_adress, login) '
            . 'VALUES(CURTIME(), :an_adress, :a_login) '
        );
        $requetePrepare->bindParam(':an_adress', $user_ip, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_login', $email, PDO::PARAM_STR);
        $requetePrepare->execute();
    }
    
    /**
     * Function that deletes from the connection table all the last connections of a user
     * @param type $email
     * @param type $user_ip
     */
    public function delete_connections($email, $user_ip)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            ' DELETE '
            . 'FROM connection '
            . 'WHERE connection.login = :a_login AND connection.IP_adress = :an_adress'
        );
        $requetePrepare->bindParam(':an_adress', $user_ip, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_login', $email, PDO::PARAM_STR);
        $requetePrepare->execute();
    }
    
    public function get_all_users()
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT * '
            . 'FROM user '
        );
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }
    
    public function get_user_email($email)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT * '
            . 'FROM user '
            . 'WHERE user.email = :an_email '
        );
        $requetePrepare->bindParam(':an_email', $email, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
    
    public function get_user($id)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT * '
            . 'FROM user '
            . 'WHERE user.id = :an_id '
        );
        $requetePrepare->bindParam(':an_id', $id, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
    
    public function get_user_token($id, $token)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT * '
            . 'FROM token '
            . 'WHERE token.id_user = :an_id AND token.key_value=:a_token '
        );
        $requetePrepare->bindParam(':an_id', $id, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_token', $token, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
    
    public function update_user($id, $title, $name, $forename, $email)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'UPDATE user '
            . 'SET title=:title, name=:name, forename=:forename, email=:email '
            . 'WHERE id = :id '
        );
        $requetePrepare->bindParam(':title', $title, PDO::PARAM_STR);
        $requetePrepare->bindParam(':name', $name, PDO::PARAM_STR);
        $requetePrepare->bindParam(':forename', $forename, PDO::PARAM_STR);
        $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
        $requetePrepare->bindParam(':id', $id, PDO::PARAM_STR); 
        $requetePrepare->execute();
    }
    
    public function get_events($id_user, $month, $year)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT * '
            . 'FROM event '
            . 'WHERE event.id_user = :an_id AND MONTH(event.date) = :a_month AND YEAR(event.date) = :a_year '
        );
        $requetePrepare->bindParam(':an_id', $id_user, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_month', $month, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_year', $year, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }
    
    public function update_presence($id_user, $date, $presence)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT * '
            . 'FROM event '
            . 'WHERE event.id_user = :an_id AND MONTH(event.date) = :a_month AND YEAR(event.date) = :a_year '
        );
        $requetePrepare->bindParam(':an_id', $id_user, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_month', $month, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_year', $year, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }
    
    public function is_event($id_user, $date)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT * '
            . 'FROM event '
            . 'WHERE event.id_user = :an_id AND date = :a_date '
        );
        $requetePrepare->bindParam(':an_id', $id_user, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_date', $date, PDO::PARAM_STR);
        $requetePrepare->execute();
        $num_of_rows = $requetePrepare->rowCount() ;
        return $num_of_rows==1;
    }
    
    /**
     * Function that updates an event
     * 
     * @param type $id_user
     * @param type $date
     * @param type $presence
     * @param type $meal
     */
    public function update_event($id_user, $date, $presence, $meal)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'UPDATE event '
            . 'SET presence = :a_presence, '
            . '    meal = :a_meal '
            . 'WHERE event.id_user = :an_id AND date = :a_date '
        );
        $requetePrepare->bindParam(':an_id', $id_user, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_date', $date, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_presence', $presence, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_meal', $meal, PDO::PARAM_STR);
        $requetePrepare->execute();
    }
    
    /**
     * Function that inserts an event in the database
     * 
     * @param type $id_user
     * @param type $date
     * @param type $presence
     * @param type $meal
     */
    public function add_event($id_user, $date, $presence, $meal){
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'INSERT INTO event (id_user, date, presence, meal) '
            . 'VALUES (:an_id, :a_date, :a_presence, :a_meal) '
        );
        $requetePrepare->bindParam(':an_id', $id_user, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_date', $date, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_presence', $presence, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_meal', $meal, PDO::PARAM_STR);
        $requetePrepare->execute();
    }
    
    public function add_candidacy($email, $name, $forename, $adress, $postcode, 
            $date, $tel, $docs, $class, $school, $professionnal, $status){
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'INSERT INTO enrollment (email, name, forename, adress, postcode, date_of_birth, '
            . 'telephone, documents, id_class, school_career, professional_career, id_status) '
            . 'VALUES (:email, :name, :forename, :adress, :postcode, :date, '
            . ':tel, :docs, :class, :school, :professionnal, :status) '
        );
        $requetePrepare->bindParam(':email', $email, PDO::PARAM_STR);
        $requetePrepare->bindParam(':name', $name, PDO::PARAM_STR);
        $requetePrepare->bindParam(':forename', $forename, PDO::PARAM_STR);
        $requetePrepare->bindParam(':adress', $adress, PDO::PARAM_STR);
        $requetePrepare->bindParam(':postcode', $postcode, PDO::PARAM_STR);
        $requetePrepare->bindParam(':date', $date, PDO::PARAM_STR);
        $requetePrepare->bindParam(':tel', $tel, PDO::PARAM_STR);
        $requetePrepare->bindParam(':docs', $docs, PDO::PARAM_STR);
        $requetePrepare->bindParam(':class', $class, PDO::PARAM_INT);
        $requetePrepare->bindParam(':school', $school, PDO::PARAM_STR);
        $requetePrepare->bindParam(':professionnal', $professionnal, PDO::PARAM_STR);
        $requetePrepare->bindParam(':status', $status, PDO::PARAM_INT);
        $requetePrepare->execute();
    }
    
    function build_calendar($month, $year, $events)  {
        $daysOfWeek = array('Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi');
        $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
        $numberDays = date('t',$firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
        $dayOfWeek = $dateComponents['wday'];
        $calendar = "<table class='calendar table table-condensed table-bordered'>";
        $calendar .= "<tr>";
        foreach($daysOfWeek as $day) {
            $calendar .= "<th class='header'>$day</th>";
        }
        $currentDay = 1;
        $calendar .= "</tr><tr>";
        if ($dayOfWeek > 0) {
            $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
        }
        $month = str_pad($month, 2, "0", STR_PAD_LEFT);
        while($currentDay <= $numberDays){
            if($dayOfWeek == 7){
                $dayOfWeek = 0;
                $calendar .= "</tr><tr>";
            }
            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";

            $event = " ";
            // checks if an event corresponds to this date
            foreach ($events as $e) {
                if($e["date"] == $date){
                    $event = ($e["presence"] == 1) ? "<i class='fa fa-check-square'></i>" : $event." ";
                    $event = ($e["meal"] == 1) ? "<i class='fa fa-check-square'></i> <i class='fa fa-utensils'></i>" : $event." ";
                }
            }

            // Is this today?
            if(date('Y-m-d') == $date) {
                $calendar .= "<td class='day success' rel='$date'><b><a class ='text_fonce text_18' href='index.php?action=student&todo=edit_event&date=$date'>$currentDay $event</a></b></td>";
            } else {
                $calendar .= "<td class='day' rel='$date'><a href='index.php?action=student&todo=edit_event&date=$date'>$currentDay $event</a></td>";
            }

            $currentDay++;
            $dayOfWeek++;
        }
        if($dayOfWeek != 7){
            $remainingDays = 7 - $dayOfWeek;
            $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
        }
        $calendar .= "</tr>";
        $calendar .= "</table>";
        return $calendar;
    }
    
    public function is_candidate($email)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT * '
            . 'FROM enrollment '
            . 'WHERE email=:an_email '
        );
        $requetePrepare->bindParam(':an_email', $email, PDO::PARAM_STR);
        $requetePrepare->execute();
        $num_of_rows = $requetePrepare->rowCount() ;
        return $num_of_rows==1;
    }
    
    public function get_class_name($id_class)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT name as name '
            . 'FROM classroom '
            . 'WHERE id=:an_id '
        );
        $requetePrepare->bindParam(':an_id', $id_class, PDO::PARAM_STR);    
        $requetePrepare->execute();
        $return = $requetePrepare->fetch();
        return $return['name'];
    }
    
    public function get_total_users()
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT count(*) AS number '
            . 'FROM user '
        );  
        $requetePrepare->execute();
        $return = $requetePrepare->fetch();
        return $return['number'];
    }
    
    public function get_total_candidates()
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT count(*) AS number '
            . 'FROM enrollment '
        );  
        $requetePrepare->execute();
        $return = $requetePrepare->fetch();
        return $return['number'];
    }
    
    public function get_total_meals_demain($day)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT count(*) AS number '
            . 'FROM event '
            . 'WHERE meal=1 AND date = :a_date'
        );  
        $requetePrepare->bindParam(':a_date', $day, PDO::PARAM_STR);    
        $requetePrepare->execute();
        $return = $requetePrepare->fetch();
        return $return['number'];
    }
    
    public function get_class($id_class)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'SELECT name AS name '
            . 'FROM classroom '
            . 'WHERE id = :an_id'
        );  
        $requetePrepare->bindParam(':an_id', $id_class, PDO::PARAM_STR);    
        $requetePrepare->execute();
        $return = $requetePrepare->fetch();
        return $return['name'];
    }
    
    /**
     * Function that inserts a token in the database
     * 
     * @param type $id
     * @param type $crypt
     * @param type $hour
     */
    public function add_token($id, $crypt, $hour){
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'INSERT INTO token (id_user, key_value, date_time) '
            . 'VALUES (:an_id, :a_key, :a_date) '
        );
        $requetePrepare->bindParam(':an_id', $id, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_key', $crypt, PDO::PARAM_STR);
        $requetePrepare->bindParam(':a_date', $hour, PDO::PARAM_STR);
        $requetePrepare->execute();
    }
    
    public function update_password($id, $crypt_password)
    {
        $requetePrepare = Pdo_euroforma::$pdo->prepare(
            'UPDATE user '
            . 'SET password=:a_password '
            . 'WHERE id = :an_id '
        );
        $requetePrepare->bindParam(':a_password', $crypt_password, PDO::PARAM_STR);
        $requetePrepare->bindParam(':an_id', $id, PDO::PARAM_STR); 
        $requetePrepare->execute();
    }
}

