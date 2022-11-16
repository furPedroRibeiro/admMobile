<?php
session_start();
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
      echo '<h3 id="removeu" class="textDefault">Categoria cadastrada com sucesso(o site será atualizado em 7 segundos)</h3>';
        $_SESSION['redirect'] = 1;
    } else{
      echo '<h3 id="removeu" class="textDefault">Erro ao cadastrar categoria(o site será atualizado em 7 segundos)</h3>';
        $_SESSION['redirect'] = 1;
    }
  }
  function EditarCategoria($name, $cat){
    $sql = 'UPDATE categoria SET nome = "'.$name.'" WHERE cd ='.$cat;
    $res = $GLOBALS['conn']->query($sql);

    if($res){
      echo '<h3 class="textDefault">Categoria editada com sucesso(o site será atualizado em 7 segundos)</h3>';
      $_SESSION['redirect'] = 1;
    } else{
      echo '<h3 class="textDefault">Categoria não foi editada(o site será atualizado em 7 segundos)</h3>';
      $_SESSION['redirect'] = 1;
    }
  }
  function MostrarCategoria(){
    $sql = 'SELECT * FROM categoria';
    $res = $GLOBALS['conn']->query($sql);

    if($res -> num_rows > 0){
      while($row = $res->fetch_assoc()){
        if($row['cd'] % 2 == 1){
          echo '
              <tr>
                <td id="tdCat">'.$row['cd'].'</td>
                <td id="tdCat">'.$row['nome'].'</td>
                <td id="tdCat">
                  <a href="index.php?removeCat='.$row['cd'].'&nomeCat='.$row['nome'].'" style="text-decoration: none">
                    <img src="img/lixeira.png" alt="" width="25px" />
                  </a>
                  <a href="#editar" onclick="mostrarEdit()" style="text-decoration: none">
                    <img src="img/escrever.png" alt="" width="25px" />
                  </a>
                </td>
              </tr>
        ';
        } else{
          echo '
              <tr>
                <td id="tdCat" style="background-color: var(--fundo); color: var(--corPrimaria)">'.$row['cd'].'</td>
                <td id="tdCat" style="background-color: var(--fundo); color: var(--corPrimaria)">'.$row['nome'].'</td>
                <td id="tdCat" style="background-color: var(--fundo); color: var(--corPrimaria)">
                  <a href="index.php?removeCat='.$row['cd'].'&nomeCat='.$row['nome'].'" style="text-decoration: none">
                    <img src="img/lixeira.png" alt="" width="25px" />
                  </a>
                  <a href="#editar" onclick="mostrarEdit()" style="text-decoration: none">
                    <img src="img/escrever.png" alt="" width="25px" />
                  </a>
                </td>
              </tr>
        ';
        }
      }
      if(isset($_GET['removeCat'])){
        ExcluirCategoria($_GET['removeCat'], $_GET['nomeCat']);
      }
    } else{
      echo '
              <tr>
                <td id="tdCat">Null</td>
                <td id="tdCat">Null</td>
                <td id="tdCat">
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
  function ExcluirCategoria($cd, $nome){
      $sql = 'DELETE FROM categoria WHERE cd ='.$cd;
      $res = $res = $GLOBALS['conn']->query($sql);
      if($res){
        echo '<h3 class="textDefault">Categoria excluída com sucesso(o site será atualizado em 7 segundos)</h3>';
        $_SESSION['redirect'] = 1;
      } else{
        echo '<h3 class="textDefault">Categoria não foi excluída com sucesso(o site será atualizado em 7 segundos)</h3>';
        $_SESSION['redirect'] = 1;
      }
  }
  function CadastrarProduto($cdCat, $descProd, $imagem, $link, $nome, $valor){
    $sql = 'INSERT INTO produto(cd_categoria, cd_produto, ds_produto, imagem, link, nome, valor) VALUES ("'.$cdCat.'", null, "'.$descProd.'", "'.$imagem.'", "'.$link.'", "'.$nome.'", "'.$valor.'")';
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo '<h3 id="textDefault">Produto cadastrado com sucesso!!!(o site será atualizado em 7 segundos)</h3>';
      $_SESSION['redirect'] = 1;
    } else{
      echo '<h3 id="textDefault">Erro ao cadastrar produto!!!(o site será atualizado em 7 segundos)</h3>';
      $_SESSION['redirect'] = 1;
    }
  }
  function MostrarProduto(){
    $sql = 'SELECT * FROM produto';
    $res = $GLOBALS['conn']->query($sql);

    if($res -> num_rows > 0){
      while($row = $res->fetch_assoc()){
        if($row['cd_produto'] % 2 == 1){
          echo '
              <tr>
                <td id="tdProd">'.$row['cd_produto'].'</td>
                <td id="tdProd">'.$row['nome'].'</td>
                <td id="tdProd">'.$row['valor'].'</td>
                <td id="tdProd">
                  <a href="index.php?removeProd='.$row['cd_produto'].'&nomeProd='.$row['nome'].'" style="text-decoration: none">
                    <img src="img/lixeira.png" alt="" width="25px" />
                  </a>
                  <a href="" style="text-decoration: none">
                    <img src="img/escrever.png" alt="" width="25px" />
                  </a>
                </td>
              </tr>
        ';
        } else{
          echo '
              <tr>
                <td id="tdProd" style="background-color: var(--fundo); color: var(--corPrimaria)">'.$row['cd_produto'].'</td>
                <td id="tdProd" style="background-color: var(--fundo); color: var(--corPrimaria)">'.$row['nome'].'</td>
                <td id="tdProd" style="background-color: var(--fundo); color: var(--corPrimaria)">'.$row['valor'].'</td>
                <td id="tdProd" style="background-color: var(--fundo); color: var(--corPrimaria)">
                  <a href="index.php?removeProd='.$row['cd_produto'].'&nomeProd='.$row['nome'].'" style="text-decoration: none">
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
      if(isset($_GET['removeProd'])){
        ExcluirProduto($_GET['removeProd'], $_GET['nomeProd']);
      }
    } else{
      echo '
              <tr>
                <td id="tdProd">Null</td>
                <td id="tdProd">Null</td>
                <td id="tdProd">Null</td>
                <td id="tdProd">
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
  function ExcluirProduto($cd, $nome){
    $sql = 'DELETE FROM produto WHERE cd_produto ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo '<h3 id="removeu" class="textDefault">Produto excluído com sucesso(a página será atualizada em 7 segundos)</h3>';
      $_SESSION['redirect'] = 1;
    } else{
      echo '<h3 id="removeu" class="textDefault">Produto não foi excluído com sucesso(o site será atualizado em 7 segundos)</h3>';
      $_SESSION['redirect'] = 1;
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