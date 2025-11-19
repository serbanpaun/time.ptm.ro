    <script>
        function updateTime() {
            var now = new Date();
            var date = ('0' + now.getDate()).slice(-2);
            var month = now.toLocaleString('default', { month: 'long'});
            var year = now.getFullYear();
            var hours = ('0' + now.getHours()).slice(-2);
            var minutes = ('0' + now.getMinutes()).slice(-2);
            var seconds = ('0' + now.getSeconds()).slice(-2);
            var timeString = date + " " + month + " " + year + " " + hours + ':' + minutes + ':' + seconds;
            document.getElementById('local-time').textContent = timeString;
        }

        setInterval(updateTime, 1000);
    </script>
<span class="bold">Local time:</span><br>
    <span id="local-time">
        <?php
//            date_default_timezone_set('Europe/Bucharest'); // Set your desired timezone
//            echo date('d F Y H:i:s');
            echo "Local time:";
        ?>
    </span>
</p>