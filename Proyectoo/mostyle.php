<?php
header("Content-type: text/css");
?>

body {
    font-family: Arial, sans-serif;
    background: url('tu-imagen-de-fondo.jpg') no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    padding: 0;
    color: #333;
}

h1 {
    text-align: center;
    margin-top: 50px;
}

.boton {
    display: inline-block;
    padding: 15px 25px;
    margin: 20px 0;
    font-size: 20px;
    color: #fff;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.3s;
}

.boton:hover {
    background-color: #0056b3;
    transform: scale(1.1);
}

a {
    text-decoration: none;
}

table {
    width: 80%;
    margin: 50px auto;
    border-collapse: collapse;
    background-color: rgba(255, 255, 255, 0.9);
}

table, th, td {
    border: 1px solid #ddd;
    padding: 10px;
}

th {
    background-color: #007BFF;
    color: white;
}

td {
    text-align: center;
}

div {
    text-align: center;
}

hr {
    border: 0;
    height: 1px;
    background: #ccc;
    margin: 20px auto;
    width: 80%;
}

.centered-content {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 50px;
    border-radius: 10px;
    margin-top: 100px;
    width: 80%;
    margin: 0 auto;
}
