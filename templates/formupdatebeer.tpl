<h3>¿Vas a cambiar el producto?</h3>
<div class="containerform">
    <form action="changeBeer/{$id}" method=post>
    <div class="mb-3">
        <label for="exampleInputText" class="form-label">Nombre del producto</label>
        <input name ="name" type="text" class="form-control" id="exampleInputText" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputText" class="form-label">Descripcion del producto</label>
        <input name="summary" type="text" class="form-control" id="exampleInputText" required >
    </div>
    <div class="mb-3">
        <label for="exampleInputNumber" class="form-label">Precio</label>
        <input name="price"type="number" class="form-control" id="exampleInputNumber" required>
    </div>
    <select name="idtype" class="form-select" aria-label="Default select example" required>
        <option selected>Que tipo es:</option>
        {foreach from=$categories item=$category}
            <option value="{$category->id_tipo}">{$category->tipo}</option>
        {/foreach}
    </select>
    <button id="botonadd" type="submit" class="btn btn-primary">Editar</button>
    </form>

</div>
