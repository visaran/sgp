$(document).ready(function() {
    //load tooltips
    $('*[rel=tooltip]').tooltip();
    
    $( "input[name=ativo]" ).on( 'click', function(){
            if ( $( this ).is(":checked") ) {
                $( "#vencedor" ).show( 500 );
            }
            else
            {
                $( "#vencedor" ).hide( 500 );
            }
     } );   
  //Mascaras   
    $("#form_telefone").mask("(99) 9999-9999");
    $("#form_celular").mask("(99) 9999-9999?9",{placeholder:""});
    //$("#form_numero").mask("9?999999",{placeholder:""});
    $("#date").mask("99/99/9999");
    
    //valida formulário de cadastro e upload de usuarios
   
   jQuery.validator.addMethod("notEqual", function(value, element, param) {
    return this.optional(element) || value != param;
    }, "Selecione um valor diferente!");

    jQuery.validator.addMethod("dateBR", function(value, element) {
     //contando chars
    if(value.length!=10) return false;
    // verificando data
    var data        = value;
    var dia         = data.substr(0,2);
    var barra1      = data.substr(2,1);
    var mes         = data.substr(3,2);
    var barra2      = data.substr(5,1);
    var ano         = data.substr(6,4);
    if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
    if((mes==4||mes==6||mes==9||mes==11) && dia==31)
        return false;
    if(mes==2 && (dia>29||(dia==29 && ano%4!=0)))
        return false;
    if(ano < 1900)return false;
    return true;
}, "Informe uma data válida");  // Mensagem padrão

    $("#form-user").validate(
            
        {
           errorElement: "span",
           errorClass: "text-danger",
            rules: {
               categoria_id:{
                    required : true,
                    notEqual: "0"
                },
                numero_licitacaoDownload:{
                    required : true,
                    notEqual: "0"
                },
                datarealizacao:{
                    required : true,
                    dateBR: true
                },
                vencedor:{
                    required : true
                },
                nome:{
                    required : true
                },
                sigla:{
                    required : true
                },
                username:{
                    required : true
                },
                email:{
                    required : true,
                    email: true
                },
                password:{
                    required : true
                },
                confirmPassword:{
                    required : true,
                    equalTo: "#form_password"
                },
                numero:{
                     required : true
                },
                descricao:{
                    required :true
                },
                cep:{
                    required :true
                },
                estado:{
                    required :true
                },
                cidade:{
                    required :true
                },
                bairro:{
                    required :true
                },
                endereco:{
                    required :true
                }
             
                             
            },
            messages: {
               categoria_id:{
                    required : "Selecione a categoria da Licitação!",
                    notEqual : "Selecione a categoria da Licitação!"
           
                },
                numero_licitacaoDownload:{
                  required : "Selecione o número da Licitação!",
                  notEqual : "Selecione o número da Licitação!"
                },
                datarealizacao:{
                    required: "Este campo deve ser preenchido!"
                },
                vencedor:{
                    required: "Este campo deve ser preenchido!"
                },
                nome: {
                    required: "Este campo deve ser preenchido!"
                },
                sigla: {
                    required: "Este campo deve ser preenchido!"
                },                
                sobrenome: {
                    required: "Este campo deve ser preenchido!"
                },
                username:{
                    required : "Este campo deve ser preenchido!"
                },
                email:{
                    required : "Este campo deve ser preenchido!",
                    email: "Digite um e-mail válido!"
                },
                password:{
                    required : "Este campo deve ser preenchido!"
                },
                confirmPassword:{
                    required : "Este campo deve ser preenchido!",
                    equalTo: "Confirmação de senha incorreta!"
                },
                numero:{
                    required : "Este campo deve ser preenchido!"
                },
                descricao:{
                    required : "Este campo deve ser preenchido!"
                },
                cep:{
                    required : "Este campo deve ser preenchido!"
                },
                estado:{
                    required : "Este campo deve ser preenchido!"
                },
                cidade:{
                    required : "Este campo deve ser preenchido!"
                },
                bairro:{
                    required : "Este campo deve ser preenchido!"
                },
                endereco:{
                    required : "Este campo deve ser preenchido!"
                }
            }
        }
    );
    
  
    
    
});


    

