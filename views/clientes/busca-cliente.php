<?
include("../../bd.php");

$q = strtolower($_POST["cliente"]);

$query = "SELECT nome FROM tb_clientes WHERE nome like '%" . $q . "%'";

$sql = mysqli_query($conn, $query);

while ($reg = mysqli_fetch_array($sql)) {

    //if (srtpos(strtolower($reg['nom_lista']),$q !== false){
    echo ucwords($reg["nome"]) . "|" . ucwords($reg["nome"]) . "\n";
//	}
}
?>