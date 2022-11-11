<?php
    include('funcoes.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administração</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Freehand&display=swap"
      rel="stylesheet"
    />
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
    <script>
      function categoriaOpt() {
        document.getElementById('optAdmCat').style =
          'border-bottom: 3px solid var(--corSecundaria);'
        document.getElementById('optAdmProd').style = 'border-bottom: none;'
        document.getElementById('categoria').style.display = 'flex'
        document.getElementById('produto').style.display = 'none'
      }
      function produtoOpt() {
        document.getElementById('optAdmProd').style =
          'border-bottom: 3px solid var(--corSecundaria);'
        document.getElementById('optAdmCat').style = 'border-bottom: none;'
        document.getElementById('produto').style.display = 'flex'
        document.getElementById('categoria').style.display = 'none'
      }
    </script>
  </head>
  <body>
    <div class="header">
      <div class="textLogo">
        <h3 id="textLogo"><a href="index.php">Pedro arT</a></h3>
      </div>
    </div>
    <div class="content">
      <div class="principal">
        <div class="esquerda">
          <h2 id="tituloDefault">Bem vindo</h2>
          <h3 id="textDefault">
            ao sistema de administração Pedro arT, administre com sabedoria.
            Quaisquer dúvidas, desentendimentos ou reclamações favor entre em
            contato com nossos desenvolvedores. Role para baixo para ver mais.
          </h3>
          <a href="zapPedro"><button class="button">Contato</button></a>
        </div>
        <div class="direita">
          <img src="img/logo.PNG" alt="Logo da marca" width="300px" />
        </div>
      </div>
      <div class="administracao">
        <div class="headerAdm">
          <h3 id="optAdmCat" onclick="categoriaOpt()">Categorias</h3>
          <h3 id="optAdmProd" onclick="produtoOpt()">Produtos</h3>
        </div>
        <div class="contentAdm">
          <div id="categoria">
            <form action="" method="post" class="form">
              <h3 id="titleForm">Cadastrar categoria</h3>
              <input
                type="text"
                name="nomeCat"
                id="nomeCat"
                placeholder="Digite o nome da categoria:"
                class="input"
              />
              <a href="zapPedro">
                <button type="submit" name="enviarCategoria" class="button">
                  Enviar
                </button>
              </a>
              <?php
                if(isset($_POST['nomeCat'])){
                    CadastrarCategoria($_POST['nomeCat']);
                }
              ?>
            </form>
            <table>
              <tr>
                <th id="th" style="border-right: 1px solid var(--corPrimaria)">
                  Código
                </th>
                <th id="th" style="border-right: 1px solid var(--corPrimaria)">
                  Nome
                </th>
                <th id="th">Opções</th>
              </tr>
              <?php
                MostrarCategoria();
              ?>
            </table>
          </div>
          <div id="produto">
            <form action="" method="post" class="form">
              <h3 id="titleForm">Cadastrar produto</h3>
              <label for="descProd" id="textDefault">Categoria do produto:</label>
              <select name="selectCat" id="selectCat">
                <?php
                    MostrarCategoriaSelect();
                ?>
              </select>
              <input
                type="text"
                name="descProd"
                id="descProd"
                placeholder="Digite a descrição do produto:"
                class="input"
              />
              <input
                type="file"
                name="fileToUpload"
                id="fileToUpload"
                class="input"
              />
              <input
                type="url"
                name="linkProd"
                id="linkProd"
                placeholder="Coloque o link do instagram do produto:"
                class="input"
              />
              <input
                type="text"
                name="nomeProd"
                id="nomeProd"
                placeholder="Digite o nome do produto:"
                class="input"
              />
              <input
                type="text"
                name="valor"
                id="valor"
                placeholder="Digite o valor, Ex.: R$40,00"
                class="input"
              />
              <a href="zapPedro">
                <button type="submit" name="enviarCategoria" class="button">
                  Enviar
                </button>
              </a>
              <?php
                $file = 'logo.png';
                if(isset($_POST['nomeProd'])){
                    CadastrarProduto($_POST['selectCat'], $_POST['descProd'], $file, $_POST['linkProd'], $_POST['nomeProd'], $_POST['valor']);
                }
              ?>
            </form>
            <table>
              <tr>
                <th id="th" style="border-right: 1px solid var(--corPrimaria)">
                  Código
                </th>
                <th id="th" style="border-right: 1px solid var(--corPrimaria)">
                  Nome
                </th>
                <th id="th" style="border-right: 1px solid var(--corPrimaria)">
                  Valor
                </th>
                <th id="th">Opções</th>
              </tr>
              <?php
                MostrarProduto();
              ?>
            </table>
          </div>
        </div>
        <div class="footerAdm"></div>
      </div>
    </div>
    <div class="footer">
      <h3 id="textFooter">We are bests</h3>
      <div class="icons">
        <a href=""><img src="img/whatsapp.png" alt="" width="25px" /></a>
        <a href=""
          ><img src="img/logotipo-do-instagram.png" alt="" width="25px"
        /></a>
        <a href=""><img src="img/pincel-de-arte.png" alt="" width="25px" /></a>
      </div>
    </div>
  </body>
</html>
