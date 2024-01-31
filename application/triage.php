<?php
// Sample triage data for Samantha Otieno
$triageData = array(
    array('Date' => '2024-03-01', 'Temperature' => '98.6°F', 'BloodPressure' => '120/80 mmHg', 'HeartRate' => '72 bpm', 'Symptoms' => 'Headache, Fatigue'),
    array('Date' => '2024-03-15', 'Temperature' => '99.2°F', 'BloodPressure' => '118/78 mmHg', 'HeartRate' => '75 bpm', 'Symptoms' => 'Sore throat, Cough'),
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
            echo '<p><strong>Temperature:</strong> ' . $entry['Temperature'] . '</p>';
            echo '<p><strong>Blood Pressure:</strong> ' . $entry['BloodPressure'] . '</p>';
            echo '<p><strong>Heart Rate:</strong> ' . $entry['HeartRate'] . '</p>';
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

            <label for="temperature">Temperature:</label>
            <input type="text" id="temperature" name="temperature" required>

            <label for="bloodPressure">Blood Pressure:</label>
            <input type="text" id="bloodPressure" name="bloodPressure" required>

            <label for="heartRate">Heart Rate:</label>
            <input type="text" id="heartRate" name="heartRate" required>

            <label for="symptoms">Symptoms:</label>
            <textarea id="symptoms" name="symptoms" rows="4" required></textarea>

            <button type="submit">Add Entry</button>
        </form>
    </div>

</body>
</html>
