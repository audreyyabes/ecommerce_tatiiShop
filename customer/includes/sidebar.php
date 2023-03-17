<?
$active='account';
?>

    
    <div class="container">
    <div id="sidebar" class="panel-body"><!--"panel-body Begin"-->
        <h3 id="myAccount">My Account</h3>
        <ul style="line-height:150%">
            <li class="<?php if(isset($_GET['my_orders'])){ echo"active"; } ?>">
                <a class="<?php if($active=='myorders') echo"active"; ?>" href="my_account.php?my_orders">
                    <i class="fa fa-list"></i> My Orders
                </a>
            </li>
             
            <li class="<?php if(isset($_GET['pay_online'])){ echo"active"; } ?>">
                <a href="my_account.php?pay_online">
                    <i class="fa fa-bolt"></i> Pay Online
                </a>
            </li>
            <li class="<?php if(isset($_GET['edit_account'])){ echo"active"; } ?>">
                <a href="my_account.php?edit_account">
                    <i class="fa fa-pencil"></i> Edit Account
                </a>
            </li>
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                <a href="my_account.php?change_pass">
                    <i class="fa fa-lock"></i> Change Password
                </a>
            </li>
            <li class="<?php if(isset($_GET['delete_account'])){ echo"active"; } ?>">
                <a href="my_account.php?delete_account">
                    <i class="fa fa-trash"></i> Delete Account
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </li>
        </ul>
    </div><!--"panel-body Finish"-->
    </div>