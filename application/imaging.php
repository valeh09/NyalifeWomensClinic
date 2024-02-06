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

        .price {
            font-weight: bold;
            color: green;
            margin-top: 10px;
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

        .imaging-results {
            width: 45%;
            margin: 20px;
        }

        .imaging-results h2 {
            text-align: center;
        }

        .imaging-results p {
            margin-bottom: 20px;
        }

        .imaging-results img {
            width: 100%;
            max-width: 400px;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div>
        <h2>Imaging Tests</h2>

        <!-- Form for requesting imaging tests -->
        <form action="process_imaging.php" method="post">
            <label>
                Select Imaging Tests:
                <select id="imagingTests" name="imagingTests[]" multiple="multiple">
                    <option value="Ultrasound" data-price="5000">Ultrasound</option>
                    <option value="X-Ray" data-price="3000">X-Ray</option>
                    <option value="MRI" data-price="8000">MRI</option>
                    <option value="CT Scan" data-price="7000">CT Scan</option>
                    <option value="Mammogram" data-price="4500">Mammogram</option>
                    <option value="Bone Density Scan" data-price="3500">Bone Density Scan</option>
                </select>
            </label>

            <!-- Selected Items Table -->
            <h2>Selected Items</h2>
            <table id="selectedImagingItemsTable">
                <tr>
                    <th>Test</th>
                    <th>Price (Ksh)</th>
                    <th>Action</th>
                </tr>
            </table>
            <button type="button" onclick="addImagingTestsToTable()">Add Tests to Table</button>
            <div class="price">Total Price: Ksh <span id="totalImagingPrice">0</span></div>

            <label>
                Additional Information:
                <textarea name="additionalInfo"></textarea>
            </label>

            <button type="submit">Submit Request</button>
        </form>
    </div>

    <div class="imaging-results">
        <h2>Imaging Results</h2>
        <p><strong>Patient Name:</strong> Samantha Otieno</p>
        <p><strong>Date:</strong> February 20, 2024</p>
        <p><strong>Imaging Report:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac urna id ligula suscipit consequat. Proin eu nunc vitae lectus vestibulum sagittis vel at ligula. Sed auctor cursus erat, vel consectetur purus. Integer non vehicula justo.</p>
        <img src="sample_ultrasound.jpg" alt="Ultrasound Scan">
    </div>

    <script>
        function addImagingTestsToTable() {
            var selectedTests = document.getElementById('imagingTests').selectedOptions;
            var selectedItemsTable = document.getElementById('selectedImagingItemsTable');
            var totalImagingPriceSpan = document.getElementById('totalImagingPrice');

            var totalImagingPrice = parseFloat(totalImagingPriceSpan.textContent) || 0;

            for (var i = 0; i < selectedTests.length; i++) {
                var test = selectedTests[i].text;
                var price = parseFloat(selectedTests[i].getAttribute('data-price'));

                var row = selectedItemsTable.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = test;
                cell2.innerHTML = price.toLocaleString('en-US');
                cell3.innerHTML = '<button onclick="deleteImagingTest(this)">Delete</button>';

                totalImagingPrice += price;
            }

            totalImagingPriceSpan.textContent = totalImagingPrice.toLocaleString('en-US');
        }

        function deleteImagingTest(button) {
            var row = button.parentNode.parentNode;
            var price = parseFloat(row.cells[1].textContent.replace(/\D/g, ''));

            row.parentNode.removeChild(row);

            var totalImagingPriceSpan = document.getElementById('totalImagingPrice');
            var totalImagingPrice = parseFloat(totalImagingPriceSpan.textContent) || 0;
            totalImagingPrice -= price;

            totalImagingPriceSpan.textContent = totalImagingPrice.toLocaleString('en-US');
        }
    </script>

</body>
</html>
