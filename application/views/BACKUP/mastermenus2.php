<!-- <?php

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


?> -->

<?php

foreach($menusign as $menus){

    $submenu = $this->db->get_where('gexp_menus', array('MenuParents' => $menus->MenusId));

    if($submenu->num_rows()>0 && $menus->MenuParents==0){

        echo"<li class='nav-item'>
            <a id='lnk' class='nav-link' data-bs-toggle='collapse' href='#ui-".$menus->MenusId."' aria-expanded='false' aria-controls='ui-".$menus->MenusId."'>
                <i style='color:#000000; font-weight:900;' class='menu-icon mdi mdi-cube-send'></i>
                    <span class='menu-title fw-bold'>";
                    echo $menus->MenusName;
                    echo"</span>
                <i style='color:#000000; font-weight:900;' class='menu-arrow'></i> 
            </a>
            <div class='collapse' id='ui-".$menus->MenusId."'>
              <ul class='nav flex-column sub-menu'>";
              foreach($submenu->result() as $sub){
                echo"<li class='nav-item'><a class='nav-link subs fw-bold' href='".base_url($sub->MenusLink)."'>";
                echo $sub->MenusName;
                echo"</a></li>";
                }
              echo"</ul>
            </div>
        </li>";

    }elseif($menus->MenuParents==0){
    
        echo"<li class='nav-item'>
            <a class='nav-link' href='".base_url($menus->MenusLink)."'>
              <i style='color:#000000; font-weight:900;' class='mdi mdi-floor-plan menu-icon'></i>
              <span class='menu-title fw-bold'>";echo $menus->MenusName;
        echo"</span>
            </a>
        </li>";

    }else{
        echo "";
    }

}


?>