	
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
		            "url": "ajax/suplier/ambil.php",
		            "dataType": "jsonp"
		        }
		    });


		    $("#masuk-tambah").click(function(){

				var kode 	= $("#kode").val();
				var nama	= $("#nama").val();
				var alamat 	= $("#alamat").val();
				var status	= 1

				if (kode != "" && nama != "" && alamat != "" && status != "") {
					

						if (kode.length < 6 || kode.length > 6) {
							swal({
								title:"Error",
								text:"Kode suplier harus 6 huruf/angka",
								type: "warning",
							});
						}
						else {

							$.ajax({
								url: 'ajax/suplier/tambah.php',
								data: {
			                        kode   : kode,
			                        nama   : nama,
			                        alamat : alamat,
			                        status : status
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
											text:"Tambah suplier sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Kode suplier sudah ada",
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

				var id     = $("#id-edit").val();
				var kode 	= $("#kode-edit").val();
				var nama	= $("#nama-edit").val();
				var alamat 	= $("#alamat-edit").val();
				var status	= $("#status-edit").val();

				// alert(id+kode+nama+alamat+status)

				if (kode != "" && nama != "" && alamat != "" && status != "") {
					

						if (kode.length < 6 || kode.length > 6) {
							swal({
								title:"Error",
								text:"Kode suplier harus 6 huruf/angka",
								type: "warning",
							});
						}
						else {

							$.ajax({
								url: 'ajax/suplier/edit.php',
								data: {
									id     : id,
			                        kode   : kode,
			                        nama   : nama,
			                        alamat : alamat,
			                        status : status
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
											text:"Edit suplier sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Kode suplier sudah ada",
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
					title:"Hapus Suplier",
					text:"Yakin akan menghapus suplier ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
					function(){
					 $.ajax({
						url: 'ajax/suplier/hapus.php',
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
	                url: 'ajax/suplier/data-edit.php',
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

