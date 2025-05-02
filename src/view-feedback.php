<!DOCTYPE html>
<html lang="en">
<!-- 

http://localhost/feedback-form/recovery/src/view-feedback.php

-->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Feedback Entries</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --color-mintOk: #e4f2f2;
      --color-grayOk: #31344c;
      --color-yellowOk: #f7f3ef;
      --color-purpo: #e6e4ff;
      --font-mainm: "Figtreeok", "sans-serif";
    }

    @font-face {
      font-family: "Figtree";
      src: url("/Figtree/static/Figtree-Regular.ttf") format("truetype");
      font-weight: 400;
      font-style: normal;
    }

    body {
      background-color: var(--color-mintOk);
      font-family: "Figtree", sans-serif;
    }
  </style>
</head>

<body class="min-h-screen py-10 px-4 sm:px-6 lg:px-12 bg-[var(--color-mintOk)]">
  <div class="max-w-6xl mx-auto">
    <h1 class="text-5xl font-bold text-center text-gray-800 mb-12">
      📋 User Feedback Entries
    </h1>

    <?php
    $host = 'localhost';
    $db = 'feedback_db';
    $user = 'root';
    $pass = '';

    try {
      $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $pdo->query("SELECT * FROM feedbacks ORDER BY submitted_at DESC");

      echo "<div class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8'>";

      while ($row = $stmt->fetch()) {
        echo "<div class='bg-white border border-gray-200 shadow-sm rounded-2xl p-6 hover:shadow-md transition'>";
        echo "<div class='flex items-center justify-between mb-3'>";
        echo "<h2 class='text-2xl font-semibold text-gray-900'>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<span class='text-base text-gray-400'>" . date("d M Y", strtotime($row['submitted_at'])) . "</span>";
        echo "</div>";
        echo "<p class='text-base text-gray-500 mb-3'>📧 " . htmlspecialchars($row['email']) . "</p>";
        echo "<div class='flex items-center gap-1 text-yellow-500 font-medium mb-4 text-lg'>";
        echo str_repeat('⭐', (int) $row['rating']);
        echo "<span class='text-gray-600 ml-1 text-base'>(" . htmlspecialchars($row['rating']) . "/5)</span>";
        echo "</div>";
        echo "<p class='text-gray-700 text-base leading-relaxed border-t pt-4'>" . nl2br(htmlspecialchars($row['message'])) . "</p>";
        echo "</div>";
      }

      echo "</div>";
    } catch (PDOException $e) {
      echo "<p class='text-red-600 font-medium text-lg'>❌ Database error: " . $e->getMessage() . "</p>";
    }
    ?>
  </div>
</body>

</html>