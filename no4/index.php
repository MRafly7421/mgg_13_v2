<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan Weton</title>
    <link rel="stylesheet" type="text/css" href="css/weton.css">
</head>
<body>
    <div class="judul">
        <h1>Menentukan Weton</h1>
    </div>

    <div class="form-box">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <input type="text" name="day" id="day" placeholder="Tanggal">
            <input type="text" name="month" id="month" placeholder="Bulan">
            <input type="text" name="year" id="year" placeholder="Tahun">
            <button type="submit" class="submit">Submit</button>
        </form>
    </div>

    <div id="print" class="print">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $day = $_POST['day'];
                $month = $_POST['month'];
                $year = $_POST['year'];

                if($day != NULL && $month != NULL && $year != NULL) {
                    echo '<div class="head-print">KAMU LAHIR PADA</div>';
                    echo '<div class="text-print">' . getWeton($day,$month,$year). '</div>';
                }
            }
        ?>
    </div>
    
    <?php
        function getWeton($day, $month, $year) {
            $monthName = "Januari";
            $sDay = 0;
            switch($month) {
                case 2:
                    $monthName = "Februari";
                    $sDay = 31;
                    break;
                case 3:
                    $monthName = "Maret";
                    $sDay = 59;
                    break;
                case 4:
                    $monthName = "April";
                    $sDay = 90;
                    break;
                case 5:
                    $monthName = "Mei";
                    $sDay = 120;
                    break;
                case 6:
                    $monthName = "Juni";
                    $sDay = 151;
                    break;
                case 7:
                    $monthName = "Juli";
                    $sDay = 181;
                    break;
                case 8:
                    $monthName = "Agustus";
                    $sDay = 212;
                    break;
                case 9:
                    $monthName = "September";
                    $sDay = 243;
                    break;
                case 10:
                    $monthName = "Oktober";
                    $sDay = 273;
                    break;
                case 11:
                    $monthName = "November";
                    $sDay = 304;
                    break;
                case 12:
                    $monthName = "Desember";
                    $sDay = 334;
                    break;
            }
            
            $jmlKabisat = 1 + ($year - ($year % 4))/4;
            if($year > 100) $jmlKabisat -= ($year - ($year % 100))/100;
            if($year > 399) $jmlKabisat += ($year - ($year % 400))/400;
            if(($year % 4) < 1 && $month < 3) $jmlKabisat--;

            $sumDay = $year * 365 + $sDay + $day + $jmlKabisat;

            $sortDay = $sumDay % 7;
            switch($sortDay) {
                case 0:
                    $dayName = "Jum'at";
                    break;
                case 1:
                    $dayName = "Sabtu";
                    break;
                case 2:
                    $dayName = "Minggu";
                    break;
                case 3:
                    $dayName = "Senin";
                    break;
                case 4:
                    $dayName = "Selasa";
                    break;
                case 5:
                    $dayName = "Rabu";
                    break;
                case 6:
                    $dayName = "Kamis";
                    break;
            }

            $pasaranJawa = $sumDay % 5;
            switch($pasaranJawa) {
                case 0:
                    $javaDay = "Kliwon";
                    break;
                case 1:
                    $javaDay = "Legi";
                    break;
                case 2:
                    $javaDay = "Pahing";
                    break;
                case 3:
                    $javaDay = "Pon";
                    break;
                case 4:
                    $javaDay = "Wage";
                    break;
            }

            $hasil = $dayName . " " . $javaDay . ", " . $day . " " . $monthName . " " . $year;

            return $hasil;
        }
    ?>
</body>
</html>