	
	<script type="text/javascript">
		
		$(document).ready(function() {
  			// $('#operator').DataTable();	

  			$.ajaxSetup({
				type:"post",
				cache:false,
				dataType: "json"
			});

  			$('#ruangan').DataTable( {
		        "processing": true,
		        "serverSide": true,
		        "ajax": {
		            "url": "ajax/ruang/ambil.php",
		            "dataType": "jsonp"
		        }
		    });


		    $("#masuk-tambah").click(function(){

				var kode_ruang  = $("#kode_ruang").val();
				var nama_ruang 	= $("#nama_ruang").val();
				var jenis 		= $("#jenis").val();
				var keterangan 	= $("#keterangan").val();
				var status 		= 1;

				if (kode_ruang != "" && nama_ruang != "" && jenis != "" && status != "" ) {

							// alert(kode_ruang + nama_ruang + jenis + keterangan + status);

							$.ajax({
								url: 'ajax/ruang/tambah.php',
								data: {
			                        kode_ruang  : kode_ruang,
			                        nama_ruang  : nama_ruang,
			                        jenis 		: jenis,
			                        keterangan 	: keterangan,
			                        status 		: status
			                    },
			                    beforeSend: function(e) {
					        		if(e && e.overrideMimeType) {
					          			e.overrideMimeType("application/json;charset=UTF-8");
					       	 		}
					      		},
								success: function(response){
									if (response.status == '1') {

										swal({
											title:"Sukses",
											text:"Tambah ruangan sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
										
									}
									else if (response.status == '2') {
										swal({
											title:"Error",
											text:"Tambah ruangan gagal",
											type: "warning",
										});
									}
									else if (response.status == '0') {
										swal({
											title:"Error",
											text:"Kode ruangan ada",
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

				var id 			= $("#id").val();
				var kode_ruang  = $("#kode_ruang_edit").val();
				var nama_ruang 	= $("#nama_ruang_edit").val();
				var jenis 		= $("#jenis_edit").val();
				var keterangan 	= $("#keterangan_edit").val();
				var status 		= $("#status_edit").val();

				// alert(id);

				if (kode_ruang != "" && nama_ruang != "" && jenis != "" && status != "" ) {

							// alert(kode_ruang + nama_ruang + jenis + keterangan + status);

							$.ajax({
								url: 'ajax/ruang/edit.php',
								data: {
									id          : id,
			                        kode_ruang  : kode_ruang,
			                        nama_ruang  : nama_ruang,
			                        jenis 		: jenis,
			                        keterangan 	: keterangan,
			                        status 		: status
			                    },
			                    beforeSend: function(e) {
					        		if(e && e.overrideMimeType) {
					          			e.overrideMimeType("application/json;charset=UTF-8");
					       	 		}
					      		},
								success: function(response){
									if (response.status = 1) {

										swal({
											title:"Sukses",
											text:"Edit ruangan sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
										
									}
									else if (response.status == '2') {
										swal({
											title:"Error",
											text:"Edit ruangan gagal",
											type: "warning",
										});
									}
									else {
										swal({
											title:"Error",
											text:"Kode ruangan ada",
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
					title:"Hapus Ruangan",
					text:"Yakin akan menghapus ruangan ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
					function(){
					 $.ajax({
						url: 'ajax/ruang/hapus.php',
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
	                url: 'ajax/ruang/data-edit.php',
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

