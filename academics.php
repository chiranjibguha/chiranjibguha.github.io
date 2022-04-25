<?php
session_start();
if (!isset($_SESSION['loggedin']))
{
         header('Location: login.php');
    }
    include 'navigation.php';
?>
<html>
    <head><link rel='stylesheet' href='academics.css'>
</head>
<body>
<h1>Personal Portfolio</h1>
<h1>My Academics</h1>
<div>
<table>
  <tr>
    <th>Course</th>
    <th>Institute</th>
    <th>Board/University</th>
    <th>Score</th>
    <th>Year</th>
  </tr>
  <tr>
    <td>Class X</td>
    <td>Ramjas School Pusa Road</td>
    <td>CBSE</td>
    <td>10 CGPA</td>
    <td>2017</td>
  </tr>
  <tr>
    <td>Class XII</td>
    <td>Ramjas School Pusa Road</td>
    <td>CBSE</td>
    <td>93.8%</td>
    <td>2019</td>
  </tr>
  <tr>
    <td>BTech CSE</td>
    <td>Bennett University</td>
    <td>University</td>
    <td>8.59 CGPA</td>
    <td>2019-2023</td>
  </tr>
</table>
</div>
</body>    
</html>