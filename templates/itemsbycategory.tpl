
<h2>Nuestra lista de productos en la categoria {$categoria->tipo}:</h2>
<ul class="list-group"> 
    {foreach from= $beers item=$beer}
        <li class="list-group-item">{$beer->nombre}</li> 
    {/foreach}
    


</ul>
