<?php
class Configdb  {
    private $kadi="XXXXXXX"; //mysql kullanıcı adını girin
    private $pass="XXXXXXX"; //mysql şifresini girin
    private $dbname="XXXXXXX"; //mysql'de baglanti kurulacak database
    private $host="localhost"; //mysql serverin ip adresi: Eğer webserver ile mysql aynı serverda ise ellemeyin
    private $conn; //connection

    public function __construct() {
        if($this->conn = mysqli_connect($this->host, $this->kadi, $this->pass, $this->dbname)) {
			mysqli_set_charset($this->conn, 'utf8');
        } else {
            die(mysqli_error().'\n<br><br>\nBaglanti saglanamadi. Lutfen duzelene kadar sayfayi yenileyin. (F5 tusu)');
        }
    }
    public function query($sorgu) {
        if($query = mysqli_query($this->conn, $sorgu)) {
            return $query;
        } else {
            echo mysqli_error()."\n<br>\n";
            die('sorgu calismadi');
        }
	}
	public function insertid() {
		return mysqli_insert_id($this->conn);
	}
	public function __destruct() {
		mysqli_close($this->conn);
	}
}
?>
