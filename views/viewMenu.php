<?php
$menu;

// En tant qu'administrateur le menu apparait avec le bouton d'administration
if(!empty($_SESSION) AND $_SESSION['id'] == 1)
{
    $menu = "<div class=\"dropdown dropright\">
                <a class=\"btn btn-primary dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                " . $_SESSION['pseudo'] . "
                </a>              
                <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"dropdownMenuLink\">
                    <a class=\"dropdown-item menu-hover\" href=\"profile&id=" . $_SESSION['id'] . "\">PROFIL</a>
                 
                    <a class=\"dropdown-item menu-hover\" href=\"administration\">ADMINISTRATION</a>
                  
                    <a class=\"dropdown-item menu-hover\" href=\"disconnection\">DECONNEXION</a>
                </div>
            </div>";
}
// En tant que membre le menu apparait sans le bouton d'administration
else if(!empty($_SESSION) AND $_SESSION['id'] > 1)
{
    $menu = "<div class=\"dropdown dropright\">
                <a class=\"btn btn-primary dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                " . $_SESSION['pseudo'] . "
                </a>              
                <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"dropdownMenuLink\">
                    <a class=\"dropdown-item btn-primary menu-hover\" href=\"profile&id=" . $_SESSION['id'] . "\">PROFIL</a>
                   
                    <a class=\"dropdown-item menu-hover\" href=\"disconnection\">DECONNEXION</a>
                </div>
            </div>";
}
// Si aucun compte n'est connecté, un bouton de connexion est visible
else
{
    $menu = "<a class=\"nav-link text-white\" href=\"authentication\"><i class=\"fas fa-sign-in-alt\"></i> CONNEXION</a>";
}
