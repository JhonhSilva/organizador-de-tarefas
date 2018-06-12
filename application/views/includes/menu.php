        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="/usuario/tarefas">Organizador de Tarefas </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php if ($this->session->userdata('logado')) { echo $this->session->userdata('nome'); } ?>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url('usuario/edicao') ?>">Editar Perfil</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/usuario/logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.html"><i class="menu-icon icon-dashboard"></i>Editar Perfil
                                </a></li>
                                <!--<li><a href="message.html"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                                  <?= $tarefas[0]['tarefasHoje'] ?> </b> </a></li> --> 
                                <li><a href="/usuario/tarefas"><i class="menu-icon icon-tasks"></i>Tarefas <b class="label orange pull-right">
                                    <?= count($tarefas) == 0 ? '' : count($tarefas) ?>
                                    </b> </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                          
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="/usuario/logout"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->