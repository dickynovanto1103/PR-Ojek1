<?php
	require_once __DIR__ . '/../db.php';
	require_once __DIR__ . '/BaseModel.php';

	class Transaction extends BaseModel {
		public $id;
		public $picking_point;
		public $destination;
		public $driver_id;
		public $user_id;
		public $rating;
		public $comment;
		public $order_date;
		public $show_user_history;
		public $show_driver_history;

		private $user;
		private $driver;

		public static function get_by_id($id){
			$stmt = Db::get_connection()->prepare("SELECT * FROM transactions WHERE id=:id");

			$stmt->bindParam(':id',$id);
			$stmt->execute();

			return $stmt->fetchObject('Transaction');
		}

		public function get_user() {
			if (isset ($this->user)) {
				return $this->user;
			}
	
			$stmt = Db::get_connection ()->prepare ("SELECT * FROM users WHERE id=:user_id");
	
			$stmt->bindParam (':user_id', $this->user_id);
			$stmt->execute ();
	
			return $this->user = $stmt->fetchObject ('User');
		}

		public function get_driver() {
			if (isset ($this->driver)) {
				return $this->driver;
			}
	
			$stmt = Db::get_connection ()->prepare ("SELECT * FROM users WHERE id=:driver_id");
	
			$stmt->bindParam (':driver_id', $this->driver_id);
			$stmt->execute ();
	
			return $this->driver = $stmt->fetchObject ('User');
		}

		public function save(){
			$stmt_query =
				'INSERT INTO transactions (
					id,
					picking_point,
					destination,
					driver_id,
					user_id,
					rating,
					comment,
					order_date,
					show_user_history,
					show_driver_history
				) VALUES (
					:id,
					:picking_point,
					:destination,
					:driver_id,
					:user_id,
					:rating,
					:comment,
					IFNULL (:order_date, DEFAULT (order_date)),
					IFNULL (:show_user_history, DEFAULT (show_user_history)),
					IFNULL (:show_driver_history, DEFAULT (show_driver_history))
				)';

			if ($this->id) {
				$stmt_query =
					'UPDATE transactions SET
						picking_point = :picking_point,
						destination = :destination,
						driver_id = :driver_id,
						user_id = :user_id,
						rating = :rating,
						comment = :comment,
						order_date = :order_date,
						show_user_history = :show_user_history,
						show_driver_history = :show_driver_history
					WHERE
						id = :id';
			}

			$stmt = Db::get_connection ()->prepare ($stmt_query);

			$stmt->bindParam(':id',$this->id);
			$stmt->bindParam(':picking_point',$this->picking_point);
			$stmt->bindParam(':destination',$this->destination);
			$stmt->bindParam(':driver_id',$this->driver_id);
			$stmt->bindParam(':user_id',$this->user_id);
			$stmt->bindParam(':rating',$this->rating);
			$stmt->bindParam(':comment',$this->comment);
			$stmt->bindParam(':order_date',$this->order_date);
			$stmt->bindParam(':show_user_history',$this->show_user_history);
			$stmt->bindParam(':show_driver_history',$this->show_driver_history);

			$stmt->execute();
		}
	}
?>