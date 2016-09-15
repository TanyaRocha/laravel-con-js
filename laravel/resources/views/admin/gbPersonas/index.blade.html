@extends('admin.app')
@section('main-content')
	
	<div class="page-header" style="text-align: right">
		<td><a href="{{ route('Persona.create') }}" class="btn btn-primary" style="background:#7ACCCE"> <i class="fa fa-user-plus fa-1x">Nuevo Registro</i></a></td>
	</div> 
@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		{{Session::get('message')}}
		</div>
	@endif
		<div  id="no-more-tables">
		<table class="col-md-12 table-bordered table-striped table-condensed cf" id="lts-persona">
		<thead class="cf">
        	<tr>
        		<th></th>
        		<th>Nombreeeee</th>
        		<th>Paterno</th>
				<th>Materno</th>
				<th>CI</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Celular</th>
				<th>Empresa Telefonica</th>
				<th>Correo:</th>
				<th>genero</th>
			</tr>
        </thead>
        @foreach($persona as $p)
        <tr>
        	<td data-title="Controles" class="numeric">
	        	<table cellpadding="0" cellspacing="0">
	        	<tr valign="top">
	        	<td>
	        	{!! link_to_route('Persona.edit', $title = '', $parameters = $p->prs_id, $attributes = ['class'=>'btncirculo btn-primary fa fa-pencil fa_1x','style'=>'background:#57BC90']) !!}
	        	</td>
	        	<td>
	        	{!! link_to_route('Persona.show', $title = '', $parameters = $p->prs_id, $attributes = ['class'=>'btncirculo btn-warning btn-circle fa fa-trash-o fa-1x','style'=>'background:#7ACCCE','data-confirm'=>'Esta usted Seguro?']) !!}</td>
	        	</tr>
	        	</table>
        	</td>

        	<td data-title="Nombre">{{ $p->prs_nombres }}</td>
			<td data-title="Paterno">{{ $p->prs_paterno }}</td>
			<td data-title="Materno">{{ $p->prs_materno }}</td>
			<td data-title="CI.:">{{ $p->prs_ci }}</td>
			<td data-title="Dirección">{{ $p->prs_direccion }}</td>
			<td data-title="Telefono">{{ $p->prs_telefono }}</td>
			<td data-title="Celular">{{ $p->prs_celular }}</td>
			<td data-title="Empresa Telefonica">{{ $p->prs_empresa_telefonica }}</td>
			<td data-title="Correo">{{ $p->prs_correo}}</td>
			<td data-title="Genero">{{ $p->prs_sexo}}</td>
			
        </tr>
       <!--  </tbody>-->
        @endforeach
        	</table>
        </div>
<!-- <script src="bower_components/angular-ui-bootstrap/ui-bootstrap-tpls.js"></script>-->

<script src="../js/jquery/dist/jquery.min.js"></script>
<script src="../js/angular/angular.js"></script>
<script src="../js/angular-ui-bootstrap/ui-bootstrap-tpls.js"></script>
<script src="../js/angular-touch/angular-touch.min.js"></script>

<script src="../js/custom/SeveralUseful.js"></script>
<script src="../js/custom/Statics.js"></script>

<div ng-app="appTest">

	<div ng-controller="Ctrl">
    <div carousel interval="3000">
      <div slide ng-repeat="slide in slides" active="slide.active">
        <img ng-src="fntInterpolar(slide.image);" style="margin: auto;" ng-click="captureImagenInfo(slide);">
        <div class="carousel-caption">
          <h4>Slide </h4>
          <p></p>
        </div>
      </div>
    </div>
    
    <button ng-click="setActive(1)">Make second active</button>
    <button ng-click="getAjaxContabilidad()"> dynamic loading of images</button>
  </div>


</div>
	
@endsection

@push('scripts')
<script>

/*$(document).ready(function() {
	"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        	}
    // Setup - add a text input to each footer cell
    $('#lts-persona tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#lts-persona').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );*/



	$(document).ready(function(){
		$('#lts-persona').DataTable({
			"LenghMenu":[[5,10,25,50, -1],[5,10,25,50,"All"]],
			"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        	}

		});
	});



angular.module("appTest").controller('Ctrl',['$scope',"SeveralUseful","$interpolate", function($scope,SeveralUseful,$interpolate){
  var objectHttp = SeveralUseful.PrototypeRequestHttp();
  $scope.slides = [];
  $scope.slides.push({text: 'ppppppp!', image: 'http://localhost:8080/laravelCrud3/imagenes/001.jpg', id:100});
  $scope.slides.push({text: 'jjjjjj', image: 'http://localhost:8080/laravelCrud3/imagenes/002.jpg',id: 200});
  $scope.slides.push({text: 'llllll', image: 'http://localhost:8080/laravelCrud3/imagenes/003.png',id: 300});
  $scope.slides.push({text: 'tttttttttttttt', image: 'http://localhost:8080/laravelCrud3/imagenes/004.jpg',id:400});
  
  $scope.setActive = function(idx) {
    $scope.slides[idx].active=true;
  }
  $scope.getAjaxContabilidad = function(){
	  objectHttp.shootRequestPhp("post", "/servicios/ctb_PlanCuentasAjax.php",{option:"LST"})
            .done(function (response,status,xhr) {
				$scope.slides = [];
				$scope.slides.push(response);
            }, function (errorResponse,status,xhr){});

  };
  $scope.captureImagenInfo = function(grabImagen){
	  console.dir(grabImagen);
		alert(grabImagen.id);
  };

$scope.fntInterpolar = function(obj){
	return $interpolate(obj);
};
}]);


</script>
@endpush
																				
												
												
												
			
		