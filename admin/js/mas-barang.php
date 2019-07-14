	
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
		            "url": "ajax/mas-barang/ambil.php",
		            "dataType": "jsonp"
		        }
		    });


		    $("#masuk-tambah").click(function(){

				var barang 	= $("#id_barang").val();
				var ruang     = $("#ruang").val();
				var suplier		= $("#suplier").val();
				var jumlah		= $("#jumlah").val();
				var tanggal 	= $("#tanggal").val();

				// alert(barang);

				if ( barang != "" && ruang != "" && suplier != "" && jumlah != "" && tanggal != "" ) {

						if (jumlah >= 0) {

							$.ajax({
								url: 'ajax/mas-barang/tambah.php',
								data: {
			                        barang : barang,
			                        ruang : ruang,
			                        suplier : suplier,
			                        jumlah : jumlah,
			                        tanggal : tanggal
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
											text:"Tambah barang masuk sukses",
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
									text:"Gagal",
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
					text:"Yakin akan menghapus barang masuk ini?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Hapus",
					closeOnConfirm: true,
				},
					function(){
					 $.ajax({
						url: 'ajax/mas-barang/hapus.php',
						data: {id:id},
						success: function(){

							location.reload();

						}
					 });
				});
			});

		});

	</script>

