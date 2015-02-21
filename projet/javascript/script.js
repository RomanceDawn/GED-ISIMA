function supprimerRapport(id,indice)
{
    $.ajax({
       url : '../php/deleteManager.php',
       type : 'POST',
       data: {id: id, indice: indice},
       success : function(code_html, statut){
           $('#'+id).remove();
           
       },

       error : function(resultat, statut, erreur){
       }
       });
}