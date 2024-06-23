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
    margin-bottom:100px;
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
   }
   form{
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    
   }
   input{
    width:400px;
    height:30px;
    margin-bottom:10px;
   }
   button{
    width:400px;
    height:30px;
    border:none;
    color:#fff;
    background-color:#7171c5;
    padding:10px;
    border-radius:5px;
   }
   .erreur{
    font-size:1Opx;
    color:red;
  }
  h3{
    color:#7171c5;
  }
  .lab1{
    margin-top:20px;
  }
  .calc{
    width:400px;
    height:30px;
    border:none;
    color:#fff;
    background-color:#7171c5;
    padding:10px;
    border-radius:5px;
  }
  </style>
</head>
<body>
<nav>
  <h3 class="logo">CreditAUTO</h3>
</nav>
<div class="section">
  <form  action="/louer" method="post">
    @csrf
    <h3>location</h1>
    <label class="lab1">date debut</label>
  <input type="date" name="date_d" id="date_d" value = "" required>
   <label>Date fin</label>
  <input type="date" name="date_f" id="date_f" value = "" required>
  <label>Montant</label>
  <input type="hidden" name="client" value="{{$client}}" required>
  <input type="hidden" name="vehicule"  value="{{$vehicule->id}}" required>
        <button class="conf">Confirmer</button>
</div>
 </form>
</body>
</html>