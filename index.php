
<!doctype html>
<html lang="es">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <title>Test PHP para Desis</title>

    <!--IMPORTAMOS LOS CSS-->
    
    <link href="content/bootstrap.min.css" rel="stylesheet" />
    
    <link rel="icon" href="img/faico.ico">

    <!--IMPORTAMOS LOS JS-->
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery.rut.min.js" type="text/javascript"></script>
    

<body>
    <form id="votacion">
        <div id="xdatos" class="container">
			<div class="row">				
				<div class="col-sm-12">
                    <div class="alert alert-success text-center">
                        FORMULARIO DE VOTACIÓN
                    </div>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nombre y Apellido</span>
                                <input id="txtNombres" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Alias</span>
                                <input id="txtAlias" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">RUT</span>
                                <input id="txtRUT" type="text" class="form-control" onfocus='onRutFocus(this);'>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Email</span>
                                <input id="txtEmail" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Región</span>
                                <select id="selRegion" class="form-select">
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Comuna</span>
                                <select id="selComuna" class="form-select">
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Candidato</span>
                                <select id="selCandidato" class="form-select">
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Como se enteró de Nosotros</span>&nbsp;
                                <div class="form-check">                                    
                                    <input class="form-check-input select-all" type="checkbox" id="cbWeb" name="cbEntero" value="Web">                                    
                                    <label class="form-check-label">Web</label>
                                    &nbsp;
                                </div>
                                <div class="form-check">                                    
                                    <input class="form-check-input select-all" type="checkbox" id="cbTV" name="cbEntero" value="TV">
                                    <label class="form-check-label">TV</label>
                                    &nbsp;
                                </div>
                                <div class="form-check">                                   
                                    <input class="form-check-input select-all" type="checkbox" id="cbRS" name="cbEntero" value="Redes Sociales">
                                    <label class="form-check-label">Redes Sociales</label>
                                    &nbsp;
                                </div>
                                <div class="form-check">                                   
                                    <input class="form-check-input select-all" type="checkbox" id="cbAmigo" name="cbEntero" value="Amigo">
                                    <label class="form-check-label">Amigo</label>
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-3"><button id="btVotar" type="button" class="btn btn-primary">Votar</button></div>
                        <div class="col-sm-9"><span class="text-danger" id="sMSG"></span></div>
                    </div>
                </div>
                <div class="col-sm-3"></div>                
            </div>
        </div>                    
    </form>

    <script>

        function getRegion(){
            //Lista todas las regiones desde la BD
            $.ajax({
                url : "api/ws",
                type: 'post',
                data: {'t_name':'ListRegion'},
                success: function(data) { 

                    marray = jQuery.parseJSON(data); //Formatea los datos

                    if (data.toLowerCase().indexOf("error_id") >= 0){
                        // Si existe error informamos por pantalla
                        $("#sMSG").html("ERROR : " + marray.result.error_msg);
                    }else{
                        // Cargamos los datos
                        $.each(marray, function (i, item) {
                            $('#selRegion').append('<option value="' + item.id + '">' + item.region + '</option>');
                        });

                    }  
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("ListRegion ::: ",XMLHttpRequest.responseText); // muestra el error en la consola del browser
                },
    		});
        }

        function getCandidato(){
            //Lista todas los candidatos desde la BD
            $.ajax({
                url : "api/ws",
                type: 'post',
                data: {'t_name':'ListCandidato'},
                success: function(data) { 

                    marray = jQuery.parseJSON(data); //Formatea los datos
                    if (data.toLowerCase().indexOf("error_id") >= 0){
                        // Si existe error informamos por pantalla
                        $("#sMSG").html("ERROR : " + marray.result.error_msg);
                    }else{
                        // Cargamos los datos
                        $.each(marray, function (i, item) {
                            $('#selCandidato').append('<option value="' + item.id + '">' + item.candidato + '</option>');
                        });

                    }
                               
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log("ListCandidato ::: ",XMLHttpRequest.responseText); // muestra el error en la consola del browser
                },
    		});
        }

        function onRutFocus(obj) { 
            // Formato rut cada vez que teclea keyup
            $("#" + $(obj).attr('id')).Rut({ on_error: function () {}, format_on: "keyup" }); 
        }
	
	    var Fn = {
            // Valida el rut con su cadena completa "XXXXXXXX-X"
            validaRut : function (rutCompleto) {
                rutCompleto = rutCompleto.replace("‐","-");
                rutCompleto = rutCompleto.replace(".","").replace(".","").replace(".","");
                if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
                    return false;
                var tmp 	= rutCompleto.split('-');
                var digv	= tmp[1]; 
                var rut 	= tmp[0];
                if ( digv == 'K' ) digv = 'k' ;
                
                return (Fn.dv(rut) == digv );
            },
            dv : function(T){
                var M=0,S=1;
                for(;T;T=Math.floor(T/10))
                    S=(S+T%10*(9-M++%6))%11;
                return S?S-1:'k';
            }
        }

        function Validar_Email(Email){
    
            var xEmail = "";
            var n = 0;
            var pos = 0;
            var xDominio = Email;
            var aux = xDominio.split(".");
            xDominio = aux[aux.length - 1];

            if (Email === ""){return "El campo Correo es obligatorio.";}
            if (Email.indexOf("@")===-1) {return "La dirección de email no contiene el signo @";}
            if (Email.indexOf("@") === 1) {return "El @ No puede estar al principio";}
            if (Email.indexOf("@") === Email.Length) {return "El @ no puede estar al final de la dirección";}
            if (Email.Length < 6) { return "La dirección no puede ser menor a 6 caracteres.";}
            if (Email.indexOf("ñ") >= 0 || Email.indexOf("Ñ") >= 0 ||
                Email.indexOf("á") >= 0 || Email.indexOf("Á") >= 0 || 
                Email.indexOf("é") >= 0 || Email.indexOf("É") >= 0 || 
                Email.indexOf("ì") >= 0 || Email.indexOf("Ì") >= 0 || 
                Email.indexOf("ó") >= 0 || Email.indexOf("Ó") >= 0 ||  
                Email.indexOf("ú") >= 0 || Email.indexOf("Ú") >= 0 || 
                Email.indexOf("*") >= 0) {return "La dirección no puede tener ñ o Ñ ni acentos o *.";}
            if (Email.substring(Email.Length - 1, 1) == ".") {return "El . no puede estar al final de la dirección";}
            if (Email.indexOf(",") >= 0 || Email.indexOf(";") >= 0) {return "La dirección no puede tener coma (,) o punto y coma (;).";}
            if (Email.indexOf(" ") >= 0) { return "La dirección no puede tener espacios en blanco";}
            if (Email.indexOf("..") >= 0) { return "La dirección no puede tener puntos (..) seguidos";}
            if (Email.indexOf(".@") >= 0) {return "La dirección no puede tener un punto al lado del arroba (.@) "; }

            xEmail = Email;
            var x = xEmail.Length - xEmail.replace("@", "").Length;
            if (x > 1) { return "Solo puede haber un @ en la dirección de email";}

            pos = Email.indexOf("@");
            if (Email.substring(pos + 1, 1) == ".") {return "El punto no puede estar seguido del @.";}            
            return "";
        }


        $(document).ready(function () {

            // Carga datos iniciales
            getRegion();
            getCandidato();
            // Fin
            
            $('#selRegion').change(function() {
                $('#selComuna').find('option').remove().end().append('<option value="0">Seleccione</option>');
                $.ajax({
                    url : "api/ws",
                    type: 'post',
                    data: {'t_name':'ListComunaByRegion','region':$(this).val()},
                    success: function(data) { 

                        marray = jQuery.parseJSON(data); //Formatea los datos
                        if (data.toLowerCase().indexOf("error_id") >= 0){
                            // Si existe error informamos por pantalla
                            $("#sMSG").html("ERROR : " + marray.result.error_msg);
                        }else{
                            // Cargamos los datos
                            $.each(marray, function (i, item) {
                                $('#selComuna').append('<option value="' + item.id + '">' + item.comuna + '</option>');
                            });
                        }                                
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log("ListComunaByRegion ::: ",XMLHttpRequest.responseText); // muestra el error en la consola del browser
                    },
                });
            });

            $("#btVotar").click(function () {

                // Validaciones antes de grabar
                var patt = new RegExp("/^[0-9a-zA-Z]+$/");
                var cb = 0;
                var sw = true;
                
                if (!(Fn.validaRut($("#txtRUT").val()))){sw=false; $("#txtRUT").css("border-color", "red");}else{$("#txtRUT").css("border-color", "rgb(204,204,204)");}                   
                if ($.trim($("#txtNombres").val())===""){sw=false; $("#txtNombres").css("border-color", "red");}else{$("#txtNombres").css("border-color", "rgb(204,204,204)");}
                if (Validar_Email($("#txtEmail").val())!=""){sw=false; $("#txtEmail").css("border-color", "red");}else{$("#txtEmail").css("border-color", "rgb(204,204,204)");}
                if ($.trim($("#txtAlias").val()).length < 6) {sw=false; $("#txtAlias").css("border-color", "red");}else{
                    if ($("#txtAlias").val().match(/[A-Z]/)===null && $("#txtAlias").val().match(/[0-9]/)=== null) {sw=false; $("#txtAlias").css("border-color", "red");}else{$("#txtAlias").css("border-color", "rgb(204,204,204)");}
                }                               
                if ($("[type='checkbox']:checked").length < 2){sw=false; $(".cbEntero").css("border-color", "red");}else{$(".cbEntero").css("border-color", "rgb(204,204,204)");}

                if(sw){
                    $("#sMSG").html("");
                    // Grabamos los datos limpios
                    var cb = "";
                    var searchIDs = $('input:checked').map(function(){ return $(this).val(); });
                    $.each(searchIDs, function (i, item) {  cb = cb + item + ","; });
                    $.ajax({
                        url : "api/ws",
                        type: 'post',
                        data: {'t_name':'InsertVotante',
                            'Nombres':$("#txtNombres").val(),
                            'Alias':$("#txtAlias").val(),
                            'Rut':$("#txtRUT").val().replace(".","").replace(".","").replace(".",""),
                            'Email':$("#txtEmail").val(),
                            'idRegion':$('#selRegion').val(), 
                            'idComuna':$("#selComuna").val(), 
                            'Candidato':$( "#selCandidato option:selected" ).text(),
                            'Entero':cb
                        },
                        success: function(data) { 

                            if(data.length=1){
                                if(data=='1'){ $("#sMSG").html("Registro Guardado");}
                                if(data=='2'){ $("#sMSG").html("Ya envio una Votación");}
                                if(data=='0'){ $("#sMSG").html("No se guardo el registro");}
                            }else{
                                marray = jQuery.parseJSON(data); //Formatea los datos
 
                                if (data.toLowerCase().indexOf("error_id") >= 0){
                                    // Si existe error informamos por pantalla
                                    $("#sMSG").html("ERROR : " + marray.result.error_msg);
                                }
                            }  
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            console.log("InsertVotante ::: ",XMLHttpRequest.responseText); // muestra el error en la consola del browser
                        },
                    }).done(function () {
                        // Terminado el proceso limpia los valores
                        $("#xdatos input[type='text']").each(function (index) { $(this).val("").css("border-color", "rgb(204,204,204)");});
                        $('#selRegion').val("0");
                        $('#selComuna').val("0"); 
                        $('#selCandidato').val("0");
                        $(".select-all").removeAttr("checked");
                    });
                }else{
                    $("#sMSG").html("Nombre y Apellido: No debe quedar en Blanco.</br>Alias: La cantidad de caracteres mayor a 5 y que contenga letras y números.</br>RUT: Debe ser valido.</br>Email: Debe ser valido.</br>Como se enteró de Nosotros: Debe elegir al menos dos opciones.</br>Seleccione una Región, Comuna y Candidato.");
                    
                }
            });  
            

        });

    </script>
</body>
</head>