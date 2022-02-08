<?php
require_once 'inc/config.php';
$query = mysqli_query($conn, "SELECT * FROM `bnmi_auction_participant` ORDER BY `date_time` DESC");

echo "SELECT * FROM `bnmi_auction_participant` ORDER BY `date_time` DESC";

while ($res = mysqli_fetch_assoc($query)) {
?>

    <script>
        const timerFunction = function(distance, elem) {
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById(elem).innerHTML =
                minutes + "m " + seconds + "s ";
        }

        let x = setInterval(function() {
                    var countDownDate2 = new Date(
                        "<?php echo date('Y-m-d H:i', strtotime('+10 minutes', strtotime($data['starting_from']))); ?>").getTime();

                    var now2 = new Date().getTime();

                    var distance2 = countDownDate2 - now2;

                    timerFunction(distance2, 'timer');
                    if (distance2 < 0) {
                        clearInterval(x);
                        document.getElementById('timer').innerHTML =
                            "00" + "m " + "00" + "s ";
                    }
    </script>

<?php

}

?>