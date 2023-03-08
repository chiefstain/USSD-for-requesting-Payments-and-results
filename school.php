<?php
// Define the USSD menu options
$ussd_menu = "CON Welcome to Our School. Please select an option:\n";
$ussd_menu .= "1. Check Results\n";
$ussd_menu .= "2. Check School Fees\n";

// Get the user's response from the USSD gateway
$ussd_text = $_POST['text'];
$phone_number = $_POST['phoneNumber'];

// Check if the user has selected an option or not
if ($ussd_text == "") {
  // Display the USSD menu
  echo $ussd_menu;
} else {
  // Get the user's selected option
  $option = explode("*", $ussd_text);

  // Check the user's selected option and provide a response
  switch ($option[count($option) - 1]) {
    case "1":
      $result = "CON Your results are as follows:\n";
      $result .= "Maths: 80\n";
      $result .= "English: 75\n";
      $result .= "Science: 85\n";
      break;
    case "2":
      $result = "CON Your school fees are as follows:\n";
      $result .= "Tuition: $500\n";
      $result .= "Books: $100\n";
      $result .= "Uniform: $50\n";
      break;
    default:
      $result = "END Invalid option selected. Please try again.";
      break;
  }

  // Send the response back to the user via the USSD gateway
  header('Content-type: text/plain');
  echo $result;
}
?>
