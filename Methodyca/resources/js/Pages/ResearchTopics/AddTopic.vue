<template>
    <app-layout imgPath="../assets/">
        <div class="textblock">
            <data-base-menu/>
            <br>
            <p><strong>This is a database of research topics and supervisors for game-related studies.</strong></p>
            <p>Add Topic is a section for potential supervisors for submitting topics that can be studied by students during their final thesis.</p>
            <br>
            <form class="gform" method="POST" @submit.prevent="captcha(captchaKey, addTopic, name, topic)">
				<div class="form-elements">
					<div class="grid-container">
                        <label for="my-name" class="hp">Name</label>
                        <input id="my-name" class="hp" type="text" name="my-name" v-model="name" />
						<!--Title-->
						<label for="title">Title or Topic*</label>
						<input type="text" class="textarea" id="title" name="title" rows="1" required="" minlength="3" v-model="topic.title" />

						<!--Description-->
						<label for="description">Description</label>
						<textarea type="text" class="textarea" id="description" name="description" rows="3" v-model="topic.description"></textarea>

						<!--Keywords-->
						<label for="keywords" class="keywordsLabel">Keywords</label>
						<input type="text" class="textarea" id="keywords" name="keywords" rows="1" v-model="topic.keywords"/>

						<!--Expiring Date-->
						<label for="date">Date</label>
						<input type="date" class="textarea" id="date" name="date" rows="1" v-model="topic.expire" />
						<small> After this date the topic can't be found by the search anymore.</small>

						<!--Name & Email-->
						<label for="name">Your Name*</label>
						<input type="text" class="textarea" id="name" name="name" rows="1" required="" minlength="3" v-model="topic.name"/>
						<small> This name will be present only on the student research plan if the topic is selected.</small>

						<label for="email">Your Email*</label>
						<input type="email" class="textarea" id="email" name="email" rows="1" v-model="topic.email" />
						<small> This email will be present only on the student research plan if the topic is selected.</small>

						<!--Checkbox-->
						<input type="checkbox" id="checkbox" name="checkbox"  v-model="topic.agreement" />
						<label for="checkbox" class="checkboxLabel"> I allow to present my contact information in the researhc plans if the topic is selected by a student.</label>
					</div>

					<!--submit/button-->
					<button type="submit" v-bind:disabled="isDisabled" class="button-success">
						Send
					</button>
                    <!--reset/button-->
					<button type="reset" class="button-success">
						Reset
					</button>
				</div>

				<modal v-if="popup.show" @close="popup.show = false">
                    <template v-slot:header>
                        <h3>{{ popup.header }}</h3>
                    </template>
                    <template v-slot:body>
                       {{ popup.body }}
                    </template>
                </modal>

			</form>
        </div>
    </app-layout>
</template>

<style scoped>
    .hp {
        display: none;
	}
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

	.textblock form a:link {
		/* color: #ff00ff; */
		color: #00edff;
		font-weight: bold;
		background-color: transparent;
		text-decoration: none;
	}
	.textblock form a:visited {
		color: #00edff;
	    /* color: #b300b3; */
		background-color: transparent;
		text-decoration: none;
	}
	.textblock form a:hover {
		color: #ffc1fe;
		background-color: transparent;
		text-decoration: none;
	}
    button {
        margin: 0.5rem;
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
    input,
    textarea {
        color: black;
    }

</style>

<script>
    import AppLayout from '@/Layouts/AppLayout';
	import TopicBlock from '@/Layouts/TopicBlock'
    import DataBaseMenu from '@/Layouts/DataBaseMenu.vue';
    import Modal from '@/Layouts/Modal.vue';

    export default {
        components: {
            AppLayout,
            TopicBlock,
            DataBaseMenu,
            Modal
        },
        inject: ['captchaKey'],
        data() {
            return {
                name: '',
                topic: {
                    title: '',
                    description: null,
                    keywords: null,
                    expire: null,
                    name: '',
                    email: '',
                    agreement: false,
                    token: '',
                },
                popup: {
                    show: false,
                    header: ''
                },
                isDisabled: false,
            }
        },
        methods: {
            captcha(captchaKey, addTopic, name, topic) {
                this.isDisabled = true;
                if (!name) {
                    grecaptcha.ready(function() {
                        grecaptcha.execute(captchaKey, {action: 'submit'}).then(function(token) {
                            // Add your logic to submit to your backend server here.
                            addTopic(topic, token);
                        });
                    });
                }
            },
            async addTopic(topic, token) {
                topic.token = token;
                //console.log(token);
                topic.name =  btoa(topic.name)
                topic.email =  btoa(topic.email)
                try {
                    const res = await axios.post('../api/topics', topic)
                    //console.log(res.status)
                    if (res.status < 300) {
                        this.popup.header = 'Thank you for your input!';
                        this.popup.body = 'We will make sure to add it to the database.';
                        this.popup.show = true;
                    } else {
                        this.popup.header = 'Thank you for your input!';
                        this.popup.body = 'But something went wrong. Please check input and try again.';
                        this.popup.show = true;
                    }
                } catch(e) {
                    this.popup.header = 'Thank you for your input!';
                    this.popup.body = 'But something went wrong. Please check input and try again.';
                    this.popup.show = true;
                }
                this.isDisabled = false;
            }
        }
    }
</script>
