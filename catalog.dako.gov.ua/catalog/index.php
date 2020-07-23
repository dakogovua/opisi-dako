<?php 
session_start();

if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
	include("includes/header.php");
	// print_r($_SESSION);
?>

<style type="text/css">
	.input_m {
		color: black;
	}
	.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
	.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
	.autocomplete-selected { background: #F0F0F0; }
	.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
	.autocomplete-group { padding: 2px 5px; }
	.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }	
</style>

<div id="welcome">	
	
	<h2>Ласкаво просимо, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	<p><a href="logout.php">Вийти</a> із системи "Каталог"</p>
</div>
<div class="container contik">
	<h1>
		<span><strong>Електронний географічний каталог<br> Державного архіву Киівської області <br>періоду до 1917 року</strong></span> 
	</h1>
</div>
<div class="dataTables" style="overflow:auto;">
	<table class="display table table-striped table-bordered" id="kartochki" width="100%" >
		<thead>
			<tr>
				<th data-toggle="popover" data-placement="top" data-content="Службовий номер запису в БД" title="№ запису">№ запису</th>
				<th data-toggle="popover" data-placement="top" data-content="Губернія, область" title="Рубрика географічного об'єкту">Рубрика географічного об'єкту</th>
				<th data-toggle="popover" data-placement="top" data-content="Волость, повіт, округ, район" title="Підрубрика об'єкту">Підрубрика об'єкту</th>
				<th data-toggle="popover" data-placement="top" data-content="Хутір, село, селище, містечко, місто" title="Назва населеного пункту">Назва населеного пункту</th>
				<th data-toggle="popover" data-placement="top" data-content="Зміст документу" title="Назва документу">Назва документу</th>
				<th>Дата документу</th>
				<th>№ фонду</th>
				<th>Назва фонду</th>
				<th>№ опису</th>
				<th>№ справи</th>
				<th>№№ аркуша (аркушів)</th>

			</tr>

		</thead>

	</table>
</div>

<main id="insertbutton" class="cd-main-content-dako">
	<div class="center-dako">
		<a href="#0" class="cd-btn-dako cd-modal-trigger-dako">Начать ввод карточек</a>
	</div>
</main> <!-- .cd-main-content -->

<div id="cd-modal-dako-input" class="cd-modal-dako">
	<div class="modal-content-dako">
		<h1>Увага! починається введення картки</h1>
			<form id="form" >
				<div class="form-row">
					<!-- <div class="form-group col-md-4">
						<label>Ящик</label>
						<input type="text" placeholder="Ящик" name = "box">
					</div> REMOVED BOX -->
					<div class="form-group col-md-4">
						<label>Рубрика географічного об'єкту</label>
						<input type="text" placeholder="Губернія, область" name = "guber" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>Підрубрика об'єкту</label>
						<input type="text" placeholder="Волость, повіт, округ, район" name = "povet" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>Назва населеного пункту</label>
						<input type="text" placeholder="хутір, село, селище, містечко, місто" name = "selo" class="form-control">
					</div>

				
					
				</div>
				<div class="form-row">
					 <div class="form-group col-md-12">
						<label>Назва документу</label>
						<textarea rows="4" cols="50" placeholder="Зміст документу" name = "content" class="form-control"></textarea>
					</div>
				
					<div class="form-group col-md-4">
						<label>Дата документу</label>
						<input type="text" placeholder="Дата документу" name = "date" class="form-control">
					</div>

					<div class="form-group col-md-4">
						<label>№ фонду</label>
						<input type="text" placeholder="№ фонда" name = "fond_number" class="form-control">
					</div>

				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label>Назва фонду</label>
						<input type="text" placeholder="Назва фонду" name = "fond_name" class="form-control">
					</div>

					<div class="form-group col-md-4">
						<label>№ опису</label>
						<input type="text" placeholder="№ описи" name = "opis_number" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label>№ справи</label>
						<input type="text" placeholder="№ справи" name = "sprava_number" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label>№ аркуша</label>
						<input type="text" placeholder="№ аркуша (аркушів)" name = "paper_number" class="form-control">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary">Ввести данные</button>
					</div>
				</div>			
			</form>		
	</div> <!-- .modal-content -->
	<a href="#0" class="modal-close-dako">Close</a>
<div class="autocomplete-suggestions">
    <div class="autocomplete-group"></div>
    <div class="autocomplete-suggestion autocomplete-selected">...</div>
    <div class="autocomplete-suggestion">...</div>
    <div class="autocomplete-suggestion">...</div>
</div>

</div> <!-- .cd-modal -->

<div class="cd-transition-layer-dako"> 
	<div class="bg-layer-dako"></div>
</div>


<!-- / Граница модала -->
<!-- start print modal -->
<div class="cd-modal-dako" id="cd-modal-dako-print">
	<div class="modal-content-dako">
		<h1 class="none">Распечатка карточек</h1>
			<div id="form_print" >
				<div class="form-row">
					
					<!-- <div class="form-group col-md-4">
						<label>ID</label>
						<input type="text" name = "id" class="form-control" disabled>
					</div>
					
					<div class="form-group col-md-4">
						<label>Рубрика географічного об'єкту</label>
						<input type="text"  class="form-control" disabled>
					</div>
					<div class="form-group col-md-4">
						<label>Підрубрика об'єкту</label>
						<input type="text"  class="form-control" disabled>
					</div>
			
					<div class="form-group col-md-4">
						<label>Назва населеного пункту</label>
						<input type="text"  class="form-control" disabled>
					</div>
					
					<div class="form-group col-md-4">
						<label>Назва документу</label>
						<textarea rows="4" cols="50"  name = "content" class="form-control" disabled></textarea>
					</div>
					
					<div class="form-group col-md-4" style = "display:none;">
						<label>Дата документу !!! СКРЫТА !!! </label>
						<input type="text"  class="form-control" disabled>
					</div>
					
					<div class="form-group col-md-4">
						<label>Дата документу</label>
						<input type="text"  class="form-control" disabled>
					</div>			
					
					<div class="form-group col-md-4">
						<label>№ фонду</label>
						<input type="text"  name = "opis_number" class="form-control" disabled>
					</div>
					
					<div class="form-group col-md-4">
						<label>Назва документу</label>
						<input type="text"  name = "opis_number" class="form-control" disabled>
					</div>
									
					<div class="form-group col-md-4">
						<label>№ опису</label>
						<input type="text"  class="form-control" disabled>
					</div>
					
					<div class="form-group col-md-4">
						<label>№ справи</label>
						<input type="text"  class="form-control" disabled>
					</div>
					
						
					<div class="form-group col-md-4">
						<label>№ аркуша</label>
						<input type="text"  class="form-control" disabled>
					</div>
<!-- ------------------------------------------------------------------------ -->					
					<!-- <div class="form-group col-md-4">
						<label>Дата запису в БД</label>
						<input type="text"  class="form-control" disabled>
					</div>
					
					<div class="form-group col-md-4">
						<label>ФИО</label>
						<input type="text"  class="form-control" disabled>
					</div>
					
				</div>			
					
				
				<div class="form-row">
					<div class="col-md-4">
						<button id="print" class="btn btn-primary">Распечатать</button>
					</div>
				</div> -->
				<table class="kart-print">
					<thead>
						<th colspan="6"><strong>Картка систематичного каталогу</strong></th>
					</thead>
					<tbody>
						<tr>
							<td class="main-flex" rowspan="3" colspan="2"><p>Державний архів<br>Київської області</p></td>
							<td class="none" colspan="4"><p>ID:</p> <span></span></td>
						</tr>
						<tr>
							<td colspan="4"><p>Рубрика: Назва географічного об’єкта:</p> <span></span></td>
						</tr>
						<tr>
							<td colspan="4"><p>Підрубрика: Назва географічного об’єкта:</p> <span></span></td>
						</tr>
						<tr>
							<td colspan="6"><p>Назва населеного пункту:</p> <span></span></td>
						</tr>
						<tr>
							<td colspan="6"><p>Зміст документу:</p> <span></span></td>
						</tr><!-- 
						<tr style="display: none;">
							<td colspan="4"><p>Дата документу !!! Скрыта:</p> <span></span></td>
						</tr> -->
						<tr>
							<td colspan="6"><p>Дата документу:</p> <span></span></td>
						</tr>
						<tr>
							<td colspan="6"><p>№ фонду:</p> <span></span></td></tr>
						<tr>
							<td colspan="6"><p>Назва фонду:</p> <span></span></td>
						</tr>
						<tr>
							<!-- <td style="display: none;"><p>Назва документу:</p> <span></span></td> -->
							<td colspan="2" width="33%"><p>№ опису:</p> <span></span></td>
							<td colspan="2" width="33%"><p>№ справи:</p> <span></span></td>
							<td colspan="2" width="33%"><p>№ аркуша:</p> <span></span></td>
						</tr>
						<tr class="none">
							<td colspan="6"><p>Дата запису в БД:</p> <span></span></td>
						</tr>
						<tr class="none">
							<td colspan="6"><p>ФІО:</p> <span></span></td>
						</tr>
					</tbody>
				</table>
			</div>
				<div class="form-row">
					<button id="print" class="btn btn-primary">Распечатать</button>
				</div>
			</div>		
	</div> 
	<a href="#0" class="modal-close-dako">Close</a>
</div>

<!-- end print modal -->
<script>
	
$("#form_print").on("submit", function(event) {
	event.preventDefault();

	window.print();
})
/// Передача аяксом данных с модального окна в форму
$("#form").on("submit", function(event) {
	event.preventDefault();
	var sendme = $(this).serialize();	
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "insertdb.php", false);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
	     	rate_string = this.responseText;
			alert("Запись добавлега в систему");
			$( "form" )[0].reset();
	   	}else 
	   		console.log("Missed insertdb.php");
	};			
	xhttp.send(sendme);
});		
</script>


<script> 
////// Рисуем табличку

$('#kartochki').DataTable({
	"pageLength": 100,
	"processing": true,
	"ajax": "scripts/server_processing.php",
	
	"language": {
			
            
            "info": "Показується _PAGE_ из _PAGES_",
            "infoEmpty": "Поки нічого не знайшло",
            
			
			"processing": "Зачекайте...",
			"search": "Пошук:",
			"lengthMenu": "Показати _MENU_ записів",
			"info": "Записи с _START_ до _END_ із _TOTAL_ записів",
			//"infoEmpty": "Записи с 0 до 0 из 0 записей",
			"infoFiltered": "(відфільтровано із _MAX_ записів)",
			"infoPostFix": "",
			"loadingRecords": "Завантаження записів...",
			"zeroRecords": "Записи відсутні.",
			"emptyTable": "У таблиці відсутні дані",
			"paginate": {
				"first": "Перша",
				"previous": "Попередня",
				"next": "Наступна",
				"last": "Остання"
						},
        },
	/*responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal( {
                header: function ( row ) {
                    var data = row.data();
                    return 'Details for '+data[0]+' '+data[1];
                }
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                tableClass: 'table'

            } )
        }
      },*/

	  
	  
    "drawCallback": function(){ 
// "initComplete": function(){      	
   

    	var xhttp = new XMLHttpRequest();
      	xhttp.open("POST", "role.php", false);
      	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      	xhttp.onreadystatechange = function() {
      		if (this.readyState == 4 && this.status == 200) {
      					if (this.responseText != "admin" && this.responseText != "editor" ) 
      					{
      						$('#insertbutton').hide();	
      					}
      			
				else 	{
      				$('#insertbutton').show();	
					var role = this.responseText;
      				console.log("this.responseText role " + role);	
					
      			}


      			if(!$(".tabledit-toolbar").length && (this.responseText == "admin" || this.responseText == "editor" )){

      				$('#kartochki').Tabledit({
      					warningClass: 'warningz',
      					dangerClass: 'danger',
      					mutedClass: 'muted',
      					restoreButton: false,
      					editButton: true,

      					onSuccess: function(data, textStatus, jqXHR) {
      						console.log('onSuccess(data, textStatus, jqXHR)');
      						console.log (data);
      					},
      					onFail: function(jqXHR, textStatus, errorThrown) {
      						console.log('onFail(jqXHR, textStatus, errorThrown)');
      					},
      					url: 'edit.php',
      					inputClass: 'form-control input-sm',
      					columns: {
      						identifier: [0, 'id'],
      						editable: [ [1, 'guber'],[2, 'povet'],[3, 'selo'],[4, 'content'],[5, 'date'],[6, 'fond_number'],[7, 'fond_name'],[8, 'opis_number'],[9, 'sprava_number'],[10, 'paper_number']]
      					},
      					/* onDraw: function() {
      					//после каждой прорисовки таблицы, запускает чё-то, в данном случае usersedit()
      					if ( $('#my-table').length && role == "admin")
									{
									console.log("$('#my-table').length " + $('#my-table').length + " role " + role);	
									
						
						
									//console.log('onDraw() role, #my-table loaded ' + role);
									// if (role == "admin") 
									
										
										//console.log("useredit()");
										//usersedit(); // если админ, то запускаем функцию редактирования пользователей
										
									}
						
      						
      					},	*/

      				});

      				
								} 
							
							}

							else console.log("Missed insertdb.php");
						};			
						xhttp.send();	

					} 
/////////////////////////////////				
				});
		

//Обрабатываем двойной клик на каждом тр и тд					
var table = $('#kartochki').DataTable();
$('#kartochki tbody').on('dblclick', 'tr', function() {
    var data = table.row( this ).data();

	

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST", "userinfo.php", false);
	//xhttp.open("GET", "test.php", false);
	//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				console.log ("this.responseText "+ this.responseText);
				var obj = JSON.parse(this.responseText);
		
					console.log("obj.FIO " + obj.FIO + " obj.position " + obj.position + " obj.date_zapisi " + obj.date_zapisi);
				
				/*
				data[11] = obj.date_zapisi;
				data[12] = obj.FIO +", " + obj.position;
				*/
				
				data.push(obj.date_zapisi);
				data.push(obj.FIO +", " + obj.position);
				
				//	console.log(this.responseText);
		
				}
				else 
					console.log("Missed userinfo.php");
			};	
			//xhttp.open("POST", "userinfo.php", false);
			
			xhttp.send(data[0]);


//	console.log ("data " + data[10] + " data.length " +  data.length);
    var spanz = $('#form_print span');
    // $('#form_print textarea').val(data[4]);
    for (var i = 0; i < spanz.length; i++) {
//		console.log ("typeof data i " + i +" " + typeof(data[i]) + " data.length " +  data.length);
    	spanz[i].innerHTML = data[i];
			console.log(spanz[i] + "<br>");
		}
		// spanz[6].innerHTML = data[7];
		// spanz[7].innerHTML = data[6];
	
	
	
	//event.preventDefault();
	var transitionLayer2 = $('.cd-transition-layer-dako'), modalWindow2 = $('#cd-modal-dako-print'),transitionBackground2 = transitionLayer2.children();
	transitionLayer2.addClass('visible opening');
	var delay = ( $('.no-cssanimations').length > 0 ) ? 0 : 600;
	setTimeout(function(){
		modalWindow2.addClass('visible');
	}, delay);

	modalWindow2.on('click', '.modal-close-dako', function(event){
	event.preventDefault();
	transitionLayer2.addClass('closing');
	modalWindow2.removeClass('visible');
	transitionBackground2.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
	transitionLayer2.removeClass('closing opening visible');
	transitionBackground2.off('webkitAnimationEnd oanimationend msAnimationEnd animationend');
	});
	
	// location.reload(true);
	});

} );
</script>

<script>
$(document).ready(function(){
/// Накладываем popover на th

    $('[data-toggle="popover"]').popover({
trigger: 'hover',
container: '#kartochki'
});   


// дрочим автокомплит
	var name;
	var form = $('form').find('input').each(function(){
		$(this).keypress(function() {
			name = $(this).attr('name');
			$(this).autocomplete({
				serviceUrl: 'autocomplete.php',
				params: {name: name},
			});
		});	
	});	
});
</script>


<?php 
	 if($_SESSION["role"] == "admin")
	  {
		include("userform/yra.php"); 
	  }	 

	include("includes/footer.php"); 
}
?>