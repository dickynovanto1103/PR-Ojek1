<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/BaseModel.php';
require_once __DIR__ . '/Location.php';
require_once __DIR__ . '/Popularity.php';
require_once __DIR__ . '/Transaction.php';

class User extends BaseModel {
    public $id;
    public $username;
    private $password;
    public $full_name;
    public $email;
    public $phone_number;
    public $is_driver;

    private $locations;
    private $visible_user_transactions;
    private $visible_driver_transactions;
    private $driver_popularity;

    // Static getters.

    public static function get_by_id ($id) {
        $stmt =
            Db::get_connection ()->prepare ("SELECT * FROM users WHERE id=:id");

        $stmt->bindParam (':id', $id);
        $stmt->execute ();

        return $stmt->fetchObject ('User');
    }

    public static function get_by_username ($username) {
        $stmt =
            Db::get_connection ()->prepare ("SELECT * FROM users WHERE username=:username");

        $stmt->bindParam (':username', $username);
        $stmt->execute ();

        return $stmt->fetchObject ('User');
    }

    public static function get_by_email ($email) {
        $stmt =
            Db::get_connection ()->prepare ("SELECT * FROM users WHERE email=:email");

        $stmt->bindParam (':email', $email);
        $stmt->execute ();

        return $stmt->fetchObject ('User');
    }

    public static function get_pickable_drivers ($loc1, $loc2) {
        $stmt_query =
            'SELECT * FROM users WHERE is_driver AND id IN
                (SELECT driver_id FROM locations WHERE name = :loc1 OR name = :loc2)';

        $stmt = Db::get_connection ()->prepare ($stmt_query);

        $stmt->bindParam (':loc1', $loc1);
        $stmt->bindParam (':loc2', $loc2);
        $stmt->execute ();

        return $stmt->fetchAll (PDO::FETCH_CLASS, 'User');
    }

    // Auto-properties.

    public function get_locations () {
        if (isset ($this->locations)) {
            return $this->locations;
        }

        $stmt =
            Db::get_connection ()->prepare
                ("SELECT * FROM locations WHERE driver_id=:driver_id");

        $stmt->bindParam (':driver_id', $this->id);
        $stmt->execute ();

        return $this->locations =
            $stmt->fetchAll (PDO::FETCH_CLASS, 'Location');
    }

    public function get_visible_user_transactions () {
        if (isset ($this->visible_user_transactions)) {
            return $this->visible_user_transactions;
        }

        $stmt =
            Db::get_connection ()->prepare
                ("SELECT * FROM transactions WHERE user_id=:user_id AND show_user_history");

        $stmt->bindParam (':user_id', $this->id);
        $stmt->execute ();

        return $this->visible_user_transactions =
            $stmt->fetchAll (PDO::FETCH_CLASS, 'Transaction');
    }

    public function get_visible_driver_transactions () {
        if (isset ($this->visible_driver_transactions)) {
            return $this->visible_driver_transactions;
        }

        $stmt =
            Db::get_connection ()->prepare
                ("SELECT * FROM transactions WHERE driver_id=:driver_id AND show_driver_history");

        $stmt->bindParam (':driver_id', $this->id);
        $stmt->execute ();

        return $this->visible_driver_transactions =
            $stmt->fetchAll (PDO::FETCH_CLASS, 'Transaction');
    }

    public function get_driver_popularity () {
        if (isset ($this->driver_popularity)) {
            return $this->driver_popularity;
        }

        $stmt =
            Db::get_connection ()->prepare
                ("SELECT * FROM popularities WHERE driver_id=:driver_id");
        
        $stmt->bindParam (':driver_id', $this->id);
        $stmt->execute ();
        return $this->driver_popularity = $stmt->fetchObject ('Popularity');
    }

    public function set_password ($value) {
        $this->password = password_hash ($value, PASSWORD_DEFAULT);
    }

    public function check_password ($pass) {
        return password_verify ($pass, $this->password);
    }

    // Persistence.

    public function save () {
        $stmt_query =
            'INSERT INTO users (
                id,
                username,
                password,
                full_name,
                email,
                phone_number,
                is_driver
            ) VALUES (
                :id,
                :username,
                :password,
                :full_name,
                :email,
                :phone_number,
                :is_driver
            )';

        if ($this->id) {
            $stmt_query =
                'UPDATE users SET
                    username = :username,
                    password = :password,
                    full_name = :full_name,
                    email = :email,
                    phone_number = :phone_number,
                    is_driver = :is_driver
                WHERE
                    id = :id';
        }

        $stmt = Db::get_connection ()->prepare ($stmt_query);

        $stmt->bindParam (':id', $this->id);
        $stmt->bindParam (':username', $this->username);
        $stmt->bindParam (':password', $this->password);
        $stmt->bindParam (':full_name', $this->full_name);
        $stmt->bindParam (':email', $this->email);
        $stmt->bindParam (':phone_number', $this->phone_number);
        $stmt->bindParam (':is_driver', $this->is_driver);

        $stmt->execute ();
    }
}
?>
