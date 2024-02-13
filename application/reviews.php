<?php

include "booking_header.php";                 
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reviews</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     
      <?php
  include "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch reviews from the reviews table
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <style>
       

        .container {
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin: 20px;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }

        .review {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #dee2e6;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .review:hover {
            transform: scale(1.02);
        }

        .add-review-button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .add-review-button:hover {
            background-color: #0056b3;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #007BFF;
            border-radius: 4px;
            width: 40%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #007BFF;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #0056b3;
            text-decoration: none;
        }

        /* Star rating styles */
        .stars {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .star {
            font-size: 24px;
            cursor: pointer;
            margin: 0 5px;
            color: #ffc107;
            transition: color 0.3s;
        }

        .star:hover {
            color: #ff9800;
        }

        .star.active {
            color: #ff9800;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            color: #495057;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
   

    <!-- Button to trigger the add review form -->
    <button class="add-review-button" onclick="openReviewForm()">Add Review</button>

    <!-- Display existing reviews -->
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='review'>
                    <p><strong>{$row['name']}</strong></p>
                    <div class='stars'>";
            // Display stars based on rating
            for ($i = 1; $i <= 5; $i++) {
                $class = ($i <= $row['rating']) ? 'star active' : 'star';
                echo "<span class='$class'>&#9733;</span>";
            }
            echo "</div>
                    <p>{$row['review']}</p>
                  </div>";
        }
    } else {
        echo "<p>There are no reviews yet
       <br> Would you like to share your feedback? Leave a review about your experience.</p>";
    }
    ?>
</div>

<!-- Add Review Modal -->
<div id="addReviewModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeReviewForm()">&times;</span>
        <h2>Add Review</h2>
        <form action="process_add_review.php" method="post">
            <div class="stars">
                <span class="star" onclick="setRating(1)">&#9733;</span>
                <span class="star" onclick="setRating(2)">&#9733;</span>
                <span class="star" onclick="setRating(3)">&#9733;</span>
                <span class="star" onclick="setRating(4)">&#9733;</span>
                <span class="star" onclick="setRating(5)">&#9733;</span>
            </div>

            <label for="name">Your Name:</label>
            <input type="text" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" name="email" required>

            <label for="review">Your Review:</label>
            <textarea name="review" rows="4" required></textarea>

            <button type="submit">Submit Review</button>
        </form>
    </div>
</div>

<script>
    function openReviewForm() {
        document.getElementById('addReviewModal').style.display = 'block';
    }

    function closeReviewForm() {
        document.getElementById('addReviewModal').style.display = 'none';
    }

    function setRating(rating) {
        // Highlight selected stars
        for (let i = 1; i <= 5; i++) {
            const star = document.querySelector(`.modal-content .stars .star:nth-child(${i})`);
            star.classList.toggle('active', i <= rating);
        }

        // Update hidden input field with selected rating
        document.querySelector('form input[name="rating"]').value = rating;
    }
</script>

</body>




<?php

include "footer.php";                 
?>
