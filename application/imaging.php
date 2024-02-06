<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imaging Tests</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin: 20px 0;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px 0;
        }

        
        .results-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <h2>Imaging Tests</h2>

    <!-- Form for requesting imaging tests -->
    <form action="process_imaging.php" method="post">
        <label>
            <input type="checkbox" name="tests[]" value="Ultrasound"> Ultrasound
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="Mammogram"> Mammogram
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="CT Scan"> CT Scan
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="MRI"> MRI
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="X-Ray"> X-Ray
        </label>

        <button type="submit">Submit Request</button>
    </form>

    
    <!-- Imaging results container -->
    <div class="results-container">
        <h3>Imaging Results</h3>
        <p>Date: [Date]</p>
        <p>Test: [Imaging Test Name]</p>
        <p>Results: [Results Description]</p>
        <!-- Add more result details as needed -->
           <!-- Display images (dummy data for illustration) -->
    <img src="ultrasound_image.jpg" alt="Ultrasound Image">
    <img src="mammogram_image.jpg" alt="Mammogram Image">
    <img src="ct_scan_image.jpg" alt="CT Scan Image">
    <img src="mri_image.jpg" alt="MRI Image">
    <img src="x_ray_image.jpg" alt="X-Ray Image">

    </div>

 
</body>
</html>
