<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Testando</title>
</head>
<body>
    
    <div id="resultado"></div>
    <input type="text" id="idConta" value="0">
    <input type="text" id="idContaDestinatario" value="0">
    <input type="text" id="valor" value="0">
    <button class="btn-calcular" >Calcular</button>

    <script>
        $(document).ready(function() {
            
            $(".btn-calcular").on("click", function() {

                const idConta = $("#idConta").val() ?? 0;
                const idContaDestinatario = $("#idContaDestinatario").val() ?? 0;
                const valor = $("#valor").val() ?? 0;
                
                const params = {
                    id: idConta,
                    idDestino: idContaDestinatario,
                    valor
                };
        
                var strParams = jQuery.param(params); // id=1&idDestino=3&valor=500
        
                const urlBase = "http://localhost/curso_php_25/ContaBancaria.php?" + strParams;
        
                $.get(urlBase).then((contas) => {

                    if (!Array.isArray(contas)) {
                        alert(contas);
                        return;
                    }
                    
                    let htmlUl = "<ul>";
        
                    $.each(contas, function (idx, conta) {
                            htmlUl += `<li>id: ${conta.id}</li>`;
                            htmlUl += `<li>Nome: ${conta.nome_titular}</li>`;
                            htmlUl += `<li>Saldo: ${conta.saldo}</li>`;
                            htmlUl += `_____________________`;
                    });
        
                    htmlUl += "</ul>";
                    
                    $("#resultado").html(htmlUl);
                });
            });
            })
    
    </script>
</body>
</html>