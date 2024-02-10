       // Automatically set the date and time fields
        window.onload = function () {
            var today = new Date();
            var date = today.getFullYear() + '-' + (today.getMonth() + 1).toString().padStart(2, '0') + '-' + today.getDate().toString().padStart(2, '0');
            var hours = today.getHours() % 12 || 12; // Get hours in 12-hour format
            var time = hours.toString().padStart(2, '0') + ':' + today.getMinutes().toString().padStart(2, '0'); // Format time
            document.getElementById('date').value = date;
            document.getElementById('time').value = time;
        }