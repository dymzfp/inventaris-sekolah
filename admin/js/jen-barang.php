	
	<script type="text/javascript">
		
		$(document).ready(function() {
  			// $('#operator').DataTable();	

  			$.ajaxSetup({
				type:"post",
				cache:false,
				dataType: "json"
			});

  			$('#suplier').DataTable( {
		        "processing": true,
		        "serverSide": true,
		        "ajax": {
		            "url": "ajax/jen-barang/ambil.php",
		            "dataType": "jsonp"
		        }
		    });



		    $("#masuk-tambah").click(function(){

				var nama	= $("#nama").val();
				
				if (nama != "") {
					

							$.ajax({
								url: 'ajax/jen-barang/tambah.php',
								data: {
			                        nama   : nama
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
											text:"Tambah jenis barang sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Tambah jenis barang gagal",
											type: "warning",
										});
									}

								}
							});

						

				}
				else {
					swal({
						title:"Error",
						text:"Input tidak boleh kosong",
						type: "warning",
					});
				}

			});


			$("#masuk-edit").click(function(){

				var id 		= $("#id-edit").val();
				var nama	= $("#nama-edit").val();
				
				// alert(id+kode+nama+alamat+status)

				if (nama != "") {
					

							$.ajax({
								url: 'ajax/jen-barang/edit.php',
								data: {
									id     : id,
			                        nama   : nama
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
											text:"Edit jenis barang sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Edit jenis barang gagal",
											type: "warning",
										});
									}

								}
							});

						

				}
				else {
					swal({
						title:"Error",
						text:"Input tidak boleh kosong",
						type: "warning",
					});
				}

			});


			

		

			$(document).on("click",".hapus-form",function(){
				var id=$(this).attr("data-id");
				swal({
					title:"Hapus Suplier",
					text:"Yakin akan menghapus jenis barang ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
					function(){
					 $.ajax({
						url: 'ajax/jen-barang/hapus.php',
						data: {id:id},
						success: function(){

							location.reload();

						}
					 });
				});
			});

			$('#editModal').on('show.bs.modal', function (e) {
            	

            	var id = $(e.relatedTarget).data('id');
            	/* fungsi AJAX untuk melakukan fetch data */
	            
	            // alert(id);

	            $.ajax({
	                url: 'ajax/jen-barang/data-edit.php',
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
         });

		});

	</script>

