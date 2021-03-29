<template>
    <app-layout imgPath="../assets/">
        <div class="textblock">
            <h1 class="navi">
                <inertia-link :href="route('find-topic')">Find topic</inertia-link>
                <inertia-link :href="route('add-topic')">Add topic</inertia-link>
            </h1>
            <br>
            <p><strong>This page will later on host a database of research topics as well as listing supervisors.</strong></p>
            <p>Meanwhile you can gladly submit an idea for a future research topic that you would like to see in this future database.</p>
            <br>
            <input type="search" placeholder="Search by topic or description or keyword" v-model="filter"
            autocomplete="search" class="mb-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-black box-border" />
            <div v-for="topic in filteredTopics" :key="topic.id"  class="topics bg-gray-700 overflow-hidden shadow-xl">
                <!-- <topic-block topic=topic.title /> -->
                <topic-block :topicTitle="topic.title" :topicDescription="topic.description" :topicKeywords="topic.keywords" :topicPopularity="topic.popularity" :topicCreated_at="topic.created_at" :topicExpire="topic.expire"/>
            </div>
        </div>
    </app-layout>
</template>

<style scoped>

    .navi {
		padding: 10px;
	}

	.navi a {
		font-family: "GoldenDragon";
		/* font-weight: bold; */
		text-shadow: 3px 3px 3px rgba(61, 75, 88, 0.8);
		font-size: 1.8vw;
		color: #fefefe;
		/*color: #3d4b58; --> dark blue*/
		/*color: #a20099; --> deep purple*/
		/*color: #2c3e50; --> dark grey green colour*/
		margin: 15px;
		padding: 6px;
		text-decoration: none;
	}

	.navi a.router-link-active {
		/*font-size: 1.8em;*/
		/*border: 1px solid #f300cb;*/
		color: #00edff; /*--> bright blue*/
		/*color: #f885f7; --> dull purple */
		/*color: #ff00ff; --> bright purple*/
		/*color: #42b983; --> green colour*/
		/*color: #3d4b58; --> dark dark blue*/
		/*-webkit-animation: glow 1s ease-in-out infinite alternate;
		-moz-animation: glow 1s ease-in-out infinite alternate;
		animation: glow 4s ease-in-out infinite alternate;*/
	}

	@media screen and (max-width: 990px) {
		.nav {
			padding-left: 0;
			padding-right: 0;
		}

		.nav a {
			font-size: 2.7vw;
			margin: 3px;
		}
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

	.textblock .topics a:link {
		/* color: #ff00ff; */
		color: #00edff;
		font-weight: bold;
		background-color: transparent;
		text-decoration: none;
	}
	.textblock .topics a:visited {
		color: #00edff;
	    /* color: #b300b3; */
		background-color: transparent;
		text-decoration: none;
	}
	.textblock .topics a:hover {
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

<script>
    import AppLayout from '@/Layouts/AppLayout';
	import TopicBlock from '@/Layouts/TopicBlock'

    export default {
        components: {
            AppLayout,
            TopicBlock,
        },
        data() {
            return {
                filter: '',
                topics: []
            }
        },
        computed: {
            filteredTopics() {
                return this.topics.filter(topic => {
                const title = topic.title.toString().toLowerCase();
                const description = topic.description.toLowerCase();
                const keywords = topic.keywords.toLowerCase();
                const searchTerm = this.filter.toLowerCase();

                return title.includes(searchTerm) ||
                    description.includes(searchTerm) ||
                    keywords.includes(searchTerm);
                });
            }
        },
        methods: {
            getTopics() {
                axios.get('../api/topics')
                .then((res)  => {
                    this.topics = res.data;
                    console.log(this.topics);
                }).catch((err)  => {
                    console.log(err);
                });
            }
        },
        created() {
            this.getTopics();
        }
    }
</script>
