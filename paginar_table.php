<!DOCTYPE html>
	<html lang="pt">
		<head>
			<meta charset="UTF-8">
			<script type="text/javascript" src="JS/jquery.js"></script>
			<style type="text/css">
				td label{
					cursor:pointer;
				}
			</style>
			<title></title>
		</head>
		<body>
			<center>
				<label>Pesisa:</label>
				<input type="text" name="search" id="search">
				<table border="1">
					<thead>
						<tr>
							<td>Id</td>
							<td>Nome</td>
						</tr>	
					</thead>
					<tbody>
<?php
	for ($i=1; $i < 51; $i++) { 
		# code...
?>
						<tr class = "table <?php echo $i;?>">
							<td><?php echo $i;?></td>
							<td>Pedro<?php echo $i;?></td>
						</tr>
<?php
	}
?>
					</tbody>
				</table>
				<table>
					<tr>
						<td id="recuar" >
							<label>Voltar</label>
						</td>
						<td>
						</td>
						<td>
						</td>
						<td id="avanca" >
							<label>Avançar</label>
						</td>
					</tr>
				</table>
			</center>
		</body>
		<script type="text/javascript">
			function pesquisa(table, search, indexOf){
				if (search != "") {
					$(table).hide();
					for (var i = 1; i <= table.length; i++){
						var coluna = $('tbody .'+i).find('td').eq(0).text();
						var coluna2 = $('tbody .'+i).find('td').eq(1).text();
						if(coluna.trim().toLowerCase().indexOf(search.toLowerCase()) != (-1) || coluna2.trim().toLowerCase().indexOf(search.toLowerCase()) != (-1)){
							$("."+i).show();
						}
					}
				}else{
					pagina(table, indexOf);
					return indexOf;
				}
			}
			function avancar(table, indexOf, search){
				if((indexOf + 10) <= table.length){
					table.hide();
					for (var i = indexOf; i < (indexOf + 10); i++){
						table.eq(i).show();
					};
					return indexOf += 10;
				}else{
					throw "Quantidade Excedente";
				}
			}

			function recuar(table, indexOf, search){
				if((indexOf - 10) >= 0){
					table.hide();
					for (var i = indexOf; i > (indexOf - 10); i--){
						$("."+i).show();
					};
					return indexOf -= 10;
				}else{
					throw "Quantidade Excedente";
				}
			}

			function pagina(table, indexOf){
				table.show();
				for (var i = indexOf; i <= table.length; i++){
					table.eq(i).hide();
				};
			}
			$(function(){
				var table = $('.table');
				var indexOf = 10;
				pagina(table, indexOf);
				$('#avanca').click(function(){
					try{
						indexOf = avancar(table, indexOf);
					}catch(ex){
						console.error(ex);
					}
	
				});
				$('#recuar').click(function(){
					try{
						indexOf = recuar(table, indexOf);
					}catch(ex){
						console.error(ex);
					}
				});
				$('#search').keyup(function(){
					try{
						indexOf = pesquisa(table, $(this).val(), 10)
					}catch(ex){
						console.error(ex);
					}
				});
			});
		</script>
	</html>