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
                        $bulan = getMonth($day, $month, $year);
                        echo "Tanggal " . "$day/$month/$year" . " jatuh pada:" . "<br/>";
                        echo "Bulan (Masehi) : " . $bulan['monthName'] . "<br/>";
                        echo "Bulan (Hijriyah) : " . $bulan['hMonthName'] . "<br/>";
                        echo "Bulan (Jawa) : " . $bulan['jMonthName'] . "<br/>";
                    }
                }
            ?>
        </div>
    </div>
    
    <?php
        function intPart($float) {
            return($float < -0.0000001 ? ceil($float - 0.0000001) : floor($float + 0.0000001));
        }

        function getMonth($day, $month, $year) {
            $julian = GregorianToJD($month, $day, $year);
            if($julian>=1937808 && $julian<=536838867) {
                $date = cal_from_jd($julian, CAL_GREGORIAN);
                $d = $date['day']; 
                $m = $date['month'] - 1; 
                $y = $date['year'];
                
                $mPart = ($m-13)/12;
                $jd = intPart((1461*($y+4800+intPart($mPart)))/4)+
                intPart((367*($m-1-12*(intPart($mPart))))/12)-
                intPart((3*(intPart(($y+4900+intPart($mPart))/100)))/4)+$d-32075;
                
                $l = $jd-1948440+10632;
                $n = intPart(($l-1)/10631);
                $l = $l-10631*$n+354;
                $j = (intPart((10985-$l)/5316))*(intPart((50*$l)/17719))+(intPart($l/5670))*(intPart((43*$l)/15238));
                $l = $l-(intPart((30-$j)/15))*(intPart((17719*$j)/50))-(intPart($j/16))*(intPart((15238*$j)/43))+29;
                
                $hMonth = intPart((24*$l)/709);
                $jMonth = $hMonth;

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
                
                return array(
                    'month' => $date['month'],
                    'hMonth' => $hMonth,
                    'jMonth' => $jMonth,
                    'monthName' => $monthName[$date['month']-1],
                    'hMonthName' => $hMonthName[$hMonth-1],
                    'jMonthName' => $jMonthName[$jMonth-1]
                );
            }
            else 
                return false;
        }
    ?>
</body>
</html>