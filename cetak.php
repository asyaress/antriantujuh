<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$nomor=$_GET['nomor'];
$tanggal=$_GET['tanggal'];
$waktu=$_GET['waktu'];
$huruf=$_GET['huruf'];

?>

<table style="width:100%">
<tr>
    <td align="center"><?php print"$tanggal"; ?></td>
    <td align="center"><?php print"$tanggal"; ?></td>
</tr>
<tr>
    <td colspan="2" align="center" style="font-size: 40px;"><?php print"$huruf$nomor" ?></td>
</tr>
<tr>
    <td colspan="2" align="center">PUSKESMAS XYZ</td>
</tr>
</table>

<script type="text/javascript">
    window.print();
    window.onfocus=function(){window.close();}
    window.onmousemove = function(){window.close();}
</script>

</body>
</html>