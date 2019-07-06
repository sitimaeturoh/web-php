<br>
<br>
<?php
require_once("admin/db.php");
if(isset($_POST['cari'])){
    $pencarian=htmlspecialchars("%".$_POST['kata']."%", ENT_QUOTES); 
    $pencarian=htmlspecialchars($pencarian);
    try{
        $cari=$db->prepare("SELECT judul_berita FROM berita WHERE judul_berita LIKE :judul_berita");
        $cari->BindParam(":judul_berita", $pencarian);
        $cari->execute();
        if($cari->rowCount()<1){
            echo "<i> Tidak ada hasil untuk pencarian kata <b>\"".$_POST['kata']."\"</i></b>";
        }else{
            echo "<i> Hasil pencarian dengan kata <b>\"".$_POST['kata']."\"</b></i><br>";
            while($t=$cari->fetch()){
            echo $t['judul_berita']."<br>";
            }
        }   
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>
<br>
<br>

