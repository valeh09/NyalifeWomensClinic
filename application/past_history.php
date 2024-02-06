<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past History</title>
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

        .add-row {
            margin-top: 10px;
            cursor: pointer;
            color: #007bff;
        }
    </style>
</head>
<body>

    <h2>Family and Medical History</h2>

    <!-- Form for adding new data -->
    <form action="process_past_history.php" method="post" id="pastHistoryForm">
        <!-- Family History Section -->
        <h3>Family History</h3>
        <table id="familyHistoryTable">
            <tr>
                <th></th>
                <th>Not</th>
                <th>No</th>
                <th>Sure</th>
                <th>Yes</th>
                <th>Who</th>
            </tr>
            <!-- Default row -->
            <tr>
                <td>Clotting Disorder</td>
                <td><input type="radio" name="clottingDisorder" value="not"></td>
                <td><input type="radio" name="clottingDisorder" value="no"></td>
                <td><input type="radio" name="clottingDisorder" value="sure"></td>
                <td><input type="radio" name="clottingDisorder" value="yes"></td>
                <td><input type="text" name="clottingDisorderWho"></td>
            </tr>
            <!-- Add more rows as needed -->
        </table>

        <!-- Medical History Section -->
        <h3>Medical History</h3>
        <table id="medicalHistoryTable">
            <tr>
                <th>Question</th>
                <th>No</th>
                <th>Yes</th>
                <th>Now</th>
            </tr>
            <!-- Default row -->
            <tr>
                <td>Anemia</td>
                <td><input type="radio" name="anemia" value="no"></td>
                <td><input type="radio" name="anemia" value="yes"></td>
                <td><input type="radio" name="anemia" value="now"></td>
            </tr>
            <!-- Add more rows as needed -->
        </table>

        <div class="add-row" onclick="addNewRow('familyHistoryTable')">+ Add More Family History</div>
        <div class="add-row" onclick="addNewRow('medicalHistoryTable')">+ Add More Medical History</div>

        <button type="submit">Add Entry</button>
    </form>

    <script>
        function addNewRow(tableId) {
            var table = document.getElementById(tableId);
            var newRow = table.insertRow(table.rows.length);
            var defaultRow = table.rows[1]; // Assuming the default row is at index 1

            for (var i = 0; i < defaultRow.cells.length; i++) {
                var newCell = newRow.insertCell(i);
                var cellContent = defaultRow.cells[i].innerHTML;

                if (i === 0) {
                    // For the first cell, just copy the content
                    newCell.innerHTML = cellContent;
                } else {
                    // For other cells, clear the content and update input names
                    newCell.innerHTML = "";
                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = cellContent.toLowerCase().replace(/\s/g, "") + "New";
                    newCell.appendChild(input);
                }
            }
        }
    </script>

</body>
</html>
