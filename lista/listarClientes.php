<?php
    include 'conexao.php';
    try{
        $conexao = new PDO($dns,$user,$pass);
        
        $query = "select * from cliente;";

        $stmt = $conexao->prepare($query);
        $stmt->execute();
        
        //Salva o resultado em um array
        $cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($cliente as $clie){
            echo '<div class="Resultado">';
                echo "<p>".$clie['CPF_Cliente']." - ".$clie['Nome_Cliente']."</p>";
                
                echo '<div class="BotoesCRUD">';
                    echo '<a class="ButaoCRUD" href="delete/deleteClientes.php?id_cliente='.$clie['ID_Cliente'].'">Excluir</a>';
                    echo '<a class="ButaoCRUD" href="?id_cliente='.$clie['ID_Cliente'].'&cpf_cliente='.$clie['CPF_Cliente'].'&nome_cliente='.$clie['Nome_Cliente'].'">Alterar</a>';
                echo '</div>';
            echo '</div>';
        }

    } catch(PDOException $error){
        echo "Error: ".$error->getMessage();
    }
?>