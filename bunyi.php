<?php

session_name('sesidesain1');
session_start();

// Periksa apakah nomor antrian ada dalam session
if (isset($_SESSION['nomor'])) {
    $nomor = $_SESSION['nomor'];
    $jumlah = strlen($nomor);
    // Lakukan logika yang diperlukan
    echo json_encode(['status' => 'success', 'message' => "Nomor Antrian Anda: $nomor"]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Tidak ada antrian yang belum dipanggil.']);
}

if($jumlah==1){

    $nomor=$nomor;
}
else if($jumlah==2){
    $nomora=substr($nomor, 0, 1);
    $nomorb=substr($nomor, 1, 1);

}
else if($jumlah==3){
    $nomora=substr($nomor, 0, 1);
    $nomorb=substr($nomor, 1, 1);
    $nomorc=substr($nomor, 2, 2);
}

?>


    <div id="audioplay">

        <audio id="audio1" src="nadav2/bell.wav" type="audio/mpeg" preload="auto" > </audio>
        <audio id="audio2" src="nadav2/nomor antrian.MP3" type="audio/mpeg" preload="auto" > </audio>
        
        <audio id="audio3" src="nadav2/<?php  print"$_SESSION[huruf].mp3";?>" type="audio/mpeg" preload="auto" > </audio>
        <?php
        if($jumlah==1){
            print "<audio id='audio4' src='nadav2/$nomor.mp3' type='audio/mpeg' preload='auto' > </audio>";
        }
        else if($nomor==10){
        print "<audio id='audio4' src='nadav2/10.mp3' type='audio/mpeg' preload='auto' > </audio>";
        }
        else if($nomor==11){
            print "<audio id='audio4' src='nadav2/11.mp3' type='audio/mpeg' preload='auto' > </audio>";
        }
        else if($nomor==100){
            print "<audio id='audio4' src='nadav2/100.mp3' type='audio/mpeg' preload='auto' > </audio>";
        }
        else if($nomor==110){
            print "<audio id='audio4' src='nadav2/seratus.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio5' src='nadav2/sepuluh.mp3' type='audio/mpeg' preload='auto' > </audio>";

        }
        else if($nomor==111){
            print "<audio id='audio4' src='nadav2/100.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio5' src='nadav2/11.mp3' type='audio/mpeg' preload='auto' > </audio>";

        }
        else if($nomor==120){
            print "<audio id='audio4' src='nadav2/100.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio5' src='nadav2/$nomorb.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio6' src='nadav2/puluh.mp3' type='audio/mpeg' preload='auto' > </audio>";
        }
        else if($nomor > 120){
            print "<audio id='audio11' src='nadav2/100.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio1
            2' src='nadav2/$nomorb.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio13' src='nadav2/puluh.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio14' src='nadav2/$nomorc.mp3' type='audio/mpeg' preload='auto' > </audio>";

        }
   
        else if($jumlah==2 and $nomor < 20){
            print "<audio id='audio4' src='nadav2/$nomorb.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio5' src='nadav2/belas.mp3' type='audio/mpeg' preload='auto' > </audio>";
        }
        
        else if ($jumlah==2 and $nomor > 19){
            print "<audio id='audio4' src='nadav2/$nomora.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio5' src='nadav2/puluh.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio6' src='nadav2/$nomorb.mp3' type='audio/mpeg' preload='auto' > </audio>";
        }
        else if ($jumlah==3 and $nomor < 110){
            print "<audio id='audio9' src='nadav2/100.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio10' src='nadav2/$nomorc.mp3' type='audio/mpeg' preload='auto' > </audio>";
        }
        else if($jumlah==3 and $nomor >111){
            print "<audio id='audio9' src='nadav2/111.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio10' src='nadav2/$nomorc.mp3' type='audio/mpeg' preload='auto' > </audio>";
            print "<audio id='audio6' src='nadav2/belas.mp3' type='audio/mpeg' preload='auto' > </audio>";
        }
        ?>
        <audio id="audio7" src="nadav2/silahkanmenujumejadesain.mp3" type="audio/mpeg" preload="auto" > </audio>
        <audio id="audio8" src="nadav2/<?php  print"$_SESSION[loket].mp3";?>" type="audio/mpeg" preload="auto" > </audio>

    </div>

    <script>
            function panggil(){
                var audio1 =document.getElementById('audio1');
                var audio2 =document.getElementById('audio2');
                var audio3 =document.getElementById('audio3');
                var audio4 =document.getElementById('audio4');
                var audio5 =document.getElementById('audio5');
                var audio6 =document.getElementById('audio6');
                var audio7 =document.getElementById('audio7');
                var audio8 =document.getElementById('audio8');
                var audio9 =document.getElementById('audio9');
                var audio10 =document.getElementById('audio10');
                var audio11 =document.getElementById('audio11');
                var audio12 =document.getElementById('audio12');
                var audio13 =document.getElementById('audio13');
                var audio14 =document.getElementById('audio14');

                audio1.play();
                setTimeout(function(){audio2.play();},5000);
                setTimeout(function(){audio3.play();},7000);
                setTimeout(function(){audio4.play();},8000);
                setTimeout(function(){audio5.play();},9000);
                setTimeout(function(){audio6.play();},10000);
                setTimeout(function(){audio7.play();},11000);
                setTimeout(function(){audio8.play();},13900);
                setTimeout(function(){audio9.play();},8000);
                setTimeout(function(){audio10.play();},9000);
                setTimeout(function(){audio11.play();},8000);
                setTimeout(function(){audio12.play();},9000);
                setTimeout(function(){audio13.play();},9800);
                setTimeout(function(){audio14.play();},10700);
      }
    </script>
    
