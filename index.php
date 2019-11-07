<!DOCTYPE html>
<html lang="pt-Br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta author="João Paulo S. Costa">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="imagens/8104logo.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

   

  </head>
  <style>
 body {
    background-color: azure;
  }
  .postagem{
      background-color: lightgrey;
  }
  </style>

<div class="container">
<body><center><h1><a href="index.php">Index</a></h1></center>

<br/>
  <?php 
    function conecta_mysql(){
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$nome_bd = "teste";

	$conexao = mysqli_connect($host,$usuario,$senha,$nome_bd);
	mysqli_set_charset($conexao, "utf8");
	
	return $conexao;
}
$con = conecta_mysql();
  ?>
  <form action="" method="get">
  <label>Título: </label>
  <input type="text" name="titulo"><br/>
  <textarea rows="5" cols="21" name="texto" placeholder="texto"></textarea><br/>
  <p><input type="submit" value="Enviar"><input type="reset" value="Limpar"></p>
  </form>
<?php
if(isset($_GET["titulo"])){
    $titulo = $_GET["titulo"];
    $texto = $_GET["texto"];
    $sql = "INSERT into teste(titulo, texto) values('$titulo', '$texto')";
    $res = mysqli_query($con, $sql);
    if($res){
        echo "<script>
        alert('Inserção realizada!');
        </script>";
    }
    else{
        echo "<script>
        alert('Erro ao realizar inserção');
        </script>";
    }
}
$sql = "SELECT * from teste";
$res = mysqli_query($con, $sql);
if($res){
    $x = array();
    while($a = mysqli_fetch_assoc($res)){
        $x[] = $a;
    }
    foreach($x as $y){
        $id = $y["id"];
        echo "<br>";
        echo "<div class='postagem'>";
        echo "<center>" . $y["titulo"] . "</center>";
        echo "<p style='text-align: center;'>" . $y["texto"] . "</p>";
        // echo "<h2><a href='#'><i class='fas fa-thumbs-down'></i></a> &emsp; &emsp; &emsp; &emsp;";
        // echo "<a href='#'><i class='fas fa-thumbs-up'></i></a></h2>";
        echo "<form action ='' method='post'>";
        echo "<input type='submit' name='curtir' value='curtir'>";
        echo "<input type='hidden' name='codigo' value='$id'>";
        echo "</form>";
        echo "</div>";
       
          }
          if(isset($_POST["curtir"])){
            $curtir = $_POST["curtir"];
            $codigo = $_POST["codigo"];
  
            $sql = "UPDATE teste set curtidas = curtidas + 1 where id = '$codigo'";
            // $res = mysqli_query($con, $sql);
            if(mysqli_query($con, $sql)){
              print "deu certo";
            }
            else{
              print "deu errado";
              }
        }
      }


?>
<script>

</script>


  <br/>
  <br/>
  <br/>
  <br/>
  <br/></div>
    <div class="jumbotron text-center abaixo" style="margin-bottom:0">
  <!-- <p>The Janaúba Times<sup>&copy;</sup> 2019. Todos os direitos reservados</p> -->
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
