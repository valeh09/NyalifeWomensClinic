<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gynecology Procedures</title>
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


        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
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


    <h2>Gynecology Procedures</h2>

    <!-- Procedure selection form -->
    <form action="process_procedures.php" method="post">
        <label>Select procedures for the patient:</label>

        <!-- List of gynecology procedures with checkboxes -->
        <ul>
            <li><label><input type="checkbox" name="procedures[]" value="Pap Smear"> Pap Smear</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Colposcopy"> Colposcopy</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Hysteroscopy"> Hysteroscopy</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Endometrial Biopsy"> Endometrial Biopsy</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Pelvic Ultrasound"> Pelvic Ultrasound</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Mammogram"> Mammogram</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Ovarian Cystectomy"> Ovarian Cystectomy</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Cervical Cerclage"> Cervical Cerclage</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Tubal Ligation"> Tubal Ligation</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="LEEP Procedure"> LEEP Procedure</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Myomectomy"> Myomectomy</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Hysterectomy"> Hysterectomy</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Vaginal Rejuvenation"> Vaginal Rejuvenation</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Dilation and Curettage (D&C)"> Dilation and Curettage (D&C)</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Uterine Artery Embolization"> Uterine Artery Embolization</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Cystoscopy"> Cystoscopy</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Intrauterine Device (IUD) Placement"> Intrauterine Device (IUD) Placement</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Amniocentesis"> Amniocentesis</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Fetal Monitoring"> Fetal Monitoring</label></li>
            <li><label><input type="checkbox" name="procedures[]" value="Cesarean Section"> Cesarean Section</label></li>
            <!-- Add more procedures as needed -->
        </ul>

        <table>
        <thead>
            <tr>
                <th>Procedure</th>
                <th>Additional Details</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dummy data for selected procedures -->
            <tr>
                <td>Pap Smear</td>
                <td>No additional details</td>
            </tr>
            <tr>
                <td>Colposcopy</td>
                <td>Biopsy scheduled</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

        <input type="submit" value="Submit Procedures">
    </form>

