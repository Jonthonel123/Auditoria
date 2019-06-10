<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <?php if (isset($mostrarLogoMenuLateral) && $mostrarLogoMenuLateral === TRUE) : ?>
            <li class="xn-logo">
                <!-- <a href="<?php echo site_url($this->config->item('path_backend') . '/registrados'); ?>"></a> -->
                <a href=""></a>
                <a href="#" class="x-navigation-control"></a>
            </li>
        <?php endif; ?>


        <?php if (isset($mostrarTituloMenuLateral) && $mostrarTituloMenuLateral === TRUE) : ?>
            <li class="xn-title">Navigation</li>
        <?php endif ?>
        <!--
        <li  <?php
                if ($this->uri->segment(2) == "productos")
                    echo  'class="xn-openable active"';
                else
                    echo  'class="xn-openable"';
                ?>>
            <a href="#"><span  class="fa fa-suitcase"></span> <span class="xn-text">Productos</span></a>
            <ul>
                <li <?php
                    if (($this->uri->segment(3) == "" || $this->uri->segment(3) == "listar") && $this->uri->segment(2) == "productos")
                        echo  'class="active"';

                    ?>><a href="<?php echo site_url($this->config->item('path_backend') . '/productos'); ?>"><span class="fa fa-list"></span> Listar</a></li>


                <li <?php
                    if ($this->uri->segment(3) == "agregar" && $this->uri->segment(2) == "productos")
                        echo  'class="active"';

                    ?>><a href="<?php echo site_url($this->config->item('path_backend') . '/productos/agregar'); ?>"><span class="fa fa-plus"></span> Agregar</a></li>
            </ul>
        </li> -->




        <li class="xn-openable">
            <a href="#"><span class="fa fa-suitcase"></span> <span class="xn-text">Informe</span></a>
            <ul>
                <li><a href="<?php echo site_url($this->config->item('path_backend') . '/Informe/listar'); ?>"><span class="fa fa-list"></span> Listar</a></li>
                <li><a href="<?php echo site_url($this->config->item('path_backend') . '/Informe/agregar'); ?>"><span class="fa fa-plus"></span> Agregar</a></li>
            </ul>
        </li>



        <li class="xn-openable">
            <a href="#"><span class="fa fa-briefcase"></span> <span class="xn-text">Area Responsable</span></a>
            <ul>
                <li><a href="<?php echo site_url($this->config->item('path_backend') . '/Area_Responsable/listar'); ?>"><span class="fa fa-list"></span> Listar</a></li>
                <li><a href="<?php echo site_url($this->config->item('path_backend') . '/Area_Responsable/agregar'); ?>"><span class="fa fa-plus"></span> Agregar</a></li>
            </ul>
        </li>


        <!-- <li <?php
                    if ($this->uri->segment(2) == "inicio" || $this->uri->segment(2) == "Area")
                        echo  'class="xn-openable active"';
                    else
                        echo  'class="xn-openable"';
                    ?>>
            <a href="#"><span class="fa fa-suitcase"></span> <span class="xn-text">Area Responsable</span></a>
            <ul>
                <li <?php
                    if (($this->uri->segment(3) == "" || $this->uri->segment(3) == "listar") && ($this->uri->segment(2) == "inicio" || $this->uri->segment(2) == "Area"))
                        echo  'class="active"';

                    ?>><a href="<?php echo site_url($this->config->item('path_backend') . '/inicio'); ?>"><span class="fa fa-list"></span> Listar</a></li>


                <li <?php
                    if (($this->uri->segment(3) == "agregar") && ($this->uri->segment(2) == "inicio" || $this->uri->segment(2) == "Area"))
                        echo  'class="active"';

                    ?>><a href="<?php echo site_url($this->config->item('path_backend') . '/Area/agregar'); ?>"><span class="fa fa-plus"></span> Agregar</a></li>
            </ul>
        </li> -->



        <li class="xn-openable">
            <a href="#"><span class="fa fa-cog"></span> <span class="xn-text">Configuracion</span></a>
            <ul>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-adn"></span> <span class="xn-text">Area</span></a>
                    <ul>
                        <li><a href="<?php echo site_url($this->config->item('path_backend') . '/Area/listar'); ?>"><span class="fa fa-list"></span> Listar</a></li>
                        <li><a href="<?php echo site_url($this->config->item('path_backend') . '/Area/agregar'); ?>"><span class="fa fa-plus"></span> Agregar</a></li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Responsable</span></a>
                    <ul>
                        <li><a href="<?php echo site_url($this->config->item('path_backend') . '/Responsable/listar'); ?>"><span class="fa fa-list"></span> Listar</a></li>

                        <li><a href="<?php echo site_url($this->config->item('path_backend') . '/Responsable/agregar'); ?>"><span class="fa fa-plus"></span> Agregar</a></li>

                    </ul>
                </li>

            </ul>
        </li>











    </ul>
    <!-- END X-NAVIGATION -->
</div>