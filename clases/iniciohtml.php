<body style="font-size: 12px;">   
    <?php 
        $this->session->c_token = $this->security->get_csrf_hash();
        $hidden = array('hd_form' => '','hd_u' => $this->session->correo,'hd_t' => $this->security->get_csrf_hash());
        echo form_open('',"id='form_inicio'",$hidden); 
    ?>

        <!-- MENU  -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>img/new_logo.JPG" alt="Logo" style="width: auto; height: 25px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <?php echo $menu; ?>
                </ul>
                <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                    <li class="nav-item">
                        <button id="bt_close" type="submit" class="nav-link btn btn-link close">Cerrar</button>
                    </li>                    
                </ul>
            </div>
        </nav>
        <br>

        <!-- INICIO  -->
        <div id="div_inicio" class="container-fluid" style="margin-top:80px;">
            <div class="row" >
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            MSF : Mobile Service Falabella                    
                        </div>
                        <div class="card-body">
                            <img src="<?php echo base_url();?>img/new_logo.JPG" class="img-thumbnail" style="width: auto; height: 50px;" />
                            <p><span id="s_nombre" ></span></p>
                            <p>Mobile Service Falabella.</p>
                            <p>Gestión y administración de servicios y equipamiento telefónico.</p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
