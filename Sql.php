<?php

class Sql extends PDO {

    private $conn;

    public function __construct(){

        $this->conn= new PDO("mysql:host=localhost;dbname=new_schema","root","");
    }

    public function insert($login,$password){

        $stmt= $this->conn->prepare("INSERT INTO tb_usuarios (deslogin,dessenha) VALUES(:LOGIN, :PASSWORD)");

        $stmt->bindParam(":LOGIN",$login);
        $stmt->bindParam(":PASSWORD",$password);

        $stmt->execute();

        echo "Inserido com SUCESSO!";

    }

    public function select(){

        $stmt= $this->conn->prepare("SELECT * FROM tb_usuarios");

        $stmt->execute();

        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $row) {

        foreach ($row as $key => $value) {
            echo $key.":".$value."<br/>";
        }
        echo '______________________________________________________<br/>';
        }

    }

    public function selectOne($id){

        $stmt= $this->conn->prepare("SELECT * FROM tb_usuarios WHERE id=:id");

        $stmt->execute();

        $results= $stmt->fetch(PDO::FETCH_ASSOC);

        foreach ($results as $key => $value) {
            
            echo $key.":".$value;

        }

    }


    public function update($novologin,$novasenha,$novoid){

        $stmt= $this->conn->prepare("UPDATE tb_usuarios set deslogin=:l, dessenha=:s WHERE id=:id");

        $stmt->bindParam(":l",$novologin);
        $stmt->bindParam(":s",$novasenha);
        $stmt->bindParam(":id",$novoid);

        $stmt->execute();

        echo "Alterado com sucesso!";

    }

    public function delete($id){

        $stmt= $conn->prepare("DELETE FROM tb_usuarios WHERE id=:id");

        $stmt->bindParam(":id",$id);

        $stmt->execute();

        echo "Linha deletada com sucesso!";


    }
}

?>

