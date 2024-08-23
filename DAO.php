<?php
require_once 'db.php';

class DAO {
    private $db;
    private $SELECT_SVI = "SELECT id, marka, cena FROM telefon";
    private $SELECT_SORT_PO_CENI = "SELECT id, marka, cena FROM telefon ORDER BY cena ASC";

    public function __construct() {
        $this->db = DB::createInstance();
    }

    public function svi() {
        $statement = $this->db->prepare($this->SELECT_SVI);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function sortPoCeni() {
        $statement = $this->db->prepare($this->SELECT_SORT_PO_CENI);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}
?>
