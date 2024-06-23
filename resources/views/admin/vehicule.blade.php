<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
      strong{
            color:black;
            background-color:white;
            font-size:25px;
        } 
        nav{
            width:100%;
            height:50px;
            background-color:white;
            margin-bottom:20px;
        }
        *{
            margin:0;
            padding:0;
            background-color:black;
            color:white;
        }
        .auto{
          display:flex;

        }
        .img{
          width:600px;
          height:450px;
          border:solid 1px black;
          margin-left:20px;
        }
        .img img{
          width: 100%;
          height:100%;
        }
        .info{
          margin-left:40px;
          font-size:30px;
          margin-top:30px;
         
        }
        ul{
          list-style:none;
        }
        li{
          font-size:20px;
          margin-bottom:20px
        }
        .mod{
          margin-top:20px;
        }
        .modifier{
          text-decoration:none;
          margin-left:50px;
          padding:10px;
          color:white;
          background-color:#7171c5;
        }
  </style>
</head>
<body>
<nav>
        <strong>ADMINISTRATION</strong>
    </nav>
  <div class="auto">
  <div class="img">
    
    <img src="/storage/{{$vehicule->visuel}}"   >
  </div>
  <div class="info">
    <ul> les informations concernant le vehicule
      <li class="mod">Modele :   {{$vehicule->modele}}</li>
      <li>Marque :   {{$vehicule->marque}}</li>
      <li>Type :    {{$vehicule->type}}</li>
      <li>Couleur :    {{$vehicule->couleur}}</li>
      <li>Prix :    {{$vehicule->prix}} $ par jour</li>
      <li>Annee de creation :   {{$vehicule->annee}}</li>
      <li><a class="modifier" href="{{route('pdf',$vehicule->id)}}"> Document </a></li>
      </ul>
  </di>
  </div>
</body>
</html>