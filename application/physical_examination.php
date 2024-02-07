<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physical Examination</title>
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

        .exams {
            margin-top: 20px;
        }

        .checkbox-group {
            margin-bottom: 10px;
        }

        .checkbox-group label {
            margin-right: 20px;
        }

        .textarea-group {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div>
        <h2>Physical Examination</h2>

        <!-- Form for physical examination -->
        <form action="process_physical_exam.php" method="post">
            <div class="exams">
                <h3>GENERAL PHYSICAL EXAM</h3>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="thyroid" value="Indicated"> Thyroid - Indicated
                    </label>
                    <label>
                        <input type="checkbox" name="thyroid" value="Not Indicated"> Thyroid - Not Indicated
                    </label>
                </div>

                <div class="textarea-group">
                    <label for="lungs">Lungs:</label>
                    <textarea name="lungs" id="lungs" placeholder="Describe"></textarea>
                </div>

                <div class="textarea-group">
                    <label for="heart">Heart:</label>
                    <textarea name="heart" id="heart" placeholder="Describe"></textarea>
                </div>

                <div class="textarea-group">
                    <label for="abdomen">Abdomen:</label>
                    <textarea name="abdomen" id="abdomen" placeholder="Describe"></textarea>
                </div>

                <div class="textarea-group">
                    <label for="extremities">Extremities:</label>
                    <textarea name="extremities" id="extremities" placeholder="Describe"></textarea>
                </div>

                <div class="textarea-group">
                    <label for="other">Other:</label>
                    <textarea name="other" id="other" placeholder="Describe"></textarea>
                </div>
            </div>

            <div class="exams">
                <h3>BREAST EXAM</h3>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="breast" value="Indicated"> Breast Exam - Indicated
                    </label>
                    <label>
                        <input type="checkbox" name="breast" value="Not Indicated"> Breast Exam - Not Indicated
                    </label>
                </div>

                <div>
                    <label>R: </label>
                    <input type="radio" name="r_breast" value="Nl"> Nl
                    <input type="radio" name="r_breast" value="Abnl"> Abnl
                    <input type="radio" name="r_breast" value="Fibrous"> Fibrous
                    <input type="radio" name="r_breast" value="Cystic mass"> Cystic mass
                    <input type="radio" name="r_breast" value="D/C"> D/C
                    <label for="r_breast_description">Describe:</label>
                    <input type="text" name="r_breast_description" id="r_breast_description">
                </div>

                <div>
                    <label>L: </label>
                    <input type="radio" name="l_breast" value="Nl"> Nl
                    <input type="radio" name="l_breast" value="Abnl"> Abnl
                    <input type="radio" name="l_breast" value="Fibrous"> Fibrous
                    <input type="radio" name="l_breast" value="Cystic mass"> Cystic mass
                    <input type="radio" name="l_breast" value="D/C"> D/C
                    <label for="l_breast_description">Describe:</label>
                    <input type="text" name="l_breast_description" id="l_breast_description">
                </div>
            </div>

            <div class="exams">
                <h3>PELVIC EXAM</h3>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="pelvic" value="Indicated"> Pelvic Exam - Indicated
                    </label>
                    <label>
                        <input type="checkbox" name="pelvic" value="Not Indicated"> Pelvic Exam - Not Indicated
                    </label>
                </div>

                <div class="textarea-group">
                    <label>External genitalia:</label>
                    <label><input type="radio" name="external_genitalia" value="Nl"> Nl</label>
                    <label><input type="radio" name="external_genitalia" value="Abnl"> Abnl</label>
                    <label><input type="radio" name="external_genitalia" value="Vulvitis"> Vulvitis</label>
                    <label><input type="radio" name="external_genitalia" value="Folliculitis"> Folliculitis</label>
                    <label><input type="radio" name="external_genitalia" value="Condyloma"> Condyloma</label>
                    <label><input type="radio" name="external_genitalia" value="Herpes"> Herpes</label>
                    <label><input type="radio" name="external_genitalia" value="Bartholins_cyst"> Bartholins cyst</label>
                    <label><input type="radio" name="external_genitalia" value="Lice_nits"> Lice/nits</label>
                    <label>Other: Describe <input type="text" name="external_genitalia_description"></label>
                </div>

                <!-- Add other sections as needed -->

            </div>

            <button type="submit">Submit Exam</button>
        </form>
    </div>

</body>
</html>
