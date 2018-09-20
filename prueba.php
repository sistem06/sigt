<?php
/*
include ("conecta.php");
include ("/funciones/funciones_generales.php");

echo date("d-m-Y")."<br />";
echo BuscaRegistro ("tb_datos_educativos", "de_dp_id", 3026, "de_continuar");
*/
/*
$q = "select f_insertar_mayusculaMinuscula(sx_name) nom from tb_sexos";
$res = mysql_query($q);
while ($qq = mysql_fetch_array($res)) {
    echo "qq-->".$qq['nom']."</br>";
}*/


/*
$a = 5;
$a++;
echo "ahora?: " .$a."</br>";
echo "ahora?: " .$a."</br>";
echo "ahora?: " .$a."</br>";

	require_once "modelo.php";

	$db = new MySQL();
	$consulta = $db->consulta("SELECT bar_id FROM tb_barrios");
	if($db->num_rows($consulta)>0){
	  while($resultados = $db->fetch_array($consulta)){
	   echo "ID: ".$resultados['bar_id']."<br />";
	 }
	}
*/

/********************************
echo '<table style="border: 1px solid black;">';
echo '<tr><td> $_SERVER[SERVER_NAME] </td><td>&rarr;</td><td>'.$_SERVER['SERVER_NAME'].'</td></tr>';
echo '<tr><td> $_SERVER[DOCUMENT_ROOT] </td><td>&rarr;</td><td>'.$_SERVER['DOCUMENT_ROOT'].'</td></tr>';
echo '<tr><td> getcwd() </td><td>&rarr;</td><td>'.getcwd().'</td></tr>';
$base_dir = __DIR__;
echo '<tr><td> __DIR__ </td><td>&rarr;</td><td>'.$base_dir.'</td></tr>';
echo '<tr><td> dirname(__FILE__) </td><td>&rarr;</td><td>'.dirname(__FILE__).'</td></tr>';
echo '<tr><td> basename(__FILE__) </td><td>&rarr;</td><td>'.basename(__FILE__).'</td></tr>';
$base_url=$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
echo '<tr><td> server_name + request_uri </td><td>&rarr;</td><td>'.$base_url.'</td></tr>';

echo '</table>';


echo '</br></br>';

  if ($_SERVER['SERVER_NAME'] == 'localhost') {
    echo "SERVER --> DESARROLLO </br></br>";
  } else {
    echo "SERVER --> ¡PRODUCCIÓN! </br></br>";
  };
******************/
//echo md5("admin")."</br>";
/*
sd000022_sigt
  pevituVO36
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
</head>
<body>
<button type='button'>Lock / Unlock Form</button>

<br><br>
<form>
  <fieldset>
    <legend>Some Form</legend>
    <input placeholder='text input'>
    <br><br>
    <input type='file'>
    <br><br>
    <textarea placeholder='textarea'></textarea>
    <br><br>
    <label><input type='checkbox'>Checkbox</label>
    <br><br>
    <label><input type='radio' name='r'>option 1</label>
    <label><input type='radio' name='r' checked>option 2</label>
    <label><input type='radio' name='r'>option 3</label>
    <br><br>
    <select>
      <option>options 1</option>
      <option>options 2</option>
      <option selected>options 3</option>
    </select>
  </fieldset>
</form>
<br><br>
<form id="fr2">
  <fieldset>
  <legend>Form 2</legend>
  <input placeholder='text input'>
</fieldset>
</form>

<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" language="javascript">
  var form = document.forms[0], // form element to be "readonly"
      btn1 = document.querySelectorAll('button')[0]

  btn1.addEventListener('click', lockForm)

  function lockForm(){
    btn1.classList.toggle('on');
    [].slice.call( form.elements ).forEach(function(item){
        item.disabled = !item.disabled;
    });
    [].slice.call( fr2.elements ).forEach(function(item){
        item.disabled = !item.disabled;
    });
  }
</script>

</body>
</html>
