// Clique sur le bouton supprimer un chapitre
$('.mode-admin-delete').click(function(){
    const id=$(this).data('id');
    $('#modalDelete').attr('href','administration&deletechapter&id='+id);
})

// Clique sur le bouton supprimer un commentaire 
$('.mode-delete').click(function(){
    const idPost=$(this).data('idpost');
    const id=$(this).data('id');
    $('#modalDeleteC').attr('href','deletecomment&id_post='+idPost+'&id='+id);
})

//Clique sur le bouton signaler  
$('.mode-signal').click(function(){
    const idPost=$(this).data('idpost');
    const id=$(this).data('id');
    $('#modalSignalC').attr('href','signalcomment&id_post='+idPost+'&id='+id);
})

if ($('.container-page').height() < 450) {
    $('.container-page').css("height","35em");
} else {
    $('.container-page').css("height","auto");
}