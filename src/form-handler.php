<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Submitted</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-color: #e4f2f2;
      font-family: "Figtree", sans-serif;
    }
  </style>
</head>

<body class="min-h-screen flex justify-center items-center px-4 bg-[#e4f2f2]">
  <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-lg border border-gray-200 text-center">
    <!-- Title -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Thank you!</h2>

    <!-- Status Message -->
    <p class="text-lg text-gray-600 mb-4">Your feedback has been successfully submitted.</p>

    <!-- Loader Animation -->
    <div class="w-16 h-16 border-t-4 border-[#2F93A6] border-solid rounded-full animate-spin mx-auto mb-4"></div>

    <!-- Redirecting Info -->
    <p class="text-lg text-gray-600">You will be redirected shortly.</p>
  </div>

  <script>
    // Redirect to the index page after 2 seconds
    setTimeout(function () {
      window.location.href = 'index.html';
    }, 2000); // Redirect delay in milliseconds
  </script>
</body>

</html>