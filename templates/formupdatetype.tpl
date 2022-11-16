{if $props.login}
    <h3>¿Queres modificar el tipo de producto?</h3>
    <form action="updateType/{$id}" method=post>
        <div class="mb-3">
            <label for="exampleInputText" class="form-label">Nombre del tipo de producto</label>
            <input name ="name" type="text" class="form-control" id="exampleInputText" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputText" class="form-label">Descripcion del tipo de producto</label>
            <input name="summary" type="text" class="form-control" id="exampleInputText" required >
        </div>
        <button id="botonadd" type="submit" class="btn btn-primary">Editar Tipo</button>
    </form>
    
{/if}