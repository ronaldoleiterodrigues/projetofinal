<?php
namespace App\Controllers;
use App\Models\Notifications;
use App\Models\VendaDao;

class PainelController extends Notifications
{

    public function Index()
    {
        require_once "Views/Painel/Index.php";
    }
}
?>