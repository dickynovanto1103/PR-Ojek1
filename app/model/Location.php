<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/BaseModel.php';

class Location extends BaseModel {
    public $id;
    public $driver_id;
    public $name;

    public static function get_by_id ($id) {
        $stmt =
            Db::get_connection ()->prepare ("SELECT * FROM locations WHERE id=:id");

        $stmt->bindParam (':id', $id);
        $stmt->execute ();

        return $stmt->fetchObject ('Location');
    }
	
	public function remove(){
		$stmt_query = 'DELETE FROM locations WHERE id=:id';
		$stmt = Db::get_connection ()->prepare ($stmt_query);

        $stmt->bindParam (':id', $this->id);
		$stmt->execute();
	}
	
	public function save () {
        $stmt_query =
            'INSERT INTO locations (
                id,
                driver_id,
                name
            ) VALUES (
                :id,
                :driver_id,
                :name
            )';

        if ($this->id) {
            $stmt_query =
                'UPDATE locations SET
                    driver_id = :driver_id,
                    name = :name
                WHERE
                    id = :id';
        }

        $stmt = Db::get_connection ()->prepare ($stmt_query);

        $stmt->bindParam (':id', $this->id);
        $stmt->bindParam (':driver_id', $this->driver_id);
        $stmt->bindParam (':name', $this->name);
        
        $stmt->execute ();
    }
}
?>
