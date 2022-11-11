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
      echo '<h3 id="textDefault">Erro ao cadastrar categoria</h3>';
    }
  }
  function EditarCategoria($cat, $name){
    $sql = 'UPDATE categoria SET nome = "'.$name.'" WHERE cd ='.$cat;
    $res = $GLOBALS['conn']->query($sql);

    if($res){
      echo '<h3 id="textDefault">Categoria editada</h3>';
    } else{
      echo '<h3 id="textDefault">Erro ao editar categoria</h3>';
    }
  }
  function MostrarCategoria(){
    $sql = 'SELECT * FROM categoria';
    $res = $GLOBALS['conn']->query($sql);

    if($res -> num_rows > 0){
      while($row = $res->fetch_assoc()){
        echo '
              <tr>
                <td id="td">'.$row['cd'].'</td>
                <td id="td">'.$row['nome'].'</td>
                <td id="td">
                  <a href="" style="text-decoration: none">
                    <img src="img/lixeira.png" alt="" width="25px" />
                  </a>
                  <a href="" style="text-decoration: none">
                    <img src="img/escrever.png" alt="" width="25px" />
                  </a>
                </td>
              </tr>
        ';
      }
    } else{
      echo '
              <tr>
                <td id="td">Null</td>
                <td id="td">Null</td>
                <td id="td">
                  <a href="" style="text-decoration: none">
                    <img src="img/lixeira.png" alt="" width="25px" />
                  </a>
                  <a href="" style="text-decoration: none">
                    <img src="img/escrever.png" alt="" width="25px" />
                  </a>
                </td>
              </tr>
        ';
    }
  }
  function MostrarCategoriaSelect(){
    $sql = 'SELECT * FROM categoria';
    $res = $GLOBALS['conn']->query($sql);

    if($res -> num_rows > 0){
      while($row = $res->fetch_assoc()){
        echo '
                <option value="'.$row['cd'].'">'.$row['nome'].'</option>
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
      echo '<h3 id="textDefault">Erro ao cadastrar produto!!!</h3>';
    }
  }
  function MostrarProduto(){
    $sql = 'SELECT * FROM produto';
    $res = $GLOBALS['conn']->query($sql);

    if($res -> num_rows > 0){
      while($row = $res->fetch_assoc()){
        echo '
              <tr>
                <td id="td">'.$row['cd_produto'].'</td>
                <td id="td">'.$row['nome'].'</td>
                <td id="td">'.$row['valor'].'</td>
                <td id="td">
                  <a href="" style="text-decoration: none">
                    <img src="img/lixeira.png" alt="" width="25px" />
                  </a>
                  <a href="" style="text-decoration: none">
                    <img src="img/escrever.png" alt="" width="25px" />
                  </a>
                </td>
              </tr>
        ';
      }
    } else{
      echo '
              <tr>
                <td id="td">Null</td>
                <td id="td">Null</td>
                <td id="td">Null</td>
                <td id="td">
                  <a href="" style="text-decoration: none">
                    <img src="img/lixeira.png" alt="" width="25px" />
                  </a>
                  <a href="" style="text-decoration: none">
                    <img src="img/escrever.png" alt="" width="25px" />
                  </a>
                </td>
              </tr>
        ';
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