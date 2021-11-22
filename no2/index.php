<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fungsi Menentukan Bulan Berdasarkan Hari </title>
    <link rel="stylesheet" type="text/css" href="css/fmonthh.css">
</head>
<body>
    <div class="judul">
        <h1>Fungsi Menentukan Bulan</h1>
    </div>

    <div class="form-box">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <input type="text" name="day" id="day" placeholder="Hari ke ... [(hari[0]),(hari[1]), ...)]">
            <button type="submit" class="submit">Submit</button>
        </form>
    </div>

    <div id="print" class="print">
        <div class="show">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $day = $_POST['day'];

                    if($day != NULL) {
                        $arr = explode(",",$day);

                        foreach ($arr as $hari) {
                            $bln = getMonth($hari);
                            echo "Hari ke-" . $hari . " masuk pada:" . "<br/>";
                            echo "Bulan (Masehi) : " . $bln['month'] . "<br/>";
                            echo "Bulan (Hijriyah) : " . $bln['hMonth'] . "<br/>";
                            echo "Bulan (Jawa) : " . $bln['jMonth'] . "<br/><br/><br/>";
                        }
                    }
                }
            ?>
        </div>
    </div>
    
    <?php
        function intPart($float) {
            return($float < -0.0000001 ? ceil($float - 0.0000001) : floor($float + 0.0000001));
        }

        function getMonth($day) {
            $monthName = array(
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember"
            );
            $hMonthName = array(
                "Muharram",
                "Safar",
                "Rabiul Awal",
                "Rabiul Akhir",
                "Jumadil Awal",
                "Jumadil Akhir",
                "Rajab",
                "Syakban",
                "Ramadhan",
                "Syawal",
                "Dzulkaidah",
                "Dzulhijjah"
            );
            $jMonthName = array(
                "Sura",
                "Sapar",
                "Mulud",
                "Bakda Mulud",
                "Jumadilawal",
                "Jumadilakir",
                "Rejeb",
                "Ruwah",
                "Pasa",
                "Sawal",
                "Sela",
                "Besar"
            );    

            $bulan = "";
            if($day >= 1 && $day <= 31) {
                $bulan = $monthName[0];
            } else if($day >= 32 && $day <= 59) {
                $bulan = $monthName[1];
            } else if($day >= 60 && $day <= 90) {
                $bulan = $monthName[2];
            } else if($day >= 91 && $day <= 120) {
                $bulan = $monthName[3];
            } else if($day >= 121 && $day <= 151) {
                $bulan = $monthName[4];
            } else if($day >= 152 && $day <= 181) {
                $bulan = $monthName[5];
            } else if($day >= 182 && $day <= 212) {
                $bulan = $monthName[6];
            } else if($day >= 213 && $day <= 243) {
                $bulan = $monthName[7];
            } else if($day >= 244 && $day <= 273) {
                $bulan = $monthName[8];
            } else if($day >= 274 && $day <= 304) {
                $bulan = $monthName[9];
            } else if($day >= 305 && $day <= 334) {
                $bulan = $monthName[10];
            } else if($day >= 335 && $day <= 355) {
                $bulan = $monthName[11];
            }

            $bulanHijriyah = "";
            $bulanJawa = "";
            if($day >= 1 && $day <= 30) {
                $bulanHijriyah = $hMonthName[0];
                $bulanJawa = $jMonthName[0];
            } else if($day >= 31 && $day <= 59) {
                $bulanHijriyah = $hMonthName[1];
                $bulanJawa = $jMonthName[1];
            } else if($day >= 60 && $day <= 89) {
                $bulanHijriyah = $hMonthName[2];
                $bulanJawa = $jMonthName[2];
            } else if($day >= 90 && $day <= 118) {
                $bulanHijriyah = $hMonthName[3];
                $bulanJawa = $jMonthName[3];
            } else if($day >= 119 && $day <= 148) {
                $bulanHijriyah = $hMonthName[4];
                $bulanJawa = $jMonthName[4];
            } else if($day >= 149 && $day <= 177) {
                $bulanHijriyah = $hMonthName[5];
                $bulanJawa = $jMonthName[5];
            } else if($day >= 178 && $day <= 207) {
                $bulanHijriyah = $hMonthName[6];
                $bulanJawa = $jMonthName[6];
            } else if($day >= 208 && $day <= 236) {
                $bulanHijriyah = $hMonthName[7];
                $bulanJawa = $jMonthName[7];
            } else if($day >= 237 && $day <= 266) {
                $bulanHijriyah = $hMonthName[8];
                $bulanJawa = $jMonthName[8];
            } else if($day >= 267 && $day <= 295) {
                $bulanHijriyah = $hMonthName[9];
                $bulanJawa = $jMonthName[9];
            } else if($day >= 296 && $day <= 325) {
                $bulanHijriyah = $hMonthName[10];
                $bulanJawa = $jMonthName[10];
            } else if($day >= 326 && $day <= 354) {
                $bulanHijriyah = $hMonthName[11];
                $bulanJawa = $jMonthName[11];
            }

            return array(
                'month' => $bulan,
                'hMonth' => $bulanHijriyah,
                'jMonth' => $bulanJawa
            );
        }
    ?>
</body>
</html>