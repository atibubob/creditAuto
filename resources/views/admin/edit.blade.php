<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
  body{
  
  }
  form{
    width:1OO%;
    height:200px;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:row;
    flex-wrap:wrap;
    margin-top:10px;
    margin-left:120px;
  }
  input{
    width:350px;
    height:30px;

    
  }
  button{
    border:none;
    color:white;
    background-color:blue;
    padding:10px;
    width: 100px;
    margin-top:10px;
  }
  .erreur{
    font-size:10px;
    margin-bottom:px;
    color:red;
  }
  div{
    width:30%;
    display:flex;
    flex-direction:column;
    margin-left:20px;
  }
  .a{
            text-decoration:none;
            padding: 10px;
            background-color:blue;
            color:white;
            width:200px;
            float:right;
            margin-right:20px;
            margin-bottom:10px;
        
        }
        strong{
            color:white;
            font-size:25px;
        }
        nav{
            width:100%;
            height:50px;
            background-color:black;
            margin-bottom:20px;
        }
        *{
            margin:0;
            padding:0;
        }
</style>

</head>
<body>
<nav>
        <strong>ADMINISTRATION</strong>
</nav>
    <div> <a class="a" href ="/admin/index"> Annuler la modification </a> </div>
  <h3> Modification deu vehicule </h1>
  <form action="" method="post" enctype ="multipart/form-data">
    @csrf
    @method('PATCH')
  <div>
    <label>Modele</label>
  <input type="text" name="modele" value = "{{$vehicule->modele}}">
  @error("modele")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Marque</label>
  <input type="text" name="marque" value = "{{$vehicule->marque}}">
  @error("marque")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Type</label>
  <input type="text" name="type" value = "{{$vehicule->type}}">
  @error("type")
  <div class="erreur">{{$message}}</div>
  @enderror
</div>
<div>
   <label>Couleur</label>
  <input type="text" name="couleur" value = "{{$vehicule->couleur}}">
  @error("couleur")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Prix</label>
  <input type="number" name="prix" value = "{{$vehicule->prix}}">
  @error("prix")
  <div class="erreur">{{$message}}</div>
  @enderror
  <label>annee</label>
  <input type="number" name="annee" value = "{{$vehicule->annee}}">
  @error("annee")
  <div class="erreur">{{$message}}</div>
  @enderror
</div>
  <div>
        <button>Confirmer</button>
</div>
 </form>  
</body>
</html>