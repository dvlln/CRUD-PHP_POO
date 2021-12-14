<?php
    include '../conexao.php';
    try{
        $conexao = new PDO($dns,$user,$pass);
        
        $query = "delete from veiculo where ID_Veiculo=:id;";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':id',$_GET['id_veiculo']);

        $stmt->execute();
        echo "<img src='../images/geraldo.png' style='width: 100%; height: 100%;'/>";

    } catch(PDOException $error){
        echo "Error: ".$error->getMessage();
    }
?>

<html>

<head>
    <meta http-equiv="refresh" content="0.1; URL='../home.php'" />
</head>

<body>
</body>

</html>