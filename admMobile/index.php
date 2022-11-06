<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link rel="stylesheet" href="style.css">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <div class="textLogo">
            <h3 id="textLogo"><a href="index.php">Pedro arT</a></h3>
        </div>
    </div>
    <div class="content">
        <div class="tamHeight">
        <div class="left">
            <div class="contentLeft">
                <h1 id="title">Seja bem vindo</h1>
                <h4 id="text">ao nosso programa de administração da marca Pedro arT, aproveite a experiência e administre com sabedoria, quaisquer dúvidas reclamações ou requerimentos favor entrar em contato com nosso desenvolvedor. Lembre-se, quem tem cu tem medo!!!</h3>
                <a href="">
                    <button>Contato</button>
                </a>
            </div>
        </div>
        <div class="rigth">
            <div class="contentRigth">
                <img src="img/logo.png" alt="" width="250px">
            </div>
        </div>
        </div>
    </div>
        <div class="forms">
            <div class="adm">
                <h3 id="text">Cadastrar categoria de produto:</h3>
                <form action="" method="post" class="form">
                    <input type="text" id="nomeCat" name="nomeCat" placeholder="Digite o nome da categoria:">
                    <button type="submit" class="buttonForm">Enviar</button>
                    <?php
                        include('funcoes.php');
                        if(isset($_POST['nomeCat'])){
                            CadastrarCategoria($_POST['nomeCat']);
                        } else{}
                    ?>
                </form>
                <!-- Button trigger modal -->
                <button type="button" class="buttonForm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ver categorias
                </button>
  
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="textDefault">Categorias</h5>
                            <button type="button" class="btnModal" data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                            <!-- 
                                <?php
                                    /*MostrarCategorias();*/
                                ?>
                            -->
                            <h3 id="textDefault">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsum</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="adm">
                <h3 id="text">Cadastrar produto:</h3>
                <form action="" method="post" class="form">
                    <label for="catProduto"><h3 id="labelForm">Categoria do produto:</h3></label>
                    <select name="catProduto" id="catProduto">
                        <?php
                            MostrarCategoriaSelect();
                        ?>
                    </select>
                    <textarea name="descProduto" id="descProduto" cols="30" rows="10" placeholder="Descrição do produto"></textarea>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="url" id="linkProd" name="linkProd" placeholder="Link do instagram:">
                    <input type="text" id="nomeProd" name="nomeProd" placeholder="Digite o nome do produto:">
                    <label for="valorProd"><h3 id="labelForm">Digite o valor do produto:</h3></label>
                    <input type="text" id="valorProd" name="valorProd" placeholder="Ex.: R$30,00">
                    <button type="submit" class="buttonForm">Enviar</button>
                    <?php
                        if(isset($_POST['nomeProd'])){
                            /* Carregando imagem */ 
                            $filename = $_FILES["fileToUpload"]["name"];
                            $tempname = $_FILES["fileToUpload"]["tmp_name"];  
                            $folder = "img/fotos/".$filename;   
                            
                            if (move_uploaded_file($tempname, $folder)) {
                                $msg = "Image uploaded successfully";
                            }else{
                                $msg = "Failed to upload image";
                            }
                                
                            CadastrarProduto($_POST['catProduto'], $_POST['descProduto'], $filename, $_POST['linkProd'], $_POST['nomeProd'], $_POST['valorProd']);
                                echo $_SESSION['nm_arquivo']; 
                        } else{}
                    ?>
                </form>
                <!-- Button trigger modal -->
                <button type="button" class="buttonForm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ver produtos
                </button>
  
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="textDefault">Produtos</h5>
                            <button type="button" class="btnModal" data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                            <!-- 
                                <?php
                                    /*MostrarProdutos();*/
                                ?>
                            -->
                            <h3 id="textDefault">Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsum</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
            <h3 id="textFooter">We are bests</h3>
        <div class="icons">
            <img src="img/whatsapp.png" alt="" width="25px">
            <img src="img/logotipo-do-instagram.png" alt="" width="25px">
            <img src="img/pincel-de-arte.png" alt="" width="25px">
        </div>
    </div>
</body>
</html>