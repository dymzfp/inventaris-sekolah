	
	<script type="text/javascript">
		
		$(document).ready(function() {
  			// $('#operator').DataTable();	

  			$.ajaxSetup({
				type:"post",
				cache:false,
				dataType: "json"
			});

  			// $('#peminjam').DataTable( {
		   //      "processing": true,
		   //      "serverSide": true,
		   //      "ajax": {
		   //          "url": "ajax/peminjaman/ambil.php",
		   //          "dataType": "jsonp"
		   //      }
		   //  });

		   $.ajax({
					url : 'ajax/peminjaman/ambil.php',
					data : { id : 1 },
					beforeSend: function(e) {
		        		if(e && e.overrideMimeType) {
		          			e.overrideMimeType("application/json;charset=UTF-8");
		       	 		}
		      		},
					success : function(response){

						$("#body-pinjam").html(response.hasil);

					}

				});


		   $('#peminjam').DataTable();




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

			$(document).on("click",".kofir-kembali",function(){
				var id=$(this).attr("data-id");
				swal({
					title:"Konfirmasi",
					text:"Yakin akan mengkonfirmasi pengembalian ini?",
					type: "info",
					showCancelButton: true,
					confirmButtonText: "Konfirmasi",
					closeOnConfirm: true,
				},
					function(){
					 $.ajax({
						url: 'ajax/peminjaman/konfir.php',
						data: {id:id},
						success: function(){

							location.reload();

						}
					 });
				});
			});

		});

	</script>

