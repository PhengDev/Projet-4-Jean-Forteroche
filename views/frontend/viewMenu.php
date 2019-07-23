<?php
$menu;

// En tant qu'administrateur le menu apparait avec le bouton d'administration
if(!empty($_SESSION) == 'admin')
{
    $menu = "<div class=\"dropdown\">
                <a class=\"btn btn-outline-primary dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                Bienvenue " . $_SESSION['pseudo'] . "
                </a>              
                <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"dropdownMenuLink\">
                    <a class=\"dropdown-item\" href=\"profile&id=" . $_SESSION['id'] . "\">PROFIL</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"administration\">ADMINISTRATION</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"disconnection\">DECONNEXION</a>
                </div>
            </div>";
}
// En tant que membre le menu apparait sans le bouton d'administration
else if(!empty($_SESSION) == 'members')
{
    $menu = "<div class=\"dropdown\">
                <a class=\"btn btn-outline-primary dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                Bienvenue " . $_SESSION['pseudo'] . "
                </a>              
                <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"dropdownMenuLink\">
                    <a class=\"dropdown-item\" href=\"profile&id=" . $_SESSION['id'] . "\">PROFIL</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"disconnection\">DECONNEXION</a>
                </div>
            </div>";
}
// Si aucun compte n'est connecté, un bouton de connexion est visible
else
{
    $menu = "<a class=\"nav-link text-white\" href=\"authentication\"><i class=\"fas fa-sign-in-alt\"></i> CONNEXION</a>";
}