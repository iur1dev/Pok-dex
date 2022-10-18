<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark mb-5">
    <main>
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bold text-white">Filmes</h1>
            </div>

            <div class="row">
                <div class="col-4"></div>
                <div class="col-3 mx-auto">
                    <input id="nomeFilme" placeholder="Digite o Filme" type="text" class="form-control text-center">
                </div>
                <button class="btn btn-primary col-1" id="pesquisarFilme"><i class="fa-solid fa-magnifying-glass"></i></button>
                <div class="col-4"></div>
            </div>



            <div class="row" id="recebaFilme"></div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#pesquisarFilme').click(function() {
                let nomeFilme = $('#nomeFilme').val();

                $('#nomeFilme').val(null);

                fetch('https://www.omdbapi.com/?t=' + nomeFilme + '&apikey=6e116de3')
                    .then(response => response.json())
                    .then(json => $('#recebaFilme').append(` <div class="col-3">
                <div class="card mt-5">
                    <img src="` + json.Poster + `" class="card-img-top" alt="` + json.Title + `">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-center">` + json.Title + `</h5>
                        <p class="text-center">` + json.Year + `</p>
                        <p class="card-text">
                        <p><strong>Lançamento: </strong>` + json.Released + `</p>
                        <p><strong>Tempo de filme: </strong>` + json.Runtime + `</p>
                        <p><strong>Genero: </strong>` + json.Genre + `</p>
                        <p><strong>Diretor: </strong>` + json.Director + `</p>
                        </p>
                    </div>
                </div>
            </div>`))
                    .catch(err => console.log('Erro', err));
            })
        })
    </script>
</body>

</html>