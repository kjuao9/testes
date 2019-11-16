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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

   

  </head>
  <style>
 body {
    background-color: azure;
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
<form action="" method="post">

<input type="titulo" name="titulo" placeholder="titulo da notícia"><br/>
<textarea name="texto" cols="21" rows="5" placeholder="texto da notícia"></textarea><br/>
<p>
<input type="submit" name="enviar" value="enviar">
<input type="reset" value="limpar">
</p>
</form>
<?php
if(isset($_POST["titulo"])){
  $titulo = $_POST["titulo"];
  $texto = $_POST["texto"];
  $novonome = md5(microtime());
  $destino = 'arquivos/'.$novonome.".php"; 
  $noticia = "$titulo\n$texto";

  $a = "<head>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
  </head>
  <style>
.borda{
  border: 1px;
  border-style: solid;
}
.bordap{
  border: 1px;
  padding: 5px;
  border-style: solid;
  border-color: red;
  text-align: justify;
}
.imagem{
height: 230px;
width: 230px;
float: right;
padding: 10px;
}
.clear{
  clear: both;
}
.clearfix{
  overflow: auto;
}
.justifica{
  text-align: justify;
}
body {
    background-color: azure;
  }
#noticia{
    background-color: #e9ecefbd;
  }
#comentarios{
  background-color: lightgrey;
}
  </style>
  <div class='container borda clearfix' id='noticia'>
  <p><br/><br/>
 <h2 class='font-weight-light text-center text-lg-center mt-4 mb-0 centro'>" . $titulo . "</h2>
  </p><hr>
  <div class='justifica'><p style='font-size: 20px;'>".$texto."
 </p><i>Postado por: <b>João</b> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;data da postagem: 16/11/2019</i></div></div>";
 

  $myfile = fopen($destino, "w");
  fwrite($myfile, $a);
  fclose($myfile);

 $sql = "INSERT into teste(titulo, texto, endereco) values ('$titulo', '$texto', '$destino')";
 if(mysqli_query($con, $sql)){
   print "noticia inserida";
 }
 else{
   print "erro ao inserir noticia :-(";
 }
}

//indo no bd e pegando todas as noticias
$sql = "SELECT * from teste";
$res = mysqli_query($con, $sql);
if($res){
  $x = array();
  while($y = mysqli_fetch_assoc($res)){
    $x[] = $y;
  }
  foreach($x as $z){
    $title = $z["titulo"];
    $caminho = $z["endereco"];
    include_once "$caminho";
    echo "<a href='$caminho'>$title</a>";
  }
}
?>
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