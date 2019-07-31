// Clique sur le bouton supprimer un chapitre
$('.trash').click(function(){
    const id=$(this).data('id');
    $('#modalDelete').attr('href','administration&deletechapter&id='+id);
})

// Clique sur le bouton supprimer un commentaire 
$('.trash2').click(function(){
    const idPost=$(this).data('idpost');
    const id=$(this).data('id');
    $('#modalDeleteC').attr('href','deletecomment&id_post='+idPost+'&id='+id);
})

//Clique sur le bouton signaler  
$('.trash3').click(function(){
    const idPost=$(this).data('idpost');
    const id=$(this).data('id');
    $('#modalSignalC').attr('href','signalcomment&id_post='+idPost+'&id='+id);
})