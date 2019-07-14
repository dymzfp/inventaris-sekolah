<?php  

	class Proses
	{
		
		private $db; // variabel koneksi database
		private $error; // menyimpan error message

		function __construct($db_conn)
		{
			$this->db = $db_conn;

			session_start();
		} // end __contruct

		// query
		function query($query) {

			try {
				
				$stmt = $this->db->prepare($query);
				$sth = $stmt->execute();

				if ($sth) {
					return true;
				}
				else {
					return false;
				}


			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}

		}

		// insert
		function insert($table, $data) {

			try {
				
				$prep = array();

				foreach ($data as $k => $v) {
					$prep[':'.$k] = $v;
				}

				$stmt = $this->db->prepare("INSERT INTO " . $table . " (" . implode(', ', array_keys($data)) . ") VALUES (" . implode(', ', array_keys($prep)) . ")");
				$sth = $stmt->execute($prep);

				if ($sth) {
					return true;
				}
				else {
					return false;
				}

			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}

		}

		//select
		function select($table) {
			
			try {
				
				$stmt = $this->db->prepare("SELECT * FROM $table");
				$stmt->execute();

				$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

				return $data;

			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}

		}


		function delete($table, $primary, $id) {

			try {
				
				$stmt = $this->db->prepare("DELETE FROM ".$table." WHERE ".$primary." = :id");
				$stmt->bindParam(":id", $id);

				if( $stmt->execute() ){
					return true;
				}
				else {
					return false;
				}

			} catch (PDOException $e) {
				echo $e->getMessage();
				return $e->getMessage();	
			}

		}

		// operator
		
		// end operator

		function login($username, $password){

			$username = $this->input($username);
			$password = $this->input($password);

			try {
				
				$stmt = $this->db->prepare("SELECT * FROM petugas WHERE username = :username");
				$stmt->bindParam(":username", $username);
				$stmt->execute();

				$data = $stmt->fetch();

				if ($stmt->rowCount() > 0) {
					
					if (password_verify($password, $data['password'])) {

						session_unset();
						$_SESSION['id_petugas'] = $data['id_petugas'];
						// $_SESSION['sekolah'] = $data['nm_sekolah'];
						return true;
					}
					else{
						$this->error = "username atau password salah";
						return false;
					}

				}
				else {
					$this->error = "username atau password salah";
					return false;
				}

			} catch (PDOException $e) {
				
				echo $e->getMessage();
				return false;

			}

		} // end login

		function loginPeminjam($username, $password){

			$username = $this->input($username);
			$password = $this->input($password);

			try {
				
				$stmt = $this->db->prepare("SELECT * FROM peminjam WHERE username = :username");
				$stmt->bindParam(":username", $username);
				$stmt->execute();

				$data = $stmt->fetch();

				if ($stmt->rowCount() > 0) {
					
					if (password_verify($password, $data['password'])) {

						session_unset();
						$_SESSION['id_peminjam'] = $data['id_peminjam'];
						// $_SESSION['sekolah'] = $data['nm_sekolah'];
						return true;
					}
					else{
						$this->error = "username atau password salah";
						return false;
					}

				}
				else {
					$this->error = "username atau password salah";
					return false;
				}

			} catch (PDOException $e) {
				
				echo $e->getMessage();
				return false;

			}

		} // end login

		// logout
		function logout() {

			session_destroy();

			unset($_SESSION['id_petugas']);

			return true;

		} // end logout

		// cek login
		function cekLogin() {

			if (isset($_SESSION['id_petugas'])) {
				return true;
			}

		} // end cek login

		// cek login
		function cekLoginPeminjam() {

			if (isset($_SESSION['id_peminjam'])) {
				return true;
			}

		} // end cek login

		// get petugas
		function getPetugas(){

			if ($this->cekLogin()) {
				
				try {
					
					$stmt = $this->db->prepare("SELECT A.id_petugas, A.id_level_petugas as level, A.username, A.nama_petugas, B.nama_level_petugas as nama_level FROM petugas A, level_petugas B WHERE A.id_level_petugas = B.id_level_petugas AND A.id_petugas = :id_petugas");
					$stmt->bindParam(":id_petugas", $_SESSION['id_petugas']);
					$stmt->execute();

					$data = $stmt->fetch();

					return $data;

				} catch (PDOException $e) {
					echo $e->getMessage();

					return false;
				}

			}
			else {
				return false;
			}

		} // end get petugas

		// get petugas
		function getPeminjam(){

			if ($this->cekLoginPeminjam()) {
				
				try {
					
					$stmt = $this->db->prepare("SELECT * FROM peminjam A, kelas B, jabatan C WHERE A.id_kelas = B.id_kelas AND A.id_jabatan = C.id_jabatan AND id_peminjam = :id_peminjam");
					$stmt->bindParam(":id_peminjam", $_SESSION['id_peminjam']);
					$stmt->execute();

					$data = $stmt->fetch();

					return $data;

				} catch (PDOException $e) {
					echo $e->getMessage();

					return false;
				}

			}
			else {
				return false;
			}

		} // end get petugas

		// test input
		function input($data) {
			
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		
		} // end input

		// get error
		function getError() {
			return $this->error;
		} // end get error

		function kode($length) {
		    $data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
		    $string = '';
		    for($i = 0; $i < $length; $i++) {
		        $pos = rand(0, strlen($data)-1);
		        $string .= $data{$pos};
		    }
		    return $string;
		}

	}

?>