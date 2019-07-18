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
	</head>

	<body>
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">

				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="style/img/Freud1.jpg" class="rounded-circle user_img">
								</div>
								<div class="user_info">
									<span>Charles</span>
								</div>
							</div>
						</div>


						<div class="card-body msg_card_body">

							<div class="d-flex justify-content-start mb-4">
								<div class="msg_cotainer">
									Olá, meu nome é Charles. É um prazer conhecê-lo.
								</div>
							</div>

							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
									Olá, Charles.
								</div>
							</div>

							<div class="d-flex justify-content-start mb-4">
								<div class="msg_cotainer">
									Eu estou aqui pra te ouvir sempre que precisar conversar. Falando nisso, como está se sentindo?
								</div>
							</div>


							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
									Estou me sentindo deprimido.
								</div>
							</div>

							<div class="d-flex justify-content-start mb-4">
								<div class="msg_cotainer">
								Poxa, é uma pena saber disso, mas é bom que compartilhe seus sentimentos. Você saberia dizer por quê está se sentindo deprimido?
								</div>
							</div>

							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
									Queria poder dormir e não acordar mais.
								</div>
							</div>

						</div>

						<form action="" method="POST">
							<div class="card-footer">
								<div class="input-group">

									<input type="text"  name="txt_msg" class="form-control type_msg" placeholder="Insira sua mensagem..." />
									<div class="input-group-append">
										<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
									</div>
									<input type="submit" value="enviar"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
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
</html>
