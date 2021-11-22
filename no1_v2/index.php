<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fungsi Mencari Hari dalam Seminggu</title>
    <link rel="stylesheet" type="text/css" href="css/fday.css">
</head>
<body>
    <div class="judul">
        <h1>Fungsi Mencari Hari dalam Satu Minggu</h1>
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
        <div class="show">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $day = $_POST['day'];
                    $month = $_POST['month'];
                    $year = $_POST['year'];

                    if($day != NULL && $month != NULL && $year != NULL) {
                        echo getDay($day,$month,$year) . ", " . "$day-$month-$year";
                    }
                }
            ?>
        </div>
    </div>
    
    <?php
        function getDay($day, $month, $year) {
            $dt = "$year-$month-$day";
            $hari = date('D', strtotime($dt));

            $namaHari = "";
            switch($hari) {
                case 'Sun':
                    $namaHari = "Minggu";
                    break;
                case 'Mon':
                    $namaHari = "Senin";
                    break;
                case 'Tue':
                    $namaHari = "Selasa";
                    break;
                case 'Wed':
                    $namaHari = "Rabu";
                    break;
                case 'Thu':
                    $namaHari = "Kamis";
                    break;
                case 'Fri':
                    $namaHari = "Jum'at";
                    break;
                case 'Sat':
                    $namaHari = "Sabtu";
                    break;
            }

            return $namaHari;
        }
    ?>
</body>
</html>