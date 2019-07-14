	
	<script type="text/javascript">
		
		var table;

		$(document).ready(function() {
  			// $('#operator').DataTable();	

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

		   $("#pil-ruang").change(function(){
				var id_ruang = $(this).val();

				$.ajax({
					url : 'ajax/home/ambil.php',
					data : { id_ruang : id_ruang },
					beforeSend: function(e) {
		        		if(e && e.overrideMimeType) {
		          			e.overrideMimeType("application/json;charset=UTF-8");
		       	 		}
		      		},
					success : function(response){

						$("#body-stok").html(response.hasil);

					}

				});


			});


		   $('#stok-barang').DataTable();
		    



		    $('#pinjamModal').on('show.bs.modal', function (e) {
            	
		    	<?php  

		    		if (isset($peminjam)) {

				?>

            	var id = $(e.relatedTarget).data('id');
            	/* fungsi AJAX untuk melakukan fetch data */
	            
	            // console.log(id);

	            $.ajax({
	                url: 'ajax/home/data-edit.php',
	                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
	                data :  {id : id},
                    beforeSend: function(e) {
		        		if(e && e.overrideMimeType) {
		          			e.overrideMimeType("application/json;charset=UTF-8");
		       	 		}
		      		},
	                /* memanggil fungsi getDetail dan mengirimkannya */
	                success : function(response){
	                	$('#edit-sup').html(response.hasil);
	                	/* menampilkan data dalam bentuk dokumen HTML */
	                }
	            });

	            <?php  
	            	}
	            	else {
	            		?>

	            		window.location.assign('login.php');


	            		<?php
	            	}
	            ?>

         });

		    <?php  

		    	if (isset($peminjam)) {

?>


		    
		    $("#masuk-pinjam").click(function(){

				var id 	= $("#id").val();
				var jumlah	= $("#jumlah_pinjam").val();
				var keterangan 	= $("#keterangan").val();
				var peminjam	= <?php echo $peminjam['id_peminjam']; ?>;

				// alert(id + " " + jumlah + " " + " " + keterangan + " " + peminjam);

				if (id != "" && jumlah != "" && peminjam != "" ) {
					

							if (jumlah >= 1) {


								$.ajax({
								url: 'ajax/home/pinjam.php',
								data: {
			                        id : id,
			                        peminjam : peminjam,
			                        jumlah : jumlah,
			                        ket : keterangan,
			                    },
			                    beforeSend: function(e) {
					        		if(e && e.overrideMimeType) {
					          			e.overrideMimeType("application/json;charset=UTF-8");
					       	 		}
					      		},
								success: function(response){
									if (response.status == 1) {
										swal({
											title:"Sukses",
											text:"Pinjam sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Pinjam gagal",
											type: "warning",
										});
									}

								}
							});

							}
							else {

								swal({
									title:"Error",
									text:"Pinjam minimal 1",
									type: "warning",
								});

							}

							

						
				}
				else {
					swal({
						title:"Error",
						text:"Input tidak boleh kosong",
						type: "warning",
					});
				}

			});

			<?php

		    	}

		    ?>

			

		});

	</script>

