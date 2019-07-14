	
	<script type="text/javascript">
		
		$(document).ready(function() {
  			// $('#operator').DataTable();	

  			// $('#peminjam').DataTable( {
		   //      "processing": true,
		   //      "serverSide": true,
		   //      "ajax": {
		   //          "url": "ajax/belum/ambil.php",
		   //          "dataType": "jsonp"
		   //      }
		   //  });


		    $.ajaxSetup({
				type:"post",
				cache:false,
				dataType: "json"
			});

  			// table = $('#stok-barang').DataTable( {
		   //      "processing": true,
		   //      "serverSide": true,
		   //      "ajax": {
		   //          "url": "ajax/stok-barang/ambil.php",
		   //          "dataType": "jsonp"

		   
		   //      }
		   //  });

		   <?php 

		   		if (isset($peminjam)) {
		   			?>

		   			
		   		var id = <?php echo $peminjam['id_peminjam']; ?>;

				$.ajax({
					url : 'ajax/belum/ambil.php',
					data : { id : id },
					beforeSend: function(e) {
		        		if(e && e.overrideMimeType) {
		          			e.overrideMimeType("application/json;charset=UTF-8");
		       	 		}
		      		},
					success : function(response){

						$("#body-pinjam").html(response.hasil);

					}

				});


			<?php
		   		}

		   ?>


			


		   $('#peminjam').DataTable();
			

			$(document).on("click",".kofir-kembali",function(){


				var id=$(this).attr("data-id");
				
					 $.ajax({
						url: 'ajax/belum/kembali.php',
						data: {id:id},
						success: function(){

							location.reload();

						}
					 });
			});

		});

	</script>

