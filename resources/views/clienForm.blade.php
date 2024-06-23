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
  a{
    margin-left:680px;
    margin-bottom:-50px;
  }
  </style>
</head>
<body>
<nav>
  <h3 class="logo">CreditAUTO</h3>
</nav>
<div class="section">
  <form cless="form" action="" method="post">
    @csrf
    <h3>Creer un compte </h1>
    <label class="lab1">Nom</label>
  <input type="text" name="nom" value = "">
  @error("nom")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Prenom</label>
  <input type="text" name="prenom" value = "">
  @error("prenom")
  <div class="erreur">{{$message}}</div>
  @enderror
  <label>email</label>
  <input type="email" name="email" value = "">
  @error("email")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Mot de passe</label>
  <input type="password" name="password" value = "">
  @error("password")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Addresse</label>
  <input type="text" name="address" value = "">
  @error("address")
  <div class="erreur">{{$message}}</div>
  @enderror

        <button>Confirmer</button>
</div>
 </form>
 <a href="/login">Vous avez deja un compte ?</a>
 </div> 
</body>
</html>