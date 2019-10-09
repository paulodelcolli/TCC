<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" type="text/css" href="style/css/style.css">

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
	</head>

	<body>
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">

				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="style/img/perfil.jpg" class="perfil">
								</div>
								<div class="user_info">
									<span>Charles</span>
								</div>
							</div>
						</div>


						<div class="card-body msg_card_body" id="messages">



							<div class="d-flex justify-content-end mb-4" id="resposta">
								<div class="msg_cotainer_send">
									<?php 
										echo($_POST["txt_msg"]);
									?>
								</div>
							</div>
														<div class="d-flex justify-content-start mb-4">
								<div class="msg_cotainer">
										<?php

													if(isset($_POST["txt_msg"]) ){
														$data = array("msgForward" => $_POST["txt_msg"]);
														$url = "localhost:5000/recData";  
														$content = json_encode($data);

														$curl = curl_init($url);
														curl_setopt($curl, CURLOPT_HEADER, false);
														curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
														curl_setopt($curl, CURLOPT_HTTPHEADER,
																array("Content-type: application/json"));
														curl_setopt($curl, CURLOPT_POST, true);
														curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

														$json_response = curl_exec($curl);

														$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

														if ( $status != 200 ) {
															die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
														}


														curl_close($curl);

														$response = json_decode($json_response, true);

														echo($json_response);
													}
													
										?>
								</div>
							</div>



						</div>

						<form action="" method="POST">
							<div class="card-footer">
								<div class="input-group">

									<input type="text" autocomplete="off" id="textbox" name="txt_msg" class="form-control type_msg" placeholder="Insira sua mensagem..." />
									<div class="input-group-append">
										<span class="input-group-text send_btn"><button style="background-color: rgba(0,0,0, 0.0); border: none" id="button" type="submit"><i style="color:white" class="fas fa-location-arrow"></i></button></span>
									</div>
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>

</html>
