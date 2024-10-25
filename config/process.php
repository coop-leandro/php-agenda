<?php
    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;
    if(!empty($data)){
        if($data["type"] === "create"){
            $name = $data["name"];
            $phone = $data["phone"];
            $obs = $data["observation"];

            $query = "INSERT INTO contacts (name, phone, observation) VALUES (:name, :phone, :observation)";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observation", $obs);
            try{
                $stmt->execute();
                $_SESSION["msg"] = "Contato criado com sucesso";
            }catch(PDOException $e){
                $error = $e->getMessage();
                echo "erro: $error";
            }
        } else if($data["type"] === "edit"){
            $name = $data["name"];
            $phone = $data["phone"];
            $obs = $data["observation"];
            $id = $data["id"];

            $query = "UPDATE contacts 
                        SET name = :name, phone = :phone, observation = :observation 
                        WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observation", $obs);
            $stmt->bindParam(":id", $id);

            try {
                $stmt->execute();
                $_SESSION["msg"] = "Contato atualizado com sucesso!";
            
            } catch(PDOException $e) {
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        }else if($data["type"] === "delete"){
            $id = $data["id"];
            $query = "DELETE FROM contacts WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            try {
                $stmt->execute();
                $_SESSION["msg"] = "Contato deletado com sucesso!";
            
            } catch(PDOException $e) {
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        }
        header("Location:" . $BASE_URL . "index.php");
    }else{
        $id;

        if(!empty($_GET)){
            $id = $_GET["id"];
        }

        if(!empty($id)){
            $query = "SELECT * FROM contacts WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $contact = $stmt->fetch(); //retorna o contato com o id selecionado //
        }else{
            $contacts = [];
            $query = "SELECT * FROM contacts";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $contacts = $stmt->fetchAll(); //busca todas rows da tabela selecionada na query //
        }
    }

    $conn = null;
    


    

