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
      echo '<h3 id="textDefault">Categoria cadastrada com sucesso!!!</h3>';
    } else{
      echo 'Erro ao cadastrar categoria';
    }
  }
  function MostrarCategorias(){
    $sql = 'SELECT * FROM categoria';
    $res = $GLOBALS['conn']->query($sql);

    if($res -> num_rows > 0){
      while($row = $res->fetch_assoc()){
        echo '
              <div class="card">
                <h3 id="textDefault">Código:'.$row['cd'].'</h3>
                <h3 id="textDefault">Categoria:'.$row['nome'].'</h3>
                <a href=""><img src="img/lixeira.png" width="25px"/></a>
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
      echo '<h3 id="textDefault">Produto cadastrado com sucesso!!!</h3>';
    } else{
      echo 'Erro ao cadastrar produto';
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