<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    body {
        background-color: #6699FF;
    }
</style>

<body class="mb-5">
    <main>
        <div class="container">
            <div class="text-center">
                <img src="pokedex.png" class="my-5" alt="pokedex">
            </div>


            <div class="row">
                <div class="col-4"></div>
                <div class="col-3 mx-auto">
                    <input id="nomePokemon" placeholder="Digite o Pokemon" type="text" class="form-control text-center">
                </div>
                <button class="btn btn-primary col-1" id="pesquisarPokemon"><i class="fa-solid fa-magnifying-glass"></i></button>
                <div class="col-4"></div>
            </div>



            <div class="row" id="recebaPokemon"></div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#pesquisarPokemon').click(function() {
                let nomePokemon = $('#nomePokemon').val();

                $('#nomePokemon').val(null);

                fetch('https://pokeapi.co/api/v2/pokemon/' + nomePokemon)
                    .then(response => response.json())
                    .then(json => $('#recebaPokemon').append(`<div class="col-3">
                    <div class="card mt-5">
                <img src="` + json.sprites.other.home.front_default + `" class="card-img-top" alt="` + json.name + `">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-center">` + json.name + `</h5>
                    <p class="text-center">` + json.types[0].type.name + `</p>
                    <p class="card-text">
                    <p><strong>ID: </strong>` + json.id + `</p>
                    <p><strong>Experiencia Base: </strong>` + json.base_experience + `</p>
                    <p><strong>Altura: </strong>` + json.height + `</p>
                    <p><strong>Peso: </strong>` + json.weight + `</p>
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="fw-bold">Habilidade 1: </span>` + json.abilities[0].ability.name + `</li>
                    <li class="list-group-item"><span class="fw-bold">Habilidade 2: </span>` + json.abilities[1].ability.name + `</li>
                    <li class="list-group-item"></li>
                </ul>
            </div>
            </div>`))
                    .catch(err => console.log('Erro', err));
            })
        })
    </script>
</body>

</html>