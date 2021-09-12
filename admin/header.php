<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      /* min-height: 100vh; */
      width: 100%;
      background-color: #fff;
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
      color: white;
      background: #333 url(/images/classy_fabric.png);
      height:auto;
    }

    h2 {
      color: white
    }

    h4{
      color:black;
      text-transform: capitalize;
    }

    .side-navbar {
      width: 250px;
      height: 100%;
      position: fixed;
      margin-left: -300px;
      background-color: #100901;
      transition: 0.4s;
    }

    .nav-link:active,
    .nav-link:focus,
    .nav-link:hover {
      background-color: #ffffff26;
    }

    .my-container {
      transition: 0.4s;
    }

    .active-nav {
      margin-left: 0;
    }

    /* for main section */
    .active-cont {
      margin-left: 250px;
    }

    #menu-btn 
    {
      background-color: #100901;
      color: #fff;
    }

    .my-container input {
      border-radius: 2rem;
      padding: 2px 20px;
    }

    .navbar {
      background: black;
      width: 100%;
    }

    .nav-link i{
      color:#f5a7a7;
    }

    /* -------------FORM STYLE--------------*/
    form {
      background: #111;
      width: 600px;
      margin: 30px auto;
      border-radius: 0.4em;
      border: 1px solid #191919;
      overflow: hidden;
      /* position: relative; */
      box-shadow: 0 5px 10px 5px rgba(0, 0, 0, 0.2);
    }

    form:after {
      content: "";
      display: block;
      position: absolute;
      height: 1px;
      width: 100px;
      left: 20%;
      background: linear-gradient(left, #111, #444, #b6b6b8, #444, #111);
      top: 0;
      color: white;
    }
    #adminarea
    {
      margin-top:10px;
      width: 0ch;
      overflow: hidden;
      white-space: nowrap;
      animation: text 6s  infinite alternate;
      border-right: 3px solid black;
    }
    @keyframes text{
      0%{
        width:0ch;
      }
      50% {
        width:10ch;
      }
    }

    form:before {
      content: "";
      display: block;
      position: absolute;
      width: 8px;
      height: 5px;
      border-radius: 50%;
      left: 34%;
      top: -7px;
      box-shadow: 0 0 6px 4px #fff;
    }

    .inset {
      padding: 20px;
      border-top: 1px solid #19191a;
    }

    form h1 {
      font-size: 18px;
      text-shadow: 0 1px 0 black;
      text-align: center;
      padding: 15px 0px 0px 0px;
      border-bottom: 1px solid rgba(0, 0, 0, 1);
      position: relative;
    }

    form h1:after {
      content: "";
      display: block;
      width: 250px;
      height: 100px;
      position: absolute;
      top: 0;
      left: 50px;
      pointer-events: none;
      transform: rotate(70deg);
      background: linear-gradient(50deg, rgba(255, 255, 255, 0.15), rgba(0, 0, 0, 0));
      color: white;

    }

    label {
      color: white;
      display: block;

    }

    input[type=text],
    input[type=password],
    input[type=date],
    input[type=number],
    input[type=file],
    textarea {
      width: 100%;
      padding: 8px 5px;
      background: linear-gradient(#1f2124, #27292c);
      border: 1px solid #222;
      box-shadow:
        0 1px 0 rgba(255, 255, 255, 0.1);
      border-radius: 0.3em;
      margin-bottom: 20px;
      color: white;
    }

    #textareaa 
    {
      width: 100%;
      padding: 8px 5px;
      background: linear-gradient(#1f2124, #27292c);
      /* border: 1px solid #222; */
      box-shadow:
        0 1px 0 rgba(255, 255, 255, 0.1);
      /* border-radius: 0.3em; */
      margin-bottom: 20px;
      color: white;
    }

    input[type=submit],
    #cancel {
      padding: 5px 40px 5px 40px;
      margin: 0px 50px;
      border: 1px solid rgba(0, 0, 0, 0.4);
      text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
      box-shadow:
        inset 0 1px 0 rgba(255, 255, 255, 0.3),
        inset 0 10px 10px rgba(255, 255, 255, 0.1);
      border-radius: 0.3em;
      background: #F5A7A7;
      color: black;
      font-weight: bold;
      cursor: pointer;
      font-size: 15px;
      font-size: 14px
    }

    input[type=submit]:hover {
      box-shadow:
        inset 0 1px 0 rgba(255, 255, 255, 0.3),
        inset 0 -10px 10px rgba(255, 255, 255, 0.1);
    }

    input[type=text]:hover,
    input[type=file]:hover,
    input[type=number]:hover,
    label:hover~input[type=text] {
      background: #27292c;
      color: white;
    }

    #textareaa:hover{
      background: #27292c;
      color: white;  
    }

    /*-------------FORM END-------------------*/

    /*-------------TABLE START-------------------*/
    @media screen and (max-width: 768px) {
      body{
        height:auto;
      }
      h2 {
        font-size: 18px;
      }

      .table thead {
        display: none;
      }

      .table,
      .table tbody,
      .table tr,
      .table td {
        display: block;
        width: 100%;
      }

      .table tr {
        margin-bottom: 15px;
      }

      .table td {
        margin-bottom: 15px;
        padding-bottom: 10px;
      }

      .table tbody tr td {
        text-align: right;
        padding-left: 50%;
        position: relative;
      }

      .table td:before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        text-align: left;
        font-size: 14px;
        font-weight: 600;
      }

      .box {
        display: block;
        position: absolute;
      }
    }

    @media screen and (max-width: 530px) {

      #delete,
      #view {
        padding: 5px;
      }
    }
    tr:hover {background-color:#f0f0f0;}
    /*Add course*/
    .box {      
      background-color: white;
      padding: 5px;
      border-radius: 5px;
      text-decoration: none;
      color: black;
      font-size:16px;
    }

    .add {
      float: right;
      margin-right: 15px;
    }

    .box:hover {
      color: white;
      background: black;
    }

    .box i{
      font-size:14px;
    }

    .add-btn {
        font-size: 14px;
      }

    tbody tr:hover {

      background: #464446;
    }

    @media screen and (max-width:767px) {
      .add {
        float: right;
        margin-right: 65px;
        margin-top: 10px
      }

      .add-btn {
        display: none;
      }