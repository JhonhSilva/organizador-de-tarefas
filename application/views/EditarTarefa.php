<div class="span9">
	<div class="content">

	<div class="module">
    <div class="module-head">
        <h3>Editar tarefa</h3>
    </div>
	<div class="module-body">


<form class="form-horizontal row-fluid" method="POST" action="<?= base_url('tarefa/editar/') . $tarefa_id?>">
 
   <div class="control-group">
        <label class="control-label" for="basicinput">Nome da tarefa</label>
        <div class="controls">
            <input type="text" id="basicinput" name="nomeTarefa" placeholder="<?= $tarefa_nome; ?>" class="span8">
            <span class="help-inline">Minimum 5 Characters</span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="basicinput">Data de entrega</label>
        <div class="controls">
            <input type="date" name="dataEntrega" id="basicinput" placeholder="Data de entrega.." class="span8">
            <span class="help-inline">Minimum 5 Characters</span>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Editar Tarefa</button>
        </div>
    </div>
</form>
	
    </div><!--/.content-->
	</div><!--/.span9-->
</div>