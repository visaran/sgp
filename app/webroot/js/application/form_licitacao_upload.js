$(document).ready(function()
{
var arquivos=0;
var excluido=0;
var verifica=0;
var settings = {
    url: "upload.php",
    dragDrop:true,
    fileName: "myfile",
    allowedTypes:"jpg,png,gif,doc,docx,pdf",  
    dragDropStr: "<span><b>Arraste E Solte O Arquivo</b></span>",
    returnType:"json",
	 onSuccess:function(files,data,xhr)
    {        
      arquivos++;  
         if(verifica>0){
         $('#form_arquivo_'+(excluido)).val(data);     
      }else{      
      $("#eventsmessage").html($("#eventsmessage").html()+"<input type='hidden' id='form_arquivo_"+arquivos+"'  name='arquivo_"+arquivos+"' value='"+data+"'> ");
      }
      
      verifica=0;
      excluido=0;
    
      $("#qnt_arquivos").val(arquivos);
      
    },
    showDelete:false,
    deleteCallback: function(data,pd)
	{
    for(var i=0;i<data.length;i++)
    {
        $.post("delete.php",{op:"delete",name:data[i]},
        function(resp, textStatus, jqXHR)
        {
            //Show Message  
            //$("#status").append("<div>Arquivo deletado</div>");
//           alert('form_arquivo_'+i);
           
           //Arrumar !
        //   alert( '#form_arquivo_'+(i+1) +' -> '+ $('#form_arquivo_'+(i+1)).val()  );
           excluido = i+2;
           verifica = 1;
           $('#form_arquivo_'+(i+1)).val('excluido');           
           $("#qnt_arquivos").val(arquivos-1); 
            
        });
     }      
    pd.statusbar.hide(); //You choice to hide/not.

}
};
var uploadObj = $("#mulitplefileuploader").uploadFile(settings);


});