<?
include("../../bd.php");

$q = strtolower($_POST["estado"]);

$query = "SELECT estado FROM tb_clientes WHERE estado like '%" . $q . "%' GROUP BY estado";

$sql = mysqli_query($conn, $query);

while ($reg = mysqli_fetch_array($sql)) {

    //if (srtpos(strtolower($reg['nom_lista']),$q !== false){
    echo ucwords($reg["estado"]) . "|" . ucwords($reg["estado"]) . "\n";
//	}
}
?>