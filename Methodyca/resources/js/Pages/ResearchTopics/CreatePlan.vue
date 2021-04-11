<template>
    <app-layout imgPath="../assets/">
        <div class="textblock">
            <data-base-menu/>
            <br>
            <p><strong>This page will later on host a database of research topics as well as listing supervisors.</strong></p>
            <p>Meanwhile you can gladly submit an idea for a future research topic that you would like to see in this future database.</p>
            <br>
            <form class="gform" method="POST" @submit.prevent="addTopic" v-on:reset="onReset(plan)">
				<div class="form-elements">
					<div class="grid-container">
                        <label for="plan-name" class="hp">Name</label>
                        <input id="plan-name" class="hp" type="text" name="name" v-model="plan.name" />
						<!--Title-->
						<label for="title" title="What is the title or topic of your research (search from the database or enter a new topic)?">Title</label>
						<input type="text" class="textarea" id="title" name="title" required="" v-model="plan.title" @change="saveLocally(plan)" />

                        <!--Author-->
						<label for="author" title="What is your fullname?">Author</label>
						<input type="text" class="textarea" id="author" name="author" required="" v-model="plan.author" @change="saveLocally(plan)" />

                        <!--Authors email-->
						<label for="author-email" title="What is your email?">Author's e-mail</label>
						<input type="email" class="textarea" id="author-email" name="author-email" v-model="plan.authorEmail" @change="saveLocally(plan)" />

                        <!--Supervisor-->
						<label for="supervisor" title="Who is your supervisor (filled in automatically if the topic is selected from the database)?">Supervisor</label>
						<input type="text" class="textarea" id="supervisor" name="supervisor" required="" v-model="plan.supervisor" @change="saveLocally(plan)" />

                        <!--Supervisors email-->
						<label for="supervisor-email" title="What is supervisor's email?">Supervisor's e-mail</label>
						<input type="email" class="textarea" id="supervisor-email" name="supervisor-email" required="" v-model="plan.supervisorEmail" @change="saveLocally(plan)" />

						<!--Problem-->
						<label for="problem" title="What is this general problem or need or idea your research tries to solve?">Problem</label>
						<textarea class="textarea" id="problem" name="problem" rows="3" v-model="plan.problem" @change="saveLocally(plan)"></textarea>

                        <!--Objective-->
						<label for="objective" title="What is your research objective?">Objective</label>
						<textarea class="textarea" id="objective" name="objective" rows="3" v-model="plan.objective" @change="saveLocally(plan)"></textarea>

                        <!--Question-->
						<label for="question" title="What are your research questions?">Research Questions</label>
						<textarea class="textarea" id="question" name="question" rows="3" v-model="plan.question" @change="saveLocally(plan)"></textarea>

                        <!--References-->
                        <!--
						<label for="references">Main references</label>
						<textarea class="textarea" id="references" name="references" rows="3" v-model="plan.references" @change="saveLocally(plan)"></textarea>
                        -->
                        <!--Research design-->
						<label for="methodology" title="What is your research design or strategy (choose one from the list)?">Methodology</label>
                        <select name="methodology" id="methodology" class="textarea" v-model="plan.methodology" @change="saveLocally(plan)">
                            <option v-for="methodo in methodologies" :key="methodo.value" v-bind:value="methodo.value"> {{methodo.name}} </option>
                        </select>

                        <!--Data collection, development or analyse methods-->
						<label for="method" title="What methods and instruments do you use for collecting data or creating the design (choose at least one from the list)?">Methods</label>
                        <select name="method" id="method" class="textarea" v-model="plan.method" @change="saveLocally(plan)" multiple>
                            <option v-for="metho in methods" :key="metho.value" v-bind:value="metho.value"> {{metho.name}} </option>
                        </select>
					</div>

					<!--submit/button-->
					<button type="button" class="button-form" v-on:click="captcha(captchaKey, createDoc, plan, methodologies, methods)">
						Save as PDF
					</button>
                    <button type="button" class="button-form" v-on:click="captcha(captchaKey, createDoc, plan, methodologies, methods)">
						Send to Supervisor
					</button>
                    <!--submit/button-->
					<button type="reset" class="button-form">
						Reset
					</button>
				</div>

				<div class="thankyou_message" style="display: none;">
					<p style="font-size: 1.1em; text-align: center;">- <strong><em>Thank you</em> for your input!</strong> - <br> We will make sure to add it to the database.</p>
				</div>

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
		margin-top: 24px;
		cursor: pointer;
	}

	.button-success:hover {
		color: rgba(0,237,255, 0.9);
		border: 1px solid rgba(0,237,255, 0.9);
        margin-top: 24px;
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
        color: black;
        max-width:700px;
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
    import DataBaseMenu from '@/Layouts/DataBaseMenu.vue';
    import pdfMake from 'pdfmake/build/pdfmake';
    import pdfFonts from 'pdfmake/build/vfs_fonts';



    export default {
        components: {
            AppLayout,
            TopicBlock,
            DataBaseMenu,
            pdfMake,
        },
        inject: ['captchaKey'],
        data() {
            return {
                plan: {
                    //name is honey pot
                    name: '',
                    title: '',
                    author: '',
                    authorEmail: '',
                    supervisor: '',
                    supervisorEmail: '',
                    problem: '',
                    objective: '',
                    question: '',
                    methodology: '',
                    method: [],
                },
                methodologies: [
                    { name: 'Meta Study', value: 'MetaStudy' },
                    { name: 'Experiment', value: 'Experiment' },
                    { name: 'Survey', value: 'Survey' },
                    { name: 'Case Study', value: 'CaseStudy' },
                    { name: 'Narrative Study', value: 'NarrativeStudy' },
                    { name: 'Ethnographic Study', value: 'EthnographicStudy' },
                    { name: 'Phenomenological Study', value: 'PhenomenologicalStudy' },
                    { name: 'Discursive study', value: 'DiscursiveStudy' },
                    { name: 'Hermeneutic Study', value: 'HermeneuticStudy' },
                    { name: 'Historical study', value: 'HistoricalStudy' },
                    { name: 'Grounded Theory', value: 'GroundedTheory' },
                    { name: 'Action Research', value: 'ActionResearch' },
                    { name: 'Participatory Research', value: 'ParticipatoryResearch' },
                    { name: 'Design-Based Research', value: 'DesignBasedResearch' },
                    { name: 'Research by Design', value: 'ResearchByDesign' },
                    { name: 'Design Science Research', value: 'DesignScienceResearch' },
                    { name: 'Design Thinking', value: 'DesignThinking' },
                    { name: 'Evaluation Study', value: 'EvaluationStudy' },
                ],
                methods: [
                    { name: 'Test', value: 'Test' },
                    { name: 'Questionnaire', value: 'Questionnaire' },
                    { name: 'Structured interview', value: 'StructuredInterview' },
                    { name: 'Semi-structured interview', value: 'SemiStructuredInterview' },
                    { name: 'Unstructured interview', value: 'UnstructuredInterview' },
                    { name: 'Focus group interview', value: 'FocusGroupInterview' },
                    { name: 'Document study', value: 'DocumentStudy' },
                    { name: 'Observation', value: 'Observation' },
                    { name: 'Participant observation', value: 'ParticipantObservation' },
                    { name: 'Stimulated recall', value: 'StimulatedRecall' },
                    { name: 'Biometric research', value: 'BiometricResearch' },
                    { name: 'Netnography', value: 'Netnography' },
                    { name: 'Journaling', value: 'Journaling' },
                    { name: 'Implicit methods', value: 'ImplicitMethods' },
                    { name: 'Records of behaviour', value: 'RecordsOfBehaviour' },
                    { name: 'Logfiles', value: 'Logfiles' },
                    { name: 'Stories', value: 'Stories' },
                    { name: 'Ideation', value: 'Ideation' },
                    { name: 'Persona', value: 'Persona' },
                    { name: 'Storyboarding', value: 'Storyboarding' },
                    { name: 'Participatory design', value: 'ParticipatoryDesign' },
                    { name: 'Card sorting', value: 'CardSorting' },
                    { name: 'Prototyping', value: 'Prototyping' },
                    { name: 'Walkthrough', value: 'Walkthrough' },
                ],
            }
        },
        created() {
            pdfMake.vfs = pdfFonts.pdfMake.vfs
        },
        mounted() {
            this.plan.title = window.localStorage.getItem('plan-title')
            this.plan.author = window.localStorage.getItem('plan-author')
            this.plan.authorEmail = window.localStorage.getItem('plan-author-email')
            this.plan.supervisor = window.localStorage.getItem('plan-supervisor')
            this.plan.supervisorEmail = window.localStorage.getItem('plan-supervisor-email')
            this.plan.problem = window.localStorage.getItem('plan-problem')
            this.plan.objective = window.localStorage.getItem('plan-objective')
            this.plan.question = window.localStorage.getItem('plan-question')
            //this.plan.reference = window.localStorage.getItem('plan-reference')
            this.plan.methodology = window.localStorage.getItem('plan-methodology')
            this.plan.method = JSON.parse(window.localStorage.getItem('plan-method'))
        },
        unmounted() {
            this.saveLocally(this.plan);
        },
        methods: {
            captcha: (captchaKey, createDoc, plan, methodologies, methods) => {
                if (!plan.name){
                    grecaptcha.ready(function() {
                        grecaptcha.execute(captchaKey, {action: 'submit'}).then(function(token) {
                            // Add your logic to submit to your backend server here.
                            createDoc(plan, methodologies, methods)
                        });
                    });
                }
            },
            createDoc: (plan, methodologies, methods) => {
                const dd = {
                    content: [
                        { text: plan.title, style: 'header' },
                        //{ text: 'Main references', style: 'subheader' },
                        //{ text: plan.reference, style: 'normal' },
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
                let author = ``
                if (plan.author) {
                    author = `Author: ${plan.author}`
                    if (plan.authorEmail)
                        author += ` ( ${plan.authorEmail} )`;
                    dd.content.push({ text: author, style: 'normal' },)
                }
                let supervisor = ``
                if (plan.supervisor) {
                    supervisor = `Supervisor: ${plan.supervisor}`
                    if (plan.supervisorEmail)
                        supervisor += ` ( ${plan.supervisorEmail} )`;
                    dd.content.push({ text: supervisor, style: 'normal' },)
                }
                if (plan.problem) {
                    dd.content.push({ text: 'Problem', style: 'subheader' })
                    dd.content.push({ text: plan.problem, style: 'normal' })
                }
                if (plan.objective) {
                    dd.content.push({ text: 'Objective', style: 'subheader' })
                    dd.content.push({ text: plan.objective, style: 'normal' })
                }
                if (plan.question) {
                    dd.content.push({ text: 'Research Questions', style: 'subheader' })
                    dd.content.push({ text: plan.question, style: 'normal' })
                }
                if (plan.methodology) {
                    const methodo = methodologies.find(element => element.value == plan.methodology).name
                    //dd.content.push({ text: 'Methodology', style: 'subheader' })
                    dd.content.push({ text: methodo, style: 'subheader' })
                }
                if (plan.method) {
                    const meths = []
                    for (const iterator of plan.method) {
                        meths.push(methods.find(element => element.value == iterator).name)
                    }
                    if(!plan.methodology)
                        dd.content.push({ text: 'Methods', style: 'subheader' });
                    dd.content.push({ ul: meths, style: 'normal' })
                }

                pdfMake.createPdf(dd).download('ResearchPlan.pdf')

            },
            saveLocally: (plan) => {
                window.localStorage.setItem('plan-title', plan.title)
                window.localStorage.setItem('plan-author', plan.author)
                window.localStorage.setItem('plan-author-email', plan.authorEmail)
                window.localStorage.setItem('plan-supervisor', plan.supervisor)
                window.localStorage.setItem('plan-supervisor-email', plan.supervisorEmail)
                window.localStorage.setItem('plan-problem', plan.problem)
                window.localStorage.setItem('plan-objective', plan.objective)
                window.localStorage.setItem('plan-question', plan.question)
                //window.localStorage.setItem('plan-reference', plan.reference)
                window.localStorage.setItem('plan-methodology', plan.methodology)
                window.localStorage.setItem('plan-method', JSON.stringify(plan.method))
            },
            onReset: (plan) => {
                    plan.title = ''
                    plan.author = ''
                    plan.authorEmail = ''
                    plan.supervisor = ''
                    plan.supervisorEmail = ''
                    plan.problem = ''
                    plan.objective = ''
                    plan.question = ''
                    //plan.reference = ''
                    plan.methodology = ''
                    plan.method = []
                    window.localStorage.clear()
            }
        }
    }
</script>
