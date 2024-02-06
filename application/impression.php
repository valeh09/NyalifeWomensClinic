<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impression</title>
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

    <h2>Impression</h2>

    <!-- Form for adding new data -->
    <form action="process_impression.php" method="post" id="impressionForm">
        <table id="impressionTable">
            <tr>
                <th>Impression Item</th>
                <th>Details</th>
            </tr>
            <!-- Default rows -->
            <tr>
                <td>Gynecological Condition</td>
                <td><input type="text" name="gynCondition"></td>
            </tr>
            <tr>
                <td>Recommendations</td>
                <td><input type="text" name="recommendations"></td>
            </tr>
            <!-- Add more rows for other impression items -->
        </table>

        <div class="add-row" onclick="addNewRow('impressionTable')">+ Add More</div>

        <button type="submit">Add Impression</button>
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
                    var input;

                    // For text inputs
                    input = document.createElement("input");
                    input.type = "text";
                    input.name = cellContent.toLowerCase().replace(/\s/g, "") + "New";

                    newCell.appendChild(input);
                }
            }
        }
    </script>

</body>
</html>
