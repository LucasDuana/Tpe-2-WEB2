{include file="templates/header.tpl"}
    <h2>Informacion de producto:</h2>
    <ul class="list-group">
        <li class="list-group-item">Nombre: {$beer->nombre}</li>
        <li class="list-group-item">Descripcion: {$beer->descripcion}</li>
        <li class="list-group-item">Tipo de cerveza: {$beer->tipo}</li>
        <li class="list-group-item">Su precio es de: {$beer->precio}$</li>
    </ul>
{include file="templates/footer.tpl"}