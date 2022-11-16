<div class="list-group">
    {foreach from=$categories item=$category}
        <a href="tipo/{$category->id_tipo}" class="list-group-item list-group-item" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{$category->tipo}</h5>
            </div>
            <p class="mb-1">{$category->descripcion}</p>
            {if $props.login}
                <div>
                <a href="deleteType/{$category->id_tipo}"><button type="button" class="btn btn-danger mb-3">Delete</button>
                
            </div>
            {/if}
        </a>
    {/foreach}
</div>
{if $props.login}
    {include file="formaddtype.tpl"}
{/if}


