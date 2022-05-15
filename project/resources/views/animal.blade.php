<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Cadastro Animais</title>
</head>
<body>
    <div class="screen">
        <div class="image">
            <img src="{{ asset('image/animal_photo.jpg') }}" alt="Descrição da Imagem">
        </div>
        <form method="post" action="{{ route('animal-create') }}" class="form-rigth" >
            @csrf
            <h1>Formulário Pet</h1>

            <Label>Espécie</Label>
            <input type="text" name="especie" placeholder="Espécie do Animal" required>

            <Label>Raça</Label>
            <input type="text" name="raca" placeholder="Raça do Animal" required>

            <Label>Nome do Pet:</Label>
            <input type="text" name="fullname" placeholder="Nome ou Apelido do Pet" required>

            <label for="">Idade do Pet:</label>
            <input type="number" name="nascimento" placeholder="Idade do Pet" required>
            <div><br/>
                <input type="submit" value="Finalizar">
            </div>
        </form>
    </div>
</body>
</html>
