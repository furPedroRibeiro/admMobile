<?php
  $user = 'root';
  $pass = '';
  $banco = 'vitrine';
  $server = 'localhost';
  $conn = new mysqli($server, $user, $pass, $banco);
  if(!$conn){
    echo "Erro de conexão ".$conn->error;
  }
  /* Funções realizadas pelo administrador */
  function CadastrarCategoria($name){
    $sql = 'INSERT INTO categoria VALUES (null, "'.$name.'")';
    $res = $GLOBALS['conn']->query($sql);

    if($res){
      echo '<script>
        alert("Categoria cadastrada com sucesso!!");
      </script>';
    } else{
      echo '<script>
        alert("Erro ao cadastrar categoria");
      </script>';
    }
  }
  function EditarCategoria($cat, $name){
    $sql = 'UPDATE categoria SET nome = "'.$name.'" WHERE cd ='.$cat;
    $res = $GLOBALS['conn']->query($sql);

    if($res){
      echo '<script>
        alert("Categoria editada com sucesso!!");
      </script>';
    } else{
      echo '<script>
        alert("Erro ao editar categoria");
      </script>';
    }
  }
  function MostrarCategorias(){
    $sql = 'SELECT * FROM categoria';
    $res = $GLOBALS['conn']->query($sql);

    if($res -> num_rows > 0){
      while($row = $res->fetch_assoc()){
        echo '
        <div class="card1">
        <h3 id="textDefault">Código: '.$row['cd'].'</h3>
        <h3 id="textDefault">Categoria: '.$row['nome'].'</h3>
        <span>
          <script>
            function editarCat(){
              document.getElementById("editarCat").style.display = "flex";
            }
          </script>
          <a href="index.php"><img src="img/lixeira.png" width="25px"/></a>
          <a onclick="editarCat()" href="#editarCat"><img src="img/escrever.png" width="25px"/></a>
        </span>
      </div>
        ';
      }
    }
  }
  function MostrarCategoriaSelect(){
    $sql = 'SELECT * FROM categoria';
    $res = $GLOBALS['conn']->query($sql);

    if($res -> num_rows > 0){
      while($row = $res->fetch_assoc()){
        echo '
              <h3>
                <option value="'.$row['cd'].'">'.$row['nome'].'</option>
              </h3>
        ';
      }
    }
  }
  function CadastrarProduto($cdCat, $descProd, $imagem, $link, $nome, $valor){
    $sql = 'INSERT INTO produto(cd_categoria, cd_produto, ds_produto, imagem, link, nome, valor) VALUES ("'.$cdCat.'", null, "'.$descProd.'", "'.$imagem.'", "'.$link.'", "'.$nome.'", "'.$valor.'")';
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo '<script>
        alert("Produto cadastrado com sucesso");
      </script>';
    } else{
      echo '<script>
        alert("Erro ao cadastrar produto");
      </script>';
    }
  }
  function JsonCategoria(){
    $sql = 'SELECT * FROM categoria';
    $res = $GLOBALS['conn']->query($sql);

    if($res -> num_rows > 0){
      while($row = $res->fetch_assoc()){
        $myObj = '{codigo: '.$row['cd'].', categoria:"'.$row['nome'].'"}';

        $myJSON = json_encode($myObj);

        echo $myJSON;
      }
    }
  }
?>