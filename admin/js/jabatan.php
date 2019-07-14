	
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
		            "url": "ajax/jabatan/ambil.php",
		            "dataType": "jsonp"
		        }
		    });



		    $("#masuk-tambah").click(function(){

				var nama	= $("#nama").val();
				
				if (nama != "") {
					

							$.ajax({
								url: 'ajax/jabatan/tambah.php',
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
											text:"Tambah jabatan sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Tambah jabatan gagal",
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
								url: 'ajax/jabatan/edit.php',
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
											text:"Edit jabatan sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Edit jabatan gagal",
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
					text:"Yakin akan menghapus jabatan ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
					function(){
					 $.ajax({
						url: 'ajax/jabatan/hapus.php',
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
	                url: 'ajax/jabatan/data-edit.php',
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

