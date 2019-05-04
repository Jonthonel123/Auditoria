               <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <?php
                    if(isset($nombreWeb) && $nombreWeb!= ""):
                    ?>
                    <span style="color: #fff;display: block;font-size: 18px;left: 50%;line-height: 50px;margin-left: -135px;position: absolute;text-align: center;width: 270px;">
                        AUDITORIA SGI
                    </span>
                    <?php
                    endif;
                    ?>
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->
