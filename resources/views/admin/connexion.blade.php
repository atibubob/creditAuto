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
    margin-top:150px;
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
  </style>
</head>
<body>
<nav>
  <h3 class="logo">CreditAUTO</h3>
</nav>
<div class="section">
  <form class="form" action="" method="post">
    @csrf
    <h3>Authentification</h1>
    <label class="lab1">Addresse email</label>
  <input type="email" name="email" value = "" >
  @error("email")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Mot de passe</label>
  <input type="password" name="password" value = "" >
  @error("password")
  <div class="erreur">{{$message}}</div>
  @enderror
        <button>Se connecter</button>
</div>
 </form>
 </div> 
</body>
</html>