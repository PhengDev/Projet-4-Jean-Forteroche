<?php
$signal;

if ($signalsComments) {
        $signal = "<table class=\"table table-responsive-sm text-center table-responsive-sm test\">
                        <thead class=\"thead-light\">
                            <tr>
                                <th scope=\"col\">Chapitre</th>
                                <th scope=\"col\">Auteur</th>
                                <th scope=\"col\">Message</th>
                                <th scope=\"col\">Editer</th>
                            </tr>
                        </thead>";
                        foreach ($signalsComments as $signalComment) {
                        $signal.= 
                        "<tbody>
                            <tr>
                                <td>" . $signalComment->titlePost() . "</td>
                                <td>" . $signalComment->author() . "</td>
                                <td>" . html_entity_decode($signalComment->comment()) . "</td>
                                <td>
                                    <div class=\"text-center\">
                                        <a class=\"btn btn-primary btn-sm\" href=\"editsignal&amp;id=" . $signalComment->idPost() . "\">Voir les commentaires signalés</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>";
                        }
                    $signal.= "</table>";            
} else {
    $signal = '<h2 class=\'text-center text-success\'>Aucun signalement</h2>';
}