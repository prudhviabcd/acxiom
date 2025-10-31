<?php
include('db.php');

// Fetch average product price per vendor from database
$query = "
    SELECT vendor_email, AVG(price) AS avg_price
    FROM products
    GROUP BY vendor_email
";

$result = mysqli_query($conn, $query);

$vendors = [];
$prices = [];

while ($row = mysqli_fetch_assoc($result)) {
    $vendors[] = $row['vendor_email'];
    $prices[] = $row['avg_price'];
}

// Convert to JSON for Chart.js
$vendors_json = json_encode($vendors);
$prices_json = json_encode($prices);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendor Product Price Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #b0e0fe, #98b0f6);
            text-align: center;
            margin: 0;
            padding: 30px;
        }

        h2 {
            color: #1a237e;
            margin-bottom: 20px;
        }

        .chart-container {
            width: 70%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        canvas {
            width: 100% !important;
            height: 400px !important;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 18px;
            background: #5b86e5;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn:hover {
            background: #36d1dc;
        }
    </style>
</head>
<body>

    <h2>📊 Average Product Price per Vendor</h2>

    <div class="chart-container">
        <canvas id="vendorChart"></canvas>
    </div>

    <a href="index.php" class="btn">⬅ Back to Home</a>

    <script>
        const ctx = document.getElementById('vendorChart');

        const vendorData = {
            labels: <?php echo $vendors_json; ?>,
            datasets: [{
                label: 'Average Product Price (₹)',
                data: <?php echo $prices_json; ?>,
                backgroundColor: [
                    '#36a2eb',
                    '#ff6384',
                    '#ffcd56',
                    '#4bc0c0',
                    '#9966ff',
                    '#ff9f40'
                ],
                borderColor: '#333',
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: vendorData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Average Price (₹)',
                            color: '#333'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Vendor Email',
                            color: '#333'
                        }
                    }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return '₹ ' + context.raw.toFixed(2);
                            }
                        }
                    }
                }
            }
        };

        new Chart(ctx, config);
    </script>

</body>
</html>
