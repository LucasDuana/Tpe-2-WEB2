
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Tipo</th>
        </tr>
    </thead>
    <tbody id="tableBody">
        {foreach from=$beers item=$beer}
            <tr>
                <td><a href="beerInfo/{$beer->id_cerveza}">{$beer->nombre}</a></td>
                <td>{$beer->resumen}</td>
                <td>{$beer->tipo}</td>
                {if $props.login}
                    <td><a href="deleteBeer/{$beer->id_cerveza}"><button type="button" class="btn btn-danger">DELETE</button></td>
                    <td><a href="updateBeer/{$beer->id_cerveza}"><button type="button" class="btn btn-secondary">UPDATE</button></td>
                {/if}

            </tr>
        {/foreach}
    </tbody>
</table>

{include file="templates/formaddbeer.tpl"}
