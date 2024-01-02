<?php
class Material_model
{
    private $dbh; //db handler
    private $stmn;

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host=localhost;dbname=lsr';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }



    public function getAllMaterial()
    {
        $this->stmn = $this->dbh->prepare('SELECT * FROM data_dc');
        $this->stmn->execute();
        return $this->stmn->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>