<?php
require_once('../model/admin.php');
require_once('../model/updateAdmin.php');


function vueAdmin()
{
    $admins = admin();
    require_once('../template/admin.php');
}

function vueUpdateAdmin($id)
{
    $admins = vueUpdateAdmins($id);
    require_once('../template/updateAdmin.php');
}
