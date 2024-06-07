<?php
header("Content-type: text/css");
?>

body {
    font-family: Arial, sans-serif;
    background-color: #007BFF;
    margin: 0;
    padding: 0;
    color: #333;
}

h1 {
    color: #fff;
    text-align: center;
    margin-top: 50px;
}

.boton {
    display: inline-block;
    padding: 15px 25px;
    margin: 20px 10px;
    font-size: 20px;
    color: #fff;
    background-color: #0056b3;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.3s;
}

.boton:hover {
    background-color: #003f7f;
    transform: scale(1.1);
}
