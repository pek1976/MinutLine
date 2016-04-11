<?php $this->load->view('page/header'); ?>        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
					<?php foreach($menu as $menu_usuario => $va):?>					
						<li><a href="<?php echo site_url("$menu_usuario");?>"><?php echo $va;?></a></li>
                                             
					<?php endforeach;?>
                                                                    						
                    </ul>
                </div>    
                
                <div id="main">
                	<?php $this->load->view($page);?>
                </div>
                <div class="clear"></div>
            </div>
        </div>	
<?php $this->load->view('page/footer'); ?>