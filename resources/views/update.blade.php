<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Usuário -- FHCJr</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="cad-container">
            
        <h2>Atualizar Contato</h2>
        <form action="{{url("contatos/$contato->id")}}" method="post">
            @method('PUT')
            @csrf
            <div class="input-group">
                <label for="nome">Nome do Contato:</label>
                <input type="text" id="nome" name="nome" value="{{$contato->nm_contato ?? ''}}" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{$contato->nm_email  ?? ''}}" required>
            </div>
            <div class="input-group">
                <label for="fone">Telefone:</label>
                <input type="tel" id="fone" name="fone" value="{{$contato->nm_telefone  ?? ''}}" required>
            </div>
            <div class="input-group">
                <label for="obs">Observações:</label>
                <input type="text" id="obs" name="obs" value="{{$contato->nm_obs  ?? ''}}" required>
            </div>
            <br>
                        
            <input style="z-index: 50; display: inline-block;outline: 0;cursor: pointer;border-radius: 6px;border: 2px solid #ff4742;color: #fff;background-color: #ff4742;padding: 8px;box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;font-weight: 800;font-size: 16px;height: 42px;:hover{background: 0 0;color: #ff4742;}" type="submit" value="Atualizar">        
        </form>
    </div>
</body>
</html>