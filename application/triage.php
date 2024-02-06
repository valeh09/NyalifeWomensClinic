<?php
// Sample triage data for Samantha Otieno
$triageData = array(
    array('Date' => '2024-03-01', 'Height' => '160 cm', 'Weight' => '55 kg', 'Temperature' => '37.0°C', 'Pulse' => '72 bpm', 'RespirationRate' => '18 bpm', 'BloodPressure' => '120/80 mmHg', 'SpO2' => '98%', 'RandomBloodSugar' => '5.5 mmol/L', 'Symptoms' => 'Headache, Fatigue'),
    array('Date' => '2024-03-15', 'Height' => '162 cm', 'Weight' => '58 kg', 'Temperature' => '37.3°C', 'Pulse' => '75 bpm', 'RespirationRate' => '20 bpm', 'BloodPressure' => '118/78 mmHg', 'SpO2' => '97%', 'RandomBloodSugar' => '6.2 mmol/L', 'Symptoms' => 'Sore throat, Cough'),
);

// Function to format date
function formatDate($date)
{
    return date('F j, Y', strtotime($date));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Triage</title>
    <style>
        /* Your styles for the triage page go here */
        .triage-entry {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .add-triage-form {
            margin-top: 20px;
        }

        .add-triage-form label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <h2>Patient Triage - Samantha Otieno</h2>

    <?php
    // Display existing triage data
    if (!empty($triageData)) {
        foreach ($triageData as $entry) {
            echo '<div class="triage-entry">';
            echo '<p><strong>Date:</strong> ' . formatDate($entry['Date']) . '</p>';
            echo '<p><strong>Height:</strong> ' . $entry['Height'] . '</p>';
            echo '<p><strong>Weight:</strong> ' . $entry['Weight'] . '</p>';
            echo '<p><strong>Temperature:</strong> ' . $entry['Temperature'] . '</p>';
            echo '<p><strong>Pulse:</strong> ' . $entry['Pulse'] . '</p>';
            echo '<p><strong>Respiration Rate:</strong> ' . $entry['RespirationRate'] . '</p>';
            echo '<p><strong>Blood Pressure:</strong> ' . $entry['BloodPressure'] . '</p>';
            echo '<p><strong>SpO2:</strong> ' . $entry['SpO2'] . '</p>';
            echo '<p><strong>Random Blood Sugar:</strong> ' . $entry['RandomBloodSugar'] . '</p>';
            echo '<p><strong>Symptoms:</strong> ' . $entry['Symptoms'] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>No triage data available.</p>';
    }
    ?>

    <!-- Add new triage entry form -->
    <div class="add-triage-form">
        <h3>Add New Triage Entry</h3>
        <form action="process_triage.php" method="post">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="height">Height (cm):</label>
            <input type="text" id="height" name="height" required>

            <label for="weight">Weight (kg):</label>
            <input type="text" id="weight" name="weight" required>

            <label for="temperature">Temperature (°C):</label>
            <input type="text" id="temperature" name="temperature" required>

            <label for="pulse">Pulse (bpm):</label>
            <input type="text" id="pulse" name="pulse" required>

            <label for="respirationRate">Respiration Rate (bpm):</label>
            <input type="text" id="respirationRate" name="respirationRate" required>

            <label for="bloodPressure">Blood Pressure:</label>
            <input type="text" id="bloodPressure" name="bloodPressure" required>

            <label for="spo2">SpO2 (%):</label>
            <input type="text" id="spo2" name="spo2" required>

            <label for="randomBloodSugar">Random Blood Sugar (mmol/L):</label>
            <input type="text" id="randomBloodSugar" name="randomBloodSugar" required>

            <label for="symptoms">Symptoms:</label>
            <textarea id="symptoms" name="symptoms" rows="4" required></textarea>

            <button type="submit">Add Entry</button>
        </form>
    </div>

</body>
</html>
