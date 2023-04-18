# Assignment-2-with-authorization-enhancement

# ADDED FILE IN LOGIN FOLDER

## Register.php
This page is for guest user to register their credential before they are being authenticate to the Student Detail Reservation Form



## user_management.php
This page is for admin(access_level = 2) which can view, update and delete low privillege user(access_level = 1)
 This is the code form auth.php which shows the access level 
 ```
 
 // Redirect to the appropriate page based on access level
   
   if ($user['access_level'] == 0) {
      // Guest user, redirect to login page
      header('Location: index.php');
    } else if ($user['access_level'] == 1) {
      // Regular user, redirect to student details page
      header('Location: ../reservationform/index.php');
    } else if ($user['access_level'] == 2) {
      // Administrator, redirect to user management page
      header('Location: user_management.php');
    }
    
    ```


## userlvl1.php
This page for user(access_level = 1) which can only update their email and password . Below code is the submit button is press then the updated data will be update in the databse

```

//Check if form is submitted

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

   //Validate form inputs
  
  if (empty($email) || empty($password) || empty($confirm_password)) {
    $error_message = "Please fill in all fields.";
  } else if ($password !== $confirm_password) {
    $error_message = "Password and confirm password do not match.";
  } else {
    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $userId = $_SESSION['id'];
    $stmt = $conn->prepare("UPDATE users SET email = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssi", $email, $hashedPassword, $userId);
    $stmt->execute();
    $stmt->close();
    header("Location: user_management.php");
    exit();
  }
  
  ```
  
