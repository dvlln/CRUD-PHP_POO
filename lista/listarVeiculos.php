<?php
    include 'conexao.php';
    try{
        $conexao = new PDO($dns,$user,$pass);
        
        $query = "select * from veiculo;";

        $stmt = $conexao->prepare($query);
        $stmt->execute();
        
        //Salva o resultado em um array
        $veiculo = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($veiculo as $vei){
            echo '<div class="Resultado">';
                echo "<p>".$vei['Tipo']." - ".$vei['Marca']." - ".$vei['Modelo']." - ".$vei['Cor']."</p>";

                echo '<div class="BotoesCRUD">';
                    echo '<a class="ButaoCRUD" href="delete/deleteVeiculos.php?id_veiculo='.$vei['ID_Veiculo'].'">Excluir</a>';
                    echo '<a class="ButaoCRUD" href="?id_veiculo='.$vei['ID_Veiculo'].'&tipo='.$vei['Tipo'].'&marca='.$vei['Marca'].'&modelo='.$vei['Modelo'].'&cor='.$vei['Cor'].'">Alterar</a>';
                echo '</div>';
            echo '</div>';
        }

    } catch(PDOException $error){
        echo "Error: ".$error->getMessage();
    }
?>