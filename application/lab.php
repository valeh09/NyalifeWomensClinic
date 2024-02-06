<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratory Tests</title>
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

        textarea {
            width: 100%;
            height: 100px;
            resize: vertical;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Laboratory Tests</h2>

    <!-- Form for requesting lab tests -->
    <form action="process_lab.php" method="post">
        <label>
            <input type="checkbox" name="tests[]" value="Chlamydia"> Chlamydia
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="Viral culture"> Viral Culture
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="Saline/KOH"> Saline/KOH
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="Topical Acetic Acid (HPV)"> Topical Acetic Acid (HPV)
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="Pap (conventional/thin prep)"> Pap (conventional/thin prep)
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="Gonorrhea"> Gonorrhea
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="RPR"> RPR
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="Serum HSV"> Serum HSV
        </label>
        <label>
            <input type="checkbox" name="tests[]" value="Other"> Other: <input type="text" name="otherTest">
        </label>

        <label>
            HCG Test:
            <select name="hcgTest">
                <option value="positive">Positive</option>
                <option value="negative">Negative</option>
            </select>
        </label>

        <label>
            GYN Lab Notification:
            <textarea name="labNotification"></textarea>
        </label>

        <label>
            Lab Tests from the Lab and Receive Results:
            <input type="text" name="labTestsFromLab">
            Date: <input type="date" name="labTestsDate">
            Initials: <input type="text" name="labTestsInitials">
        </label>

        <button type="submit">Submit Request</button>
    </form>

</body>
</html>
