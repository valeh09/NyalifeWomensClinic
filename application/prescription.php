<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
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
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            height: 100px;
            resize: vertical;
            margin-bottom: 10px;
        }

        select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Prescription</h2>

    <!-- Prescription form -->
    <form action="process_prescription.php" method="post">
        <label>
            Patient Name:
            <input type="text" name="patientName" required>
        </label>

        <label>
            Date:
            <input type="date" name="prescriptionDate" required>
        </label>

        <label>
            Select Medication:
            <select name="medication" required>
                <option value="Paracetamol 500mg">Paracetamol 500mg</option>
                <option value="Amoxicillin 500mg">Amoxicillin 500mg</option>
                <option value="Ibuprofen 200mg">Ibuprofen 200mg</option>
                <option value="Aspirin 325mg">Aspirin 325mg</option>
                <option value="Ciprofloxacin 250mg">Ciprofloxacin 250mg</option>
                <option value="Diazepam 5mg">Diazepam 5mg</option>
                <option value="Loratadine 10mg">Loratadine 10mg</option>
                <option value="Omeprazole 20mg">Omeprazole 20mg</option>
                <option value="Hydrochlorothiazide 12.5mg">Hydrochlorothiazide 12.5mg</option>
                <option value="Metformin 500mg">Metformin 500mg</option>
            </select>
        </label>

        <label>
            Select Dosage Instructions:
            <select name="dosageInstructions" required>
                <option value="Take one tablet by mouth daily">Take one tablet by mouth daily</option>
                <option value="Take two tablets by mouth twice a day">Take two tablets by mouth twice a day</option>
                <option value="Take one capsule with food every eight hours">Take one capsule with food every eight hours</option>
                <option value="Apply a thin layer to the affected area once a day">Apply a thin layer to the affected area once a day</option>
                <option value="Inhale two puffs every four hours as needed">Inhale two puffs every four hours as needed</option>
                <option value="Take one tablet on an empty stomach in the morning">Take one tablet on an empty stomach in the morning</option>
                <option value="Take three tablets by mouth before bedtime">Take three tablets by mouth before bedtime</option>
                <option value="Inject one milliliter subcutaneously once a week">Inject one milliliter subcutaneously once a week</option>
                <option value="Dissolve one packet in water and drink daily">Dissolve one packet in water and drink daily</option>
                <option value="Chew two gummies daily with or without food">Chew two gummies daily with or without food</option>
            </select>
        </label>

        <button type="submit">Generate Prescription</button>
    </form>

</body>
</html>
