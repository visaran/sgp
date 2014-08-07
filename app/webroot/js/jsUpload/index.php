<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="jquery.uploadfile.min.js"></script>
</head>
<body>

<div id="mulitplefileuploader">Upload</div>

<div id="status"></div>

<input type="text" id="qnt_arquivos"  name="qnt_arquivos"  class="col-md-4 form-control">
<div id="eventsmessage"> </div>


<script>
$(document).ready(function()
{
var arquivos=0;
var settings = {
    url: "upload.php",
    dragDrop:true,
    fileName: "myfile",
    allowedTypes:"jpg,png,gif,doc,docx,pdf",  
    dragDropStr: "<span><b>Arraste E Solte O Arquivo</b></span>",
    returnType:"json",
	 onSuccess:function(files,data,xhr)
    {
      $("#eventsmessage").html($("#eventsmessage").html()+"<input type='text' id='form_arquivo'  name='arquivo_"+arquivos+"' value='"+data+"'> "),
      arquivos++;
      $("#qnt_arquivos").val(arquivos);
      
    },
    showDelete:true,
    deleteCallback: function(data,pd)
	{
    for(var i=0;i<data.length;i++)
    {
        $.post("delete.php",{op:"delete",name:data[i]},
        function(resp, textStatus, jqXHR)
        {
            //Show Message  
            //$("#status").append("<div>Arquivo deletado</div>");
            
        });
     }      
    pd.statusbar.hide(); //You choice to hide/not.

}
}
var uploadObj = $("#mulitplefileuploader").uploadFile(settings);


});
</script>
</body>

