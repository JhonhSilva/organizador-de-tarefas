	<div class="span9">
					<div class="content">

						<div class="module message">
							<div class="module-head">
								<h3>Controle de tarefas</h3>
							</div>
							<div class="module-option clearfix">
								<div class="pull-left">
									Filtro : &nbsp;
									<div class="btn-group">
										<button class="btn">Todas</button>
										<button class="btn dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a <a href="<?= base_url('tarefa/filtrar/') . 0 ?>">Todas</a></li>
											<li><a <a href="<?= base_url('tarefa/filtrar/') . 1 ?>">Em Progresso</a></li>
											<li><a <a href="<?= base_url('tarefa/filtrar/') . 2 ?>">Feitas</a></li>
										</ul>
									</div>
								</div>
								<div class="pull-right">
									<p id="criar-tarefa" class="btn btn-primary">Criar Tarefa</p>
								</div>
							</div>
							<div class="module-body table">				

								<table class="table table-message">
									<tbody>
										<tr class="heading">
											<td class="cell-icon"></td>
											<td class="cell-title">Tarefas</td>
											<td class="cell-status hidden-phone hidden-tablet">Status</td>
											<td class="cell-time align-right">Data de Entrega</td>
											<td class="cell-time align-right">Deletar Tarefa</td>
										</tr>
										<?php if (count($tarefas) == 0) { ?>
											<tr class="task">
    											<td class="cell-icon" style="width: 20px"></td>
    											<td class="cell-title"><div>Nenhuma tarefa encontrada</div></td>
    											<td class="cell-status hidden-phone hidden-tablet"></td>
    											<td class="cell-time align-right"></td>
    										</tr>
                                        <?php } else { ?>
                                        <?php foreach ($tarefas as $tarefa) : ?>
                                            <tr class="task <?php echo $tarefa['status_id'] == 1 ? 'resolved' : '' ?>">
                                                
                                                <td class="cell-icon" style="width: 20px"><a href="<?= base_url('tarefa/atualizar/') . $tarefa['tarefa_id'] . '/' . $tarefa['status_id'] ?>" class="" title="Atualizar"><span data-feather="edit"></span>
                                                    <i class="icon-checker high"></i>
                                                     </a>
                                                </td>
    											<td class="cell-title"><div> <?= $tarefa['tarefa_descricao'] ?></div></td>
    											<td class="cell-title">
    											    <?php if ($tarefa['status_id'] == '2') { ?>
    											         <b class="btn alert-info">
    											         Pendente
    											         </b>
    											    <?php } else { ?>
    											        <b class="btn alert-success">
    											            Concluida
    											        </b>
    											        <?php } ?>
    											 </td>
    											<td class="cell-time align-right"><?= $tarefa['tarefa_data_termino'] ?></td>
    											<td class="cell-time align-right">
    											    <p  id="delete-btn" class="" title="Atualizar">
                                                        X    
                                                    </p>
    											</td>
										    </tr>
                                        <?php endforeach; }  ?>
									</tbody>
								</table>


							</div>
							<div class="module-foot">
							</div>
						</div>
						
					</div><!--/.content-->
				</div><!--/.span9-->

<script src="https://unpkg.com/sweetalert2@7.22.2/dist/sweetalert2.all.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
   document.getElementById("delete-btn").addEventListener("click", function (event)
        {
            swal({
                    title: "Você deseja deletar a tarefa?",
                    text: "Você não pode recuperar uma tarefa deletada!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText:  "Sim, delete!",
					cancelButtonText: 'Não, desejo voltar!',
					reverseButtons: true
                })
                .then((result) => {
				  if (result.value) {
				    swal("!", "Sua tarefa foi deletada", "success")
                        .then(() => { window.location.href = "<?= base_url('tarefa/deletar/') . $tarefa['tarefa_id'] ?>";
                    });
				  } else {
                    	swal("Cancelado", "Sua tarefa está a salvo :)", "error");
                  }
				})
            });
</script>


<script>
	  document.getElementById("criar-tarefa").addEventListener("click", function (event)
        {
swal.mixin({ 
  input: 'text',
  confirmButtonText: 'Next &rarr;',
  showCancelButton: true,
  progressSteps: ['1', '2', '3'],
  reverseButtons: true
}).queue([
  
  {
  	title: 'Nome da tarefa',
  	text: 'Escolha um nome para a sua tarefa'
  },
  {
   title: 'Date picker',
    html: '<div id="datepicker"></div>',
    onOpen: function() {
    	$('#datepicker').datepicker({
            dateFormat: 'yy/mm/dd',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
      })
    },
    preConfirm: function() {
      return Promise.resolve($('#datepicker').datepicker({ dateFormat: 'dd,MM,yyyy' }).val())
    }
  }
]).then((result) => {
  if (result.value) {
    swal("!", "Sua tarefa foi criada com sucesso", "success")
    .then(() => { window.location.href = "<?= base_url('tarefa/criar/')?>" + result.value[0] + '/' + encodeURI(result.value[1]);});
  }
})



        	
        })
</script>