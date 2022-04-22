<?php
		// security token to prevent submissions through scripts or cross-site-scripting attacks
		session_start();
		$_SESSION['ucf_csrf_token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32);
	?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title>Jigowatt's Ultimate PHP, HTML5 &amp; AJAX Contact Form</title>

	<!-- copy/paste start -->
	<link rel="stylesheet" href="contact-form/assets/styles/select2.css">
	<link rel="stylesheet" href="contact-form/assets/styles/contact.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="contact-form/assets/js/select2.min.js"></script>
	<script src="contact-form/assets/js/contact.js"></script>
	<!-- copy/paste end -->
</head>

<body>

	<div class="content">

		<!-- copy/paste start -->
		<form action="contact-form/process.php" enctype="multipart/form-data" method="POST" name="contact" id="contact" class="ucf">
			<div class="message"></div>
			<fieldset>
				<legend>Please provide your details below</legend>

				<p class="field-wrapper">
					<label for="name" accesskey="U">
						<span class="required">Your Name</span>
						<input class="field" type="text" name="name" id="name" size="30" required>
					</label>
				</p>

				<p class="field-wrapper">
					<label for="email" accesskey="E">
						<span class="required">Email</span>
						<input class="field" type="email" name="email" id="email" size="30" placeholder="you@youremail.com"
							required>
					</label>
				</p>

				<p class="field-wrapper">
					<label for="phone" accesskey="P">
						<span class="required">Phone</span>
						<input class="field" type="tel" name="phone" id="phone" size="30" required>
					</label>
				</p>

				<p class="field-wrapper">
					<label for="subject" accesskey="S">
						<span class="required">Subject</span>
						<select class="field" name="subject" id="subject" required>
							<option value="">Select one</option>
							<option value="support">Support</option>
							<option value="sales">Sales</option>
							<option value="bugs">Report a bug</option>
						</select>
					</label>
				</p>

				<p class="field-wrapper">
					<label for="message" accesskey="M">
						<span class="required">Message</span>
						<textarea class="field" name="message" id="message" cols="40" rows="3" required></textarea>
					</label>
				</p>

				<p class="field-wrapper">
					<label for="attachment" accesskey="F">
						<span class="required">Upload a file</span>
						<input class="field" type="file" name="attachment[]" id="attachment" multiple>
					</label>
				</p>

				<!-- Google reCAPTCHA -->
				<input type="hidden" name="g-recaptcha-response" />
				<script src="https://www.google.com/recaptcha/api.js?render=6Ld9xq0UAAAAAAdxukumlRpG88LsYDLM2R5LNiU7"></script>
				<script>
					grecaptcha.ready(function () {
						jQuery('form.ucf').each(function(){
							$form = jQuery(this);
							$form.find('button[type=submit]').click(function (e) {
								e.preventDefault();
								$submitbtn = $(this);
								grecaptcha.execute('6Ld9xq0UAAAAAAdxukumlRpG88LsYDLM2R5LNiU7', {
									action: 'contactform'
								}).then(function (token) {
									$submitbtn.closest('form.ucf').find('input[name=g-recaptcha-response]').val(token);
									$submitbtn.closest('form.ucf').trigger('submit');
								});
							});
						});
					});
				</script>

				<input type="hidden" name="ucf_csrf_token" value="<?php echo $_SESSION['ucf_csrf_token'] ?>" />

				<button type="submit" class="button primary">Send details</button>

			</fieldset>
		</form>
		<!-- copy/paste end -->
	</div>

</body>

</html>