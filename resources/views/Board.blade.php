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
    .conteiner{
        display:flex;
        justify-content:space-between;
    }
   nav{
    width:100%;
    height:40px;
    margin-bottom:20px;
    background-color:#7171c5;
    position: sticky;
    top: 0;
   }
   .logo{
    margin-left:10px;
    color:white;
   }
   .section1{
    width:12%;
    height:120px;
    color:#7171c5;
    border-radius: 10px;
    padding:30px;
    margin-left:10px;
    border:solid 1px #7171c5;
    position: sticky;
    
   }
   .section2{
    width:75%;
    height:auto;
    margin-right:10px;
   }
   .section3{
    width:70%;
    display:none;
    height:auto;
    margin-right:10px;
   }
   ul{
    list-style-type: none;
    font-size:15px;
    margin-bottom:20px;
   }
   
  
  h3{
    color:#7171c5;
  }
  .lab1{
    margin-top:20px;
  }
  button{
    text-decoration:none;
    color:#fff;
    float:right;
    border:solid 1px #7171c5;
    background-color:#fff;
    padding:10px;
    color:#7171c5;
    margin-right:100px;
  }
  button:hover{
    text-decoration:none;
    color:#fff;
    float:right;
    border:solid 1px #fff;
    background-color:#7171c5;
  }
  .vehicule{
    display:flex;
    width:100%;
    height:200px;
    margin-top:20px;
  }
  .img{
          width:40%;
          height:100%;
          margin-right:20px
        }
        .img img{
          width: 100%;
          height:100%;
        }
        .info{
          margin-left:40px;
          font-size:30px;
          margin-top:10px;
          color:#7171c5;
         
        }
        .mod{
          margin-top:20px;
        }
        .delete{
          border:none;
            color:white;
            text-align:center;
            background-color:#7171c5;
            border-radius:4px;
            height:30px;
        }
        .location{
               display:flex;
               align-items:center;
               justify-content:center;
               flex-direction:column;
               margin-left:40px;
        }
        .voir{
            padding:7px;
            color:white;
            height:15px;
            background-color:#5656f5;
            margin-left:100px;
            margin-right:-50px;
            text-decoration:none;
            border-radius:4px;
            margin-top:10px;
        }
        table{
            width:100%;
            height:auto;
            margin-top:20px;
            text-align:center;
            
           
        }
        th{
          
            color:black;
            width: 10%;
         
        }
        tr{
            background-color:#e0e0e0f0;
            height:50px;
        }
        td{
            width: 10%;
        }
        .action{
            display:flex;
            justify-content:center;
            align-items:center;
            border:none;
            width: 10%;
          
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
  <h3 class="logo">CreditAUTO</h3>
  <button class ="b1">Louer une vehicule</button>
  <button class ="b2">Historique des locations</button>
</nav>
<div class="conteiner">
<div class="section1">
<ul>
    <li>{{$login->nom}}-{{$login->prenom}}</li>
    <li>{{$login->email}}</li>
    <li>{{$login->address}}</li>
</ul>
<a class="modifier" href="{{route('update',$login->id)}}">modifier</a>
</div>
<div class="section2">
<h3>Historique des locations</h3>
<table>
            <thead>
            <tr>
                <th>Modele</th>
                <th>Marque</th>
                <th>Type</th>
                <th>Date</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($histo as $vehicules)
                <tr>
                    <td>{{ $vehicules->modele}}</td>
                    <td>{{ $vehicules->marque}}</td>
                    <td>{{ $vehicules->type}}</td>
                    <td>{{ $vehicules->created_at}}</td>
                    <td>{{ number_format($vehicules->prix, thousands_separator: ' ')}}</td>
                    <td class="action">
                        <a class="voir" href="{{route('show',$vehicules->id)}}">voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
       </table>
</div>
<div class="section3">
@foreach($vehicule as $vehicules)
<div class="vehicule">
  <div class="img">
    <img src="/storage/{{$vehicules['image']}}"   >
  </div>
  <div class="info">
    <ul> les informations concernant le vehicule
      <li class="mod">Modele :   {{$vehicules['modele']}}</li>
      <li>Marque :   {{$vehicules['marque']}}</li>
      <li>Type :    {{$vehicules['type']}}</li>
      <li>Couleur :    {{$vehicules['couleur']}}</li>
      <li>Prix :    {{$vehicules['prix']}} $ par jour</li>
      <li>Annee de creation :   {{$vehicules['annee']}}</li>
      </ul>
  </div>
  <div class="location">
  <form action="/index" method = "post">
       @csrf
       <input type="hidden" name="client" value = "{{$login->id}}"> 
       <input type="hidden" name="bolide" value = "{{$vehicules['id']}}"> 
      <button class="delete">Louer</button>
  </form>
  </div>
  </div> 
@endforeach
</div>
</div>




















<script>
   const login = document.querySelector(".b1");
   const histo = document.querySelector(".b2");
        const message = document.querySelector(".section2");
        const form = document.querySelector(".section3");
        login.addEventListener("click", () => {
            message.style.display = "none";
            form.style.display = "block";
})
histo.addEventListener("click", () => {
            message.style.display = "block";
            form.style.display = "none";
})
</script>
</body>
</html>