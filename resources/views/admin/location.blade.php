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
        body{
            background-color:#fff;
        }
        table{
            width:100%;
            height:auto;
            margin-top:50px;
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
            border:none;
            width: 50%;
          
        }
        .a{
            text-decoration:none;
            padding: 10px;
            background-color:#5454b4;
            color:white;
            float:right;
            margin-right:20px;
            margin-bottom:10px;
        
        }
        nav{
            width:100%;
            height:50px;
            background-color:black;
            margin-bottom:20px;
        }
        form{
            margin-left:20px;
        }
        form button{
            border:none;
            padding:7px;
            color:white;
            background-color:#e35c5c;
            border-radius:4px;
            height:30px;
            margin-right:-70px;
            margin-top:10px;
        }
        .modifier{
            padding:7px;
            color:black;
            height:15px;
            background-color:#9ce89c;
            margin-left:10px;
            margin-top:10px;
            text-decoration:none;
            border-radius:4px;
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
        strong{
            color:white;
            font-size:25px;
        }
        h1{
            float:left;
            margin-bottom:10px;
            font-size:20px;
        }
       
    </style>
</head>
<body>
    <nav>
        <strong>ADMINISTRATION</strong>
        <a class="a" href ="/admin/many"> MENU PRINCIPALE </a>
    </nav>
    <div class="content">
        <div>
        <h1 align="center"> tous les vehicules en location </h1>
        </div>
        <table>
            <thead>
            <tr>
                <th>Modele</th>
                <th>Marque</th>
                <th>Type</th>
                <th>date debut</th>
                <th>date fin</th>
                <th>prix</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($vehicule as $vehicules)
                <tr>
                    <td>{{ $vehicules['modele']}}</td>
                    <td>{{ $vehicules['marque']}}</td>
                    <td>{{ $vehicules['type']}}</td>
                    <td>{{ $vehicules['dd']}}</td>
                    <td>{{ $vehicules['df']}}</td>
                    <td>{{ $vehicules['prix']}}</td>
                    <td class="action">
                        <a class="voir" href="{{route('show',$vehicules['id'])}}">voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
       </table>
</body>
</html>