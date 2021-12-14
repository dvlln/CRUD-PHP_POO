<?php
    include 'conexao.php';
    try{
        $conexao = new PDO($dns,$user,$pass);
        
        $query = "select * from vendedor;";

        $stmt = $conexao->prepare($query);
        $stmt->execute();
        
        //Salva o resultado em um array
        $vendedor = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($vendedor as $vend){
            echo '<div class="Resultado">';
                echo "<p>".$vend['CPF_Vendedor']." - ".$vend['Nome_Vendedor']."</p>";

                echo '<div class="BotoesCRUD">';
                    echo '<a class="ButaoCRUD" href="delete/deleteVendedores.php?id_vendedor='.$vend['ID_Vendedor'].'">Excluir</a>';
                    echo '<a class="ButaoCRUD" href="?id_vendedor='.$vend['ID_Vendedor'].'&cpf_vendedor='.$vend['CPF_Vendedor'].'&nome_vendedor='.$vend['Nome_Vendedor'].'">Alterar</a>';
                echo '</div>';
            echo '</div>';
        }

    } catch(PDOException $error){
        echo "Error: ".$error->getMessage();
    }
?>