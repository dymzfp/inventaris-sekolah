	
	<script type="text/javascript">
		
		$(document).ready(function() {
  			// $('#operator').DataTable();	

  			$.ajaxSetup({
				type:"post",
				cache:false,
				dataType: "json"
			});

  			$('#daf-barang').DataTable( {
		        "processing": true,
		        "serverSide": true,
		        "ajax": {
		            "url": "ajax/daf-barang/ambil.php",
		            "dataType": "jsonp"
		        }
		    });


		    $("#masuk-tambah").click(function(){

				var kode 	= $("#kode").val();
				var nama		= $("#nama").val();
				var jenis 	= $("#jenis").val();

				if (kode != "" && nama != "" && jenis != "" ) {
					


						if (kode.length != 6) {
							swal({
								title:"Error",
								text:"Kode barang harus 6 huruf/angka",
								type: "warning",
							});
						}
						else {

							$.ajax({
								url: 'ajax/daf-barang/tambah.php',
								data: {
			                        kode : kode,
			                        nama : nama,
			                        jenis : jenis,
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
											text:"Tambah barang sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Kode barang sudah digunakan",
											type: "warning",
										});
									}

								}
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

			$("#masuk-edit").click(function(){

				var id 		= $("#id").val();
				var kode 	= $("#kode_edit").val();
				var nama		= $("#nama_edit").val();
				var jenis 	= $("#jenis_edit").val();

				if (kode != "" && nama != "" && jenis != "" ) {
					


						if (kode.length != 6) {
							swal({
								title:"Error",
								text:"Kode barang harus 6 huruf/angka",
								type: "warning",
							});
						}
						else {

							$.ajax({
								url: 'ajax/daf-barang/edit.php',
								data: {
									id : id,
			                        kode : kode,
			                        nama : nama,
			                        jenis : jenis,
			                    },
			                    beforeSend: function(e) {
					        		if(e && e.overrideMimeType) {
					          			e.overrideMimeType("application/json;charset=UTF-8");
					       	 		}
					      		},
								success: function(response){
									if (response.status = '1') {

										swal({
											title:"Sukses",
											text:"Edit barang sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
										
									}
									else if (response.status = '2') {
										swal({
											title:"Error",
											text:"Edit barang gagal",
											type: "warning",
										});
									}
									else {
										swal({
											title:"Error",
											text:"Kode barang ada",
											type: "warning",
										});
									}

								}
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

			

			$(document).on("click",".hapus-form",function(){
				var id=$(this).attr("data-id");
				swal({
					title:"Hapus Barang",
					text:"Yakin akan menghapus barang ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
					function(){
					 $.ajax({
						url: 'ajax/daf-barang/hapus.php',
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
	                url: 'ajax/daf-barang/data-edit.php',
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

