	
	<script type="text/javascript">
		
		$(document).ready(function() {
  			// $('#operator').DataTable();	

  			$.ajaxSetup({
				type:"post",
				cache:false,
				dataType: "json"
			});

  			$('#peminjam').DataTable( {
		        "processing": true,
		        "serverSide": true,
		        "ajax": {
		            "url": "ajax/peminjam/ambil.php",
		            "dataType": "jsonp"
		        }
		    });


		    $("#masuk-tambah").click(function(){

				var username 	= $("#username").val();
				var jabatan     = $("#jabatan").val();
				var nama		= $("#nama").val();
				var kelas		= $("#kelas").val();
				var password 	= $("#password").val();
				var password2	= $("#password2").val();

				if (username != "" && jabatan != "" && nama != "" && kelas != "" && password != "" && password2 != "") {
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
								url: 'ajax/peminjam/tambah.php',
								data: {
			                        username : username,
			                        nama : nama,
			                        kelas : kelas,
			                        jabatan : jabatan,
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
											text:"Tambah peminjam sukses",
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

				var id          = $("#id_edit").val();
				var username 	= $("#username_edit").val();
				var jabatan     = $("#jabatan_edit").val();
				var nama		= $("#nama_edit").val();
				var kelas		= $("#kelas_edit").val();

				if (username != "" && jabatan != "" && nama != "" && kelas != "" ) {
					

							$.ajax({
								url: 'ajax/peminjam/edit.php',
								data: {
									id      : id,
			                        username : username,
			                        nama : nama,
			                        kelas : kelas,
			                        jabatan : jabatan
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
											text:"Edit peminjam sukses",
											type: "success",
										}, function(){

											location.reload();
											
										});
										
									}
									else {
										swal({
											title:"Error",
											text:"Edit peminjam gagal",
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

			$('#editModal').on('show.bs.modal', function (e) {
            	

            	var id = $(e.relatedTarget).data('id');
            	/* fungsi AJAX untuk melakukan fetch data */
	            
	            // alert(id);

	            $.ajax({
	                url: 'ajax/peminjam/data-edit.php',
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


			$("#masuk-edit-pass").click(function(){

				var id 			= $("#id_pinjam").val();
				var password 	= $("#password_edit").val();

				if (password != "") {
					

							$.ajax({
								url: 'ajax/peminjam/edit-pass.php',
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
									if (response.status == 1) {
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

			$(".edit-form").click(function(){

				alert("hahha");

			})

			$(document).on("click",".hapus-form",function(){
				var id=$(this).attr("data-id");
				swal({
					title:"Hapus Operator",
					text:"Yakin akan menghapus peminjam ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
					function(){
					 $.ajax({
						url: 'ajax/peminjam/hapus.php',
						data: {id:id},
						success: function(){

							location.reload();

						}
					 });
				});
			});

			$('#editModalPass').on('show.bs.modal', function (e) {
            	

            	var id = $(e.relatedTarget).data('id');
            	/* fungsi AJAX untuk melakukan fetch data */
	            
	            // alert(id);

	            $.ajax({
	                url: 'ajax/peminjam/data-edit-pass.php',
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

