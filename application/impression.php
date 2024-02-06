<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gyn Impressions</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Gynecological Impressions</h2>

    <!-- Form for adding new gynecological impressions -->
    <form action="process_impression.php" method="post">
        <label for="impressionType">Select Impression:</label>
        <select id="impressionType" name="impressionType">
            <option value="endometriosis">Endometriosis</option>
            <option value="pcos">Polycystic Ovary Syndrome (PCOS)</option>
            <option value="fibroids">Uterine Fibroids</option>
            <option value="cervical-cancer">Cervical Cancer</option>
            <!-- Add more options with real gynecological impression names -->
        </select>

        <br>

        <label for="impressionDescription">Description:</label>
        <textarea id="impressionDescription" name="impressionDescription" rows="4" cols="50"></textarea>

        <br>

        <button type="submit">Add Impression</button>
    </form>

    <!-- Table displaying dummy data of previously performed impressions -->
    <h2>Previously Performed Impressions</h2>
    <table>
        <tr>
            <th>Impression Type</th>
            <th>Description</th>
        </tr>
        <tr>
            <td>Endometriosis</td>
            <td>Details about the endometriosis condition.</td>
        </tr>
        <tr>
            <td>Polycystic Ovary Syndrome (PCOS)</td>
            <td>Details about the PCOS condition.</td>
        </tr>
        <tr>
            <td>Uterine Fibroids</td>
            <td>Details about the uterine fibroids condition.</td>
        </tr>
        <tr>
            <td>Cervical Cancer</td>
            <td>Details about the cervical cancer condition.</td>
        </tr>
        <!-- Add more rows with dummy data as needed -->
    </table>

</body>
</html>
