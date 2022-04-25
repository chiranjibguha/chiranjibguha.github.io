<?php
session_start();
if (!isset($_SESSION['loggedin']))
{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="technical.css">
<body>
    <h1>Personal Portfolio</h1>

<?php include 'navigation.php';?>
<div class='container'>
<h1>Technical Skills</h1>
<h3><centre>My Skills</centre></h3><br>
<ul>
  <li>C++</li>
  <li>Linux</li>
  <li>Python</li>
  <li>Java</li>
  <li>HTML</li>
  <li>CSS</li>
  <li>PHP</li>
  <li>JavaScript</li>
</ul>
</div>
</body>
</html>