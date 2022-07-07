<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-9">
							<h1 class="page-header">DAFTAR ORDER</h1>
							<div class="box box-solid">
								<div class="box-body">
									<table class="table table-bordered">
										<thead>
											<th></th>
											<th>id_chart</th>
											<th>id_user</th>
											<th>status<s/th>
											
										</thead>

                                        <?php 
                                         $conn = $pdo->open();
                                         try {
                                           $stmt = $conn->prepare(" SELECT * FROM konfirmasi ");
                                           $stmt->execute();
                                    
                                        //    print_r($stmt);
                                        //    die;

                                           foreach ($stmt as $row) {
                                           ?>
                                             <tbody id="tbody">
                                             <tr>
                                                <td></td>
                                                 <td><?= $row["id_chart"]; ?></td>
                                                 <td><?= $row["id_user"]; ?></td>
                                                 <td>
                                                    <?php 
                                                    if( $row["status"] == '1'){
                                                      echo  'Sudah Dibayar';
                                                    } else {
                                                        echo 'Belum Dibayar';
                                                    }
                                                    ?>
                                                 </td>
                                             </tr>
                                         </tbody>
                                         <?php 
                                           }
                                         } catch (PDOException $e) {
                                           echo "There is some problem in connection: " . $e->getMessage();
                                         }
                           
                                         $pdo->close();

                                         ?>
                                       
										
									</table>
								</div>
							</div>
					
							<!-- <div class="d-sm-flex justify-content-between align-items-center">
								<button style="margin-bottom:20px" class="btn btn-warning col-md-2" href="">Chekout</button>
							</div> -->
						</div>
						<div class="col-sm-3">
							<?php include 'includes/sidebar.php'; ?>
						</div>
					</div>
				</section>

			</div>
		</div>
		<?php $pdo->close(); ?>
		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
	<!-- <script>
		var total = 0;
		$(function() {
			$(document).on('click', '.cart_delete', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				$.ajax({
					type: 'POST',
					url: 'cart_delete.php',
					data: {
						id: id
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			$(document).on('click', '.minus', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				if (qty > 1) {
					qty--;
				}
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			$(document).on('click', '.add', function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				var qty = $('#qty_' + id).val();
				qty++;
				$('#qty_' + id).val(qty);
				$.ajax({
					type: 'POST',
					url: 'cart_update.php',
					data: {
						id: id,
						qty: qty,
					},
					dataType: 'json',
					success: function(response) {
						if (!response.error) {
							getDetails();
							getCart();
							getTotal();
						}
					}
				});
			});

			getDetails();
			getTotal();

		});

		function getDetails() {
			$.ajax({
				type: 'POST',
				url: 'cart_details.php',
				dataType: 'json',
				success: function(response) {
					$('#tbody').html(response);
					getCart();
				}
			});
		}

		function getTotal() {
			$.ajax({
				type: 'POST',
				url: 'cart_total.php',
				dataType: 'json',
				success: function(response) {
					total = response;
				}
			});
		}
	</script> -->

</body>

</html>