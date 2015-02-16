function supprimerRapport(id)
{
    $.ajax({
       url : '../php/deleteManager.php',
       type : 'POST',
       data : 'id=' + id,
       success : function(code_html, statut){ // success est toujours en place, bien sûr !
           $('#'+id).remove();
       },

       error : function(resultat, statut, erreur){
          
       }
       });
}