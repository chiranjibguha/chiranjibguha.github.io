<?php
session_start();
if (!isset($_SESSION['loggedin']))
{
         header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="contactme.css">
<body>
<h1>Personal Portfolio</h1>
<h3>Contact Form</h3>
<?php include 'navigation.php';?>
<div class="container">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
    <br>
    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    <br>
    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="India">India</option>
      <option value="Russia">Russia</option>
      <option value="USA">USA</option>
      <option value="other">other</option>
    </select>
    <br>
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
    <br>
    <input type="submit" value="Submit">
  </form>
</div>
</body>
</html>
