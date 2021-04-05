<template>
    <app-layout imgPath="../assets/">
        <div class="textblock">
            <data-base-menu/>
            <br>
            <p><strong>This page will later on host a database of research topics as well as listing supervisors.</strong></p>
            <p>Meanwhile you can gladly submit an idea for a future research topic that you would like to see in this future database.</p>
            <br>
            <form class="gform" method="POST" @submit.prevent="addTopic">
				<div class="form-elements">
					<div class="grid-container">
						<!--Title-->
						<label for="title">Title</label>
						<input type="text" class="textarea" id="title" name="title" required="" v-model="plan.title" />

                        <!--Author-->
						<label for="author">Author</label>
						<input type="text" class="textarea" id="author" name="author" required="" v-model="plan.author" />

                        <!--Supervisor-->
						<label for="supervisor">Supervisor</label>
						<input type="text" class="textarea" id="supervisor" name="supervisor" required="" v-model="plan.supervisor" />

						<!--Problem-->
						<label for="problem">(General) Problem or Needs</label>
						<textarea class="textarea" id="problem" name="problem" rows="3" v-model="plan.problem"></textarea>

                        <!--Objective-->
						<label for="objective">Research Objective(s)</label>
						<textarea class="textarea" id="objective" name="objective" rows="3" v-model="plan.objective"></textarea>

                        <!--Question-->
						<label for="question">Research Questions</label>
						<textarea class="textarea" id="question" name="question" rows="3" v-model="plan.question"></textarea>

                        <!--References-->
						<label for="references">Main references</label>
						<textarea class="textarea" id="references" name="references" rows="3" v-model="plan.references"></textarea>

                        <!--Research design-->
						<label for="methodology">Research design (methodology)</label>
                        <input type="text" class="textarea" id="methodology" name="methodology" v-model="plan.methodology" />

                        <!--Data collection or development methods-->
						<label for="collect">Data collection or development methods</label>
                        <textarea class="textarea" id="collect" name="collect" rows="3" v-model="plan.method"></textarea>

                        <!--Data analyse methods-->
						<label for="analyse">Data analyse methods</label>
                        <textarea class="textarea" id="analyse" name="analyse" rows="3" v-model="plan.analyse"></textarea>
					</div>

					<!--submit/button-->
					<button type="button" class="button-form" v-on:click="createDoc()">
						Download
					</button>

                    <!--submit/button-->
					<button type="reset" class="button-form">
						Reset
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
    </app-layout>
</template>

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
	.button-form {
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
        margin: 0.5rem;
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
		grid-template-columns: 1fr 3fr;
		grid-gap: 1vh 2%;
	}

	input,
    textarea {
        color: black;
        max-width:700px;
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
        text-align: end;
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

<script>
    import AppLayout from '@/Layouts/AppLayout';
	import TopicBlock from '@/Layouts/TopicBlock'
    import DataBaseMenu from '../../Layouts/DataBaseMenu.vue';
    import pdfMake from "pdfmake/build/pdfmake";
    import pdfFonts from "pdfmake/build/vfs_fonts";

    export default {
        components: {
            AppLayout,
            TopicBlock,
            DataBaseMenu,
            pdfMake,
        },
        data() {
            return {
                plan: {
                    title: '',
                    author: '',
                    supervisor: '',
                    problem: '',
                    objective: '',
                    question: '',
                    references: '',
                    methodology: '',
                    collect: '',
                    analyse: '',
                },
                firstname: "Jhon",
                lastname: "Doe",
                message: "I just created a document using Vue.js",
            }
        },
        created() {
            pdfMake.vfs = pdfFonts.pdfMake.vfs
        },

        methods: {
            createDoc: function () {
                const dd = {
                    content: [
                        { text: 'Research Plan', style: 'header' },
                        { text: 'Title', style: 'subheader' },
                        { text: this.plan.title, style: 'normal' },
                        { text: 'Author', style: 'subheader' },
                        { text: this.plan.author, style: 'normal' },
                        { text: 'Supervisor', style: 'subheader' },
                        { text: this.plan.supervisor, style: 'normal' },
                        { text: '(General) Problem or Needs', style: 'subheader' },
                        { text: this.plan.problem, style: 'normal' },
                        { text: 'Research Objective(s)', style: 'subheader' },
                        { text: this.plan.objective, style: 'normal' },
                        { text: 'Research Questions', style: 'subheader' },
                        { text: this.plan.question, style: 'normal' },
                        { text: 'Main references', style: 'subheader' },
                        { text: this.plan.references, style: 'normal' },
                        { text: 'Research design (methodology)', style: 'subheader' },
                        { text: this.plan.methodology, style: 'normal' },
                        { text: 'Data collection or development methods', style: 'subheader' },
                        { text: this.plan.collect, style: 'normal' },
                        { text: 'Data analyse methods', style: 'subheader' },
                        { text: this.plan.analyse, style: 'normal' },
                        { text: 'Expected outcome(s)', style: 'subheader' },
                        { text: this.plan.outcome, style: 'normal' },
                    ],
                    styles: {
                        header: {
                            fontSize: 24,
                            bold: true,
                            margin: [16, 8],
                        },
                        subheader: {
                            fontSize: 16,
                            bold: true,
                            margin: [16, 8, 16, 4],
                        },
                        normal: {
                           margin: [16, 4, 16, 8],
                        }
                    }
                }
                pdfMake.createPdf(dd).download('ResearchPlan.pdf')
            },

            /*async addTopic() {
                const res = await axios.post('../api/topics', this.topic)
                console.log(res.response);
            }*/
        }
    }
</script>
