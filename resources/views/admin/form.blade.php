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
    margin-top:70px;
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
    width: 70px;
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
</style>

</head>
<body>
  <h1 align="center"> Creation des vehicules </h1>
  <form action="" method="post" enctype ="multipart/form-data">
    @csrf
  <div>
    <label>Modele</label>
  <input type="text" name="modele" value = "{{$vehicules->modele}}">
  @error("modele")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Marque</label>
  <input type="text" name="marque" value = "{{$vehicules->marque}}">
  @error("marque")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Type</label>
  <input type="text" name="type" value = "{{$vehicules->type}}">
  @error("type")
  <div class="erreur">{{$message}}</div>
  @enderror
</div>
<div>
   <label>Couleur</label>
  <input type="text" name="couleur" value = "">
  @error("couleur")
  <div class="erreur">{{$message}}</div>
  @enderror
   <label>Prix</label>
  <input type="number" name="prix" value = "">
  @error("prix")
  <div class="erreur">{{$message}}</div>
  @enderror
  <label>annee</label>
  <input type="number" name="annee" value = "{{$vehicules->annee}}">
  @error("annee")
  <div class="erreur">{{$message}}</div>
  @enderror
</div>
  <div>
   <label>Document</label>
  <input type="file" name="document" accept = ".pdf" value = "" enctype = "">
  @error("document")
  <div class="erreur">{{$message}}</div>
  @enderror
  <label>Visuel</label>
  <input type="file" name="visuel" accept = ".jpeg, .png, .jpg" value = "">
  @error("visuel")
  <div class="erreur">{{$message}}</div>
  @enderror

        <button>Creer</button>
</div>
 </form>
 <a class="a" href ="/admin/index"> Retour </a>  
</body>
</html>