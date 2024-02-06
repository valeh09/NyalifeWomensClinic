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
            display: flex;
            justify-content: space-between;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin: 20px;
            width: 45%;
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

        .sublist {
            margin-left: 20px;
        }

        .price {
            font-weight: bold;
            color: green;
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

        .lab-results {
            width: 45%;
            margin: 20px;
        }

        .lab-results h2 {
            text-align: center;
        }

        .lab-results p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div>
        <h2>Laboratory Tests</h2>

        <!-- Form for requesting lab tests -->
        <form action="process_lab.php" method="post">
            <label>
                Select Tests:
                <select id="labTests" name="labTests[]" multiple="multiple">
                    <option value="HSV_MCS" data-price="3000">HSV MCS</option>
                    <option value="Urine_MCS" data-price="3000">Urine MCS</option>
                    <option value="Chlamydia_Antibodies" data-price="4550">Chlamydia Antibodies</option>
                    <option value="Insulin" data-price="3500">Insulin</option>
                    <option value="Topical Acetic Acid (HPV)" data-price="2500">Topical Acetic Acid (HPV)</option>
                    <option value="Malaria_Test" data-price="300">Malaria Test</option>
                    <option value="N-GONORRHEA_NAA" data-price="8000">N.GONORRHEA NAA</option>
                    <option value="RPR" data-price="550">RPR</option>
                </select>
            </label>

            <!-- Selected Items Table -->
            <h2>Selected Items</h2>
            <table id="selectedItemsTable">
                <tr>
                    <th>Test</th>
                    <th>Price (Ksh)</th>
                    <th>Action</th>
                </tr>
            </table>
            <button type="button" onclick="addTestsToTable()">Add Tests to Table</button>
            <div class="price">Total Price: Ksh <span id="totalPrice">0</span></div>

            <label>
                GYN Lab Notification:
                <textarea name="labNotification"></textarea>
            </label>

            <button type="submit">Submit Request</button>
        </form>
    </div>

    <div class="lab-results">
        <h2>Lab Results</h2>
        <p><strong>Patient Name:</strong> Samantha Otieno</p>
        <p><strong>Date:</strong> February 15, 2024</p>
        <p><strong>General Lab Report:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac urna id ligula suscipit consequat. Proin eu nunc vitae lectus vestibulum sagittis vel at ligula. Sed auctor cursus erat, vel consectetur purus. Integer non vehicula justo.</p>
        <p><strong>Test Results:</strong></p>
        <table>
            <tr>
                <th>Test</th>
                <th>Result</th>
            </tr>
            <tr>
                <td>Chlamydia</td>
                <td>Positive</td>
            </tr>
            <tr>
                <td>Viral Culture</td>
                <td>Negative</td>
            </tr>
            <!-- Add more rows with dummy data as needed -->
        </table>
    </div>

    <script>
        function addTestsToTable() {
            var selectedTests = document.getElementById('labTests').selectedOptions;
            var selectedItemsTable = document.getElementById('selectedItemsTable');
            var totalPriceSpan = document.getElementById('totalPrice');
            
            var totalPrice = parseFloat(totalPriceSpan.textContent) || 0;

            for (var i = 0; i < selectedTests.length; i++) {
                var test = selectedTests[i].text;
                var price = parseFloat(selectedTests[i].getAttribute('data-price'));

                var row = selectedItemsTable.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = test;
                cell2.innerHTML = price.toLocaleString('en-US');
                cell3.innerHTML = '<button onclick="deleteTest(this)">Delete</button>';
                
                totalPrice += price;
            }

            totalPriceSpan.textContent = totalPrice.toLocaleString('en-US');
        }

        function deleteTest(button) {
            var row = button.parentNode.parentNode;
            var price = parseFloat(row.cells[1].textContent.replace(/\D/g, ''));

            row.parentNode.removeChild(row);

            var totalPriceSpan = document.getElementById('totalPrice');
            var totalPrice = parseFloat(totalPriceSpan.textContent) || 0;
            totalPrice -= price;

            totalPriceSpan.textContent = totalPrice.toLocaleString('en-US');
        }
    </script>

</body>
</html>
