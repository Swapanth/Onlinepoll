<!DOCTYPE html>
<html>
<head>
    <title>Poll Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <!-- Poll Results Bar Chart -->
    <div>
        <canvas id="pollResultsChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Replace this with actual poll results data from your database
        var pollResultsData = {
            labels: ["Option 1", "Option 2"], // Replace with your option labels
            datasets: [{
                label: 'Poll Results',
                data: [25, 35], // Replace with actual vote counts
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        };

        var ctx = document.getElementById('pollResultsChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: pollResultsData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
