<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <style>
    *{
      margin:0;
      padding:0;
    }
   nav{
    width:100%;
    height:40px;
    margin-bottom:50px;
    background-color:#7171c5;
   }
   .logo{
    margin-left:10px;
    color:white;
   }
   .section{
    display:flex;
    justify-content:center;
    align-items:center;
    margin-top :200px;
   }
   a{
     text-decoration :none;
     color :white;
     background-color:#7171c5;
     width:150px;
     height:50px;
     text-align:center;
     padding:50px;
     margin-left:20px;
     font-size:20px;
   }
  
  </style>
</head>
<body>
<nav>
  <h3 class="logo">CreditAUTO-------------MENU PRINCIPALE</h3>
</nav>
<div class="section"> 
 <a href="/admin/user">Gestion des administrateurs</a>
 <a href="/admin/client">Gestion des clients</a>
 <a href="/admin/index">Gestion des vehicules</a>
 <a href="/admin/location">liste des vehicules en location</a>
 <a href="/admin/userForm">Ajouter un nouveau administrateur</a>
 </div> 
</body>
</html>