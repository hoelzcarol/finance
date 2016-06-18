
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
      

    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker3.min.css" rel="stylesheet">

    <style>
        .valor-credito {
            color: blue;
        }
        .valor-debito {
            color: red;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
      
        
    <script type='text/javascript'>
        $(document).ready(function(){
            
            $('#data').datepicker({
                
                
            });
            
            $.getJSON('model/30dias.php', function(dados){
                var total = 0;
                $(dados).each(function(ind, elem){
                    var classValor = (elem.tipo == "C") ? 'valor-credito':'valor-debito';
                    total =(elem.tipo == "C")? total + parseFloat(elem.valor) : total - parseFloat(elem.valor);
                    
                    var data = new Date(elem.data);
                    
                    var tr = $('<tr>'+
                       '<td>'+data.getDate()+'/'+(data.getMonth()+1)+'/'+data.getFullYear()+'</td>'+
                       '<td>'+elem.descricao+'</td>'+
                       '<td>'+elem.categoria+'</td>'+
                       '<td>'+elem.tipo+'</td>'+
                       '<td class='+classValor+'>'+'R$ '+elem.valor+'</td>'+
                      '</tr>');
              
                     $('#rel-30dias tbody').append(tr);
                     $('#valor-total').html(total);
                });                    
        
            });
            
        });
    </script>

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Gerenciador Financeiro</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Relatorios</a></li>
            <li><a href="#">Historico</a></li>
            <li><a href="#">Contas</a></li>
            <li><a href="#">Usuário</a></li>
          </ul>
          
            
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-12 main">
          <h1 class="page-header">Painel</h1>
          <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#add-registro">
              <span class="glyphicon glyphicon-plus-sign"></span>Registro              
          </button>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Ultimos 30 dias</h2>
          <div class="table-responsive">
            <table class="table table-striped" id='rel-30dias'>
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Descrição</th>
                  <th>Categoria</th>
                  <th>Tipo</th>
                  <th>Valor</th>
                  
                </tr>
              </thead>
              <tbody>
                                
              </tbody>
              <tfoot>
                  <tr>
                      <td colspan="4">
                          Saldo Total:
                      </td>
                      <td id='valor-total'>
                          fas
                      </td>
                  </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>    
  <!-- modal -->
  <!-- Button trigger modal -->
<div class="modal fade" id="add-registro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
       <!-- inicio modal -->
       
        <form class="form-horizontal">
            <fieldset>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="descricao">Descrição</label>  
            <div class="col-md-4">
            <input id="descricao" name="descricao" type="text" placeholder="" class="form-control input-md">

            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="categoria">Categoria</label>  
            <div class="col-md-4">
            <input id="categoria" name="categoria" type="text" placeholder="" class="form-control input-md">

            </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="valor">Valor</label>
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">R$</span>
                  <input id="valor" name="valor" class="form-control" placeholder="" type="text">
                </div>

              </div>
            </div>

            <!-- Multiple Radios -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="tipo">Tipo de registro</label>
            <div class="col-md-4">
            <div class="radio">
            <label for="tipo-0">
            <input type="radio" name="tipo" id="tipo-0" value="C" checked="checked">
            Crédito
            </label>
             </div>
            <div class="radio">
            <label for="tipo-1">
            <input type="radio" name="tipo" id="tipo-1" value="D">
            Debito
            </label>
             </div>
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="categoria">Data</label>  
            <div class="col-md-4">
            <input id="data" name="data" type="text" placeholder="" class="form-control input-md">

            </div>
            </div>
            
            </fieldset>
        </form>

       <!-- fim modal -->
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Savar</button>
      </div>
    </div>
  </div>
</div>
  
  </body>
</html>
