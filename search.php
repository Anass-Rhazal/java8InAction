<!doctype html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Home</title>

<link href="style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">



  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <script src="js/script.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script> 



</script>

</head>

<body id="body">





<nav class="navbar navbar-default">
<div class="container-fluid" >
<div class="navbar-header"  id="logo">
<a  href="index.php" class="navbar-brand">Java8 en Action </a>
<button type="button" class="navbar-toggle" data-toggle="collapse"
data-target="#example-navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div class="collapse navbar-collapse" id="example-navbar-collapse">
<ul class="nav navbar-nav" id="nav">
 <!--<li  id="home"><a href="index"> <i class="glyphicon glyphicon-home"></i></a></li>-->
<li  ><a href="lambda">Lambda Expression</a></li>

<li ><a   href="reference">Méthode reference</a></li>


<li ><a   href="functional">Functional Interface</a></li>

<li> <a   href="Stream">Streams</a></li>

<li ><a href="collector">Les Collecteur</a></li>


<li  ><a href="default">Default Method</a></li>

<li ><a href="optional">Class Optional</a></li>

<li ><a   href="time">Time</a></li>
 
</ul>

<ul class="nav navbar-nav navbar-right">
                    <li><a href="#search"><i class="glyphicon glyphicon-search"></i></a></li>
           </ul>
</div>
</div>
</nav>




<div class="container"  style="margin-top : 50px;">
	
<?php


//if(isset($_GET['rech'])){


$recherche=htmlspecialchars($_GET['champ']);


$con =new PDO("mysql:host=localhost;dbname=java8;charset=utf8","root","", array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
$pre=$con->prepare("select * from  recherche where contenu COLLATE UTF8_GENERAL_CI like '%".$recherche."%'");

//$pre=$con->prepare("select * from  recherche where  match(contenu) against('".$recherche."' IN NATURAL LANGUAGE MODE)");


$pre->execute();
while($res=$pre->fetch()){

?>





  
  
  
  
 
    <div class="col-md-4 col-sm-6 offset-md-1">
        <div class="well">
      
     
        

     
      <a  href="<?php  echo "$res[lien]";  ?>" >    <h3 class="title"><?php  echo "$res[titre]";  ?></h3>  </a>
         
          <p><?php  $tab=explode(".",$res['contenu'] ); 
          $x="";
		  $i=0;
		  while(strlen($x)<=60){
			  
			$x.="".$tab[$i];  
			  $i++;
			 
		  }    

		  echo  "$x........";  ?></p>
          
        
          
        
      

<hr>

   </div>
  </div>


<?php
}


$con="";

//}




?>




</div>





    
<!--
<div id="search">
    <button type="button" class="close">&times;</button>
    <form method="post" action="search.php">
        <input type="search"  name="rech_champ"    placeholder="Search" />
        <button type="submit"  name="recherche" class="btn btn-primary">Search</button>
   </form>
   
   </div>
-->
   
   <div id="search">
    <button type="button" class="close">&times;</button>
    <form method="get" action="search.php">
        <input type="text"  name="champ"    placeholder="search" />
        <button type="submit"  name="rech" class="btn btn-primary" >Search</button>
   </form>
   
   </div>


</body>
</html>

