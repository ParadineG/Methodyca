<template>
  <div id="content" class="database">
		<div class="textblock">
		<h1>Database</h1>
			<br>
			<p><strong>This page will later on host a database of research topics as well as listing supervisors.</strong></p>
			<p>Meanwhile you can gladly submit an idea for a future research topic that you would like to see in this future database.</p>
			<br>
			<form class="gform" method="POST" action="https://script.google.com/a/tlu.ee/macros/s/AKfycbwzQ4EMJvS40BuX6p-Cfh6_eYEXeiJLRyu_cN_L/exec">
				<div class="form-elements">
					<div class="grid-container">
						<!--Title-->
						<label for="title">Title or Topic*</label>
						<input type="text" class="textarea" id="title" name="title" rows="1" required=""/>

						<!--Description-->
						<label for="description">Description</label>
						<textarea type="text" class="textarea" id="description" name="description" rows="3"></textarea>

						<!--Keywords-->
						<label for="keywords" class="keywordsLabel">Keywords</label>
						<input type="text" class="textarea" id="keywords" name="keywords" rows="1" />

						<!--Expiring Date-->
						<label for="date">Date</label>
						<input type="date" class="textarea" id="date" name="date" rows="1" />
						<small> After this date the topic can't be found by the search anymore.</small>

						<!--Name & Email-->
						<label for="name">Your Name*</label>
						<input type="text" class="textarea" id="name" name="name" rows="1" required=""/>
						<small> This name will be present only on the student research plan if the topic is selected.</small>

						<label for="email">Your Email*</label>
						<input type="email" class="textarea" id="email" name="email" rows="1" required=""/>
						<small> This email will be present only on the student research plan if the topic is selected.</small>

						<!--Checkbox-->
						<input type="checkbox" id="checkbox" name="checkbox" />
						<label for="checkbox" class="checkboxLabel"> I allow to present my contact information in the researhc plans if the topic is selected by a student.</label>
					</div>

					<!--submit/button-->
					<button v-on:click="loaded()" type="submit" class="button-success">
						Send
					</button>

					<fieldset class="pure-group honeypot-field">
					<label for="honeypot">To help avoid spam, utilize a Honeypot technique with a hidden text field; must be empty to submit the form! Otherwise, we assume the user is a spam bot.</label>
					<input id="honeypot" type="text" name="honeypot" value="" />
					</fieldset>
				</div>

				<div class="thankyou_message" style="display: none;">
					<p style="font-size: 1.1em; text-align: center;">- <strong><em>Thank you</em> for your input!</strong> - <br> We will make sure to add it to the database.</p>
				</div>

			</form>
		</div>
	</div>
</template>

<script>
export default {
	methods: {
		// get all data in form and return object
		getFormData: function(form) {
			var elements = form.elements;
			var honeypot;

			var fields = Object.keys(elements).filter(function(k) {
				if (elements[k].name === "honeypot") {
					honeypot = elements[k].value;
					return false;
				}
				return true;
			}).map(function(k) {
				if(elements[k].name !== undefined) {
					return elements[k].name;
				// special case for Edge's html collection
				}else if(elements[k].length > 0){
					return elements[k].item(0).name;
				}
			}).filter(function(item, pos, self) {
				return self.indexOf(item) == pos && item;
			});

			var formData = {};
			fields.forEach(function(name){
				var element = elements[name];

				// singular form elements just have one value
				formData[name] = element.value;

				// when our element has multiple items, get their values
				if (element.length) {
					var data = [];
					for (var i = 0; i < element.length; i++) {
						var item = element.item(i);
						if (item.checked || item.selected) {
							data.push(item.value);
						}
					}
					formData[name] = data.join(', ');
				}
			});

			// add form-specific values into the data
			formData.formDataNameOrder = JSON.stringify(fields);
			formData.formGoogleSheetName = form.dataset.sheet || "responses"; // default sheet name
			formData.formGoogleSendEmail
				= form.dataset.email || ""; // no email by default

			return {data: formData, honeypot: honeypot};
		},

		handleFormSubmit: function(event) {  // handles form submit without any jquery
			event.preventDefault();           // we are submitting via xhr below
			var form = event.target;
			var formData = this.getFormData(form);
			var data = formData.data;

			// If a honeypot field is filled, assume it was done so by a spam bot.
			if (formData.honeypot) {
				return false;
			}

			this.disableAllButtons(form);
			var url = form.action;
			var xhr = new XMLHttpRequest();
			xhr.open('POST', url);
			// xhr.withCredentials = true;
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function() {
					if (xhr.readyState === 4 && xhr.status === 200) {
						form.reset();
						var formElements = form.querySelector(".form-elements")
						if (formElements) {
							formElements.style.display = "none"; // hide form
						}
						var thankYouMessage = form.querySelector(".thankyou_message");
						if (thankYouMessage) {
							thankYouMessage.style.display = "block";
						}
					}
			};
			// url encode form data for sending as post data
			var encoded = Object.keys(data).map(function(k) {
					return encodeURIComponent(k) + "=" + encodeURIComponent(data[k]);
			}).join('&');
			xhr.send(encoded);
		},

		loaded: function() {
			// bind to the submit event of our form
			var forms = document.querySelectorAll("form.gform");
			for (var i = 0; i < forms.length; i++) {
				forms[i].addEventListener("submit", this.handleFormSubmit, false);
			}
		},

		disableAllButtons: function(form) {
			var buttons = form.querySelectorAll("button");
			for (var i = 0; i < buttons.length; i++) {
				buttons[i].disabled = true;
			}
		}
		}
	}
</script>


<style scoped>

	.textblock {
		color: #fefefe;
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		background-color: rgba(61, 75, 88, 0.8);
		position: relative;
		left: 20%;
		width: 60%;
		margin-top: 10px;
		padding: 20px;
		padding-top: 15px;
		overflow: hidden;
	}

	@media screen and (max-width: 990px) {
		.textblock {
			left: 5%;
			width: 90%;
		}
	}

	.textblock a:link {
		/* color: #ff00ff; */
		color: #00edff;
		font-weight: bold;
		background-color: transparent;
		text-decoration: none;
	}
	.textblock a:visited {
		color: #00edff;
	    /* color: #b300b3; */
		background-color: transparent;
		text-decoration: none;
	}
	.textblock a:hover {
		color: #ffc1fe;
		background-color: transparent;
		text-decoration: none;
	}

	.button-success {
        color: white;
        border-radius: 4px;
		border: 1px solid rgba(254,254,254, 0.9);
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        background: rgba(61, 75, 88, 0);
		font-size: 125%;
		padding-left: 16px;
		padding-right: 16px;
		padding-top: 5px;
		padding-bottom: 4px;
        color: #fefefe;
		font-family: "Raleway";
        font-weight: 800;
        font-size: 18px;
        transition: 0.7s ease;
        text-decoration: none;
		margin-top: 10px;
		cursor: pointer;
	}

	.button-success:hover {
		color: rgba(0,237,255, 0.9);
		border: 1px solid rgba(0,237,255, 0.9);
	}

	.honeypot-field {
    display: none;
	}

	textarea {
		top: -2px;
		padding: 10px;
		border-radius: 4px 4px 4px 4px;
    box-sizing: border-box;
		border: 1px solid #ccc;
    box-shadow: inset 0 4px 3px #ddd;
		writing-mode: horizontal-tb !important;
    cursor: text;
		resize: none;
		font: inherit;
		font-size: 0.9em;
		vertical-align: top;
	}

	.textarea {
		padding: 3px 8px 3px;
		border-radius: 4px 4px 4px 4px;
    box-sizing: border-box;
		border: 1px solid rgba(62, 95, 125, 0.6);
    box-shadow: inset 0 4px 3px rgba(62, 95, 125, 0.2);
		writing-mode: horizontal-tb !important;
    cursor: text;
		resize: none;
		font: inherit;
		font-size: 0.9em;
	}

	.grid-container {
		display: grid;
		grid-template-columns: auto auto auto auto;
		grid-gap: 1vh 2%;
	}

	#title {
		grid-column: 2 / span 3;
	}

	#description {
		grid-column: 2 / span 3;
		grid-row: 2 / span 2;
	}

	#keywords {
		grid-column: 2 / span 3;
	}

	.keywordsLabel {
		grid-row: 4 /5;
	}

	#date {
		grid-column: 2 / span 2;
	}

	#name {
		grid-column: 2 / span 2;
	}

	#email {
		grid-column: 2 / span 2;
	}

	#checkbox {
		grid-column: 2 / 3;
		align-self: center;
		justify-self: center;
	}

	.checkboxLabel {
		justify-self: start;
		grid-column: 3 / span 2;
	}

	::placeholder {
		color: gray;
	}

	label {
		justify-self: end;
		align-self: center;
	}

	small {
		align-self: center;
	}

	fieldset {
		border: 0;
		margin: 0 auto;
		width: 100%;
		vertical-align: top;
	}

</style>
