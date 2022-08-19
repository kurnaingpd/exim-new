<!-- <nav id="menu" class="nav-main" role="navigation">
								
                                <ul class="nav nav-main">

									<li>
										<a href="index.html">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
                                    </li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span>Pages</span>
										</a>
										<ul class="nav nav-children">
											
											<li>
												<a href="pages-404.html">
 													<i class="fa fa-copy" aria-hidden="true"></i> 404
												</a>
											</li>
											<li>
												<a href="pages-500.html">
													<i class="fa fa-copy" aria-hidden="true"></i> 500
												</a>
											</li>
											<li>
												<a href="pages-log-viewer.html">
													<i class="fa fa-copy" aria-hidden="true"></i> Log Viewer
												</a>
											</li>
											
										</ul>
									</li>

								</ul>
</nav> -->

<?php

foreach($menusign as $menus){

    $submenu = $this->db->get_where('gexp_menus', array('MenuParents' => $menus->MenusId));

    if($submenu->num_rows()>0 && $menus->MenuParents==0){
   
    echo "
        <li class='nav-parent'>
            <a>
                <i class='fa fa-copy' aria-hidden='true'></i>
                <span>";
                echo $menus->MenusName;
                echo"</span>
            </a>
            <ul class='nav nav-children'>";

            foreach($submenu->result() as $sub){
              echo "<li>
						<a href='".base_url($sub->MenusLink)."'>
                        <i class='fa fa-copy' aria-hidden='true'></i>";
                        echo $sub->MenusName;
                        echo"
						</a>
                    </li>";
            }
            echo"</ul>
        </li>";
    }elseif($menus->MenuParents==0){
    
        echo "<li>
                <a href='".base_url($menus->MenusLink)."'>
                    <i class='fa fa-folder' aria-hidden='true'></i>
                    <span>";
                    echo $menus->MenusName;
              echo"</span>
                </a>
            </li>";
    }else{
        echo "";
    }

}


?>