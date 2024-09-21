<?php
include("php/connection.php");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $user_name = $_POST['user_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordConfirmation = $_POST['password_confirmation'];

  // Validate form data (simple validation)
  if (empty($name) || empty($user_name) || empty($email) || empty($password)) {
      echo "All fields are required.";
  } elseif ($password !== $passwordConfirmation) {
      echo "Passwords do not match.";
  } else {
      // Hash the password
      // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

      // Prepare SQL and bind parameters
      $stmt = $conn->prepare("INSERT INTO users (name, user_name, email, password) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $name, $user_name, $email, $password);

      try {
          // Execute the statement
          $stmt->execute();
          echo "User registered successfully!";
          header("Location: http://localhost/ezpc/signin.php");
      } catch (mysqli_sql_exception $e) {
          if ($e->getCode() == 1062) { // Duplicate entry for unique key
              echo "<script> alert('A user with this email already exists.');</script>";
              header("Location: http://localhost/ezpc/signin.php");
          } else {
              echo "An error occurred: " . $e->getMessage();
          }
      }

      // Close the statement
      $stmt->close();
  }
}

// Close the connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>EZPC-Signup</title>
</head>  
<body>

<section class="bg-stone-100">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
      <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
        <img
          alt=""
          src="https://images.unsplash.com/photo-1649061658110-b239d2cd1a51?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          class="absolute inset-0 h-full w-full object-cover opacity-80"
        />
  
        <div class="hidden lg:relative lg:block lg:p-12">
          
  
          <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
            Welcome to EZPC 
          </h2>
  
          <p class="mt-4 leading-relaxed text-white/90">
            Welcome to EZPC , your go-to destination for all things PC! 
            We are a newly established online store with a passion for technology and a commitment to providing the best in personal computing.
          </p>
        </div>
      </section>
  
      <main
        class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6"
      >
        <div class="max-w-xl lg:max-w-3xl">
          <div class="relative -mt-16 block lg:hidden">
            <a
              class="inline-flex size-16 items-center justify-center rounded-full bg-white text-blue-600 sm:size-20"
              href="#"
            >
              <img src="img/icon1.png" alt="logo" >
            </a>
  
            <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
              Welcome to EZPC
            </h1>
  
            <p class="mt-4 leading-relaxed text-black">
              We are a newly established online store with a passion for technology and a commitment to providing the best in personal computing.
            </p>
          </div>
  
          <form action="" method="post" class="mt-8 grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
              <label for="FirstName" class="block text-sm font-medium text-gray-700">
                Name
              </label>
  
              <input
                type="text"
                id="name"
                name="name"
                class="mt-1 w-full rounded-md border-grey-600 bg-white text-sm text-gray-700 shadow-md p-2 "
              />
            </div>
  
            <div class="col-span-6 sm:col-span-3">
              <label for="LastName" class="block text-sm font-medium text-gray-700">
                User name
              </label>
  
              <input
                type="text"
                id="user_name"
                name="user_name"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-md p-2 "
              />
            </div>
  
            <div class="col-span-6">
              <label for="Email" class="block text-sm font-medium text-gray-700"> Email </label>
  
              <input
                type="email"
                id="Email"
                name="email"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-md p-2 "
              />
            </div>
  
            <div class="col-span-6 sm:col-span-3">
              <label for="Password" class="block text-sm font-medium text-gray-700"> Password </label>
  
              <input
                type="password"
                id="Password"
                name="password"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-md p-2 "
              />
            </div>
  
            <div class="col-span-6 sm:col-span-3">
              <label for="PasswordConfirmation" class="block text-sm font-medium text-gray-700">
                Password Confirmation
              </label>
  
              <input
                type="password"
                id="PasswordConfirmation"
                name="password_confirmation"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-md p-2 "
              />
            </div>
  
            <div class="col-span-6">
              <label for="MarketingAccept" class="flex gap-4">
                <input
                  type="checkbox"
                  id="MarketingAccept"
                  name="marketing_accept"
                  class="size-5 rounded-md border-gray-200 bg-white shadow-sm"
                />
  
                <span class="text-sm text-gray-700">
                  I hereby declare that the information provided is true to the best of my knowledge.
                </span>
              </label>
            </div>
  
            <div class="col-span-6">
              <p class="text-sm text-gray-500">
                By creating an account, you agree to our
                <a href="#" class="text-gray-700 underline"> terms and conditions </a>
                and
                <a href="#" class="text-gray-700 underline">privacy policy</a>.
              </p>
            </div>
  
            <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
              <button
                class="inline-block shrink-0 rounded-md border border-red-600 bg-red-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-red-600 focus:outline-none focus:ring active:text-red-500"
              >
                Create an account
              </button>
  
              <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                Already have an account?
                <a href="signin.html" class="text-gray-700 underline">Sign in</a>.
              </p>
            </div>
          </form>
        </div>
      </main>
    </div>
  </section>
    
</body>
</html>