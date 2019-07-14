	
	<script type="text/javascript">
		
		$(document).ready(function() {
  			// $('#operator').DataTable();	

  			$.ajaxSetup({
				type:"post",
				cache:false,
				dataType: "json"
			});

  			$('#operator').DataTable( {
		        "processing": true,
		        "serverSide": true,
		        "ajax": {
		            "url": "ajax/operator/ambil.php",
		            "dataType": "jsonp"
		        }
		    });


		    $("#masuk-tambah").click(function(){

				var username 	= $("#username").val();
				var nama		= $("#nama").val();
				var password 	= $("#password").val();
				var password2	= $("#password2").val();

				if (username != "" && nama != "" && password != "" && password2 != "") {
					if (password == password2) {

						if (password.length < 6) {
							swal({
								title:"Error",
								text:"Password minimal 6 huruf/angka",
								type: "warning",
							});
						}
						else {

							$.ajax({
								url: 'ajax/operator/tambah.php',
								data: {
			                        username : username,
			                        nama : nama,
			                        password : password
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
											text:"Tambah operator sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Username sudah digunakan",
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
							text:"Password tidak sama",
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

			$("#masuk-edit").click(function(){

				var id 			= $("#id").val();
				var username 	= $("#username_edit").val();
				var nama		= $("#nama_edit").val();

				if (username != "" && nama != "") {
					

							$.ajax({
								url: 'ajax/operator/edit.php',
								data: {
									id 		 : id,
			                        username : username,
			                        nama : nama
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
											text:"Edit operator sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Username sudah digunakan",
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


			$("#masuk-edit-pass").click(function(){

				var id 			= $("#id").val();
				var password 	= $("#password_edit").val();

				if (password != "") {
					

							$.ajax({
								url: 'ajax/operator/edit-pass.php',
								data: {
									id 		 : id,
			                        password : password,
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
											text:"Ganti password sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
									}
									else {
										swal({
											title:"Error",
											text:"Ganti password gagal",
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
					title:"Hapus Operator",
					text:"Yakin akan menghapus operator ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
					function(){
					 $.ajax({
						url: 'ajax/operator/hapus.php',
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
	                url: 'ajax/operator/data-edit.php',
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

			$('#editModalPass').on('show.bs.modal', function (e) {
            	

            	var id = $(e.relatedTarget).data('id');
            	/* fungsi AJAX untuk melakukan fetch data */
	            
	            // alert(id);

	            $.ajax({
	                url: 'ajax/operator/data-edit-pass.php',
	                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
	                data :  {id : id},
                    beforeSend: function(e) {
		        		if(e && e.overrideMimeType) {
		          			e.overrideMimeType("application/json;charset=UTF-8");
		       	 		}
		      		},
	                /* memanggil fungsi getDetail dan mengirimkannya */
	                success : function(response){
	                	$('#edit-sup-pass').html(response.hasil);
	                	/* menampilkan data dalam bentuk dokumen HTML */
	                }
	            });
         });


		});

	</script>

