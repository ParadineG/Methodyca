<template>
    <app-layout imgPath="../assets/">
        <div class="textblock">
            <data-base-menu/>
            <br>
            <p><strong>This is a database of research topics and supervisors for game-related studies.</strong></p>
            <p>Find Topic is a section for students who are searching for topics for their final thesis. (Here students can select an existing topic for their research plan.)</p>
            <br>
            <input type="search" placeholder="Search by topic or description or keyword" v-model="filter"
            autocomplete="search" class="mb-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-black box-border" />
            <div v-for="topic in filteredTopics" :key="topic.id"  class="topics bg-gray-700 overflow-hidden shadow-xl">
                <!-- <topic-block topic=topic.title /> -->
                <topic-block :topicTitle="topic.title" :topicDescription="topic.description" :topicKeywords="topic.keywords" :topicPopularity="topic.popularity" :topicCreated_at="topic.created_at" :topicExpire="topic.expire" :topicId="topic.id" v-on:click="addToPlan"/>
            </div>
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
    import DataBaseMenu from '@/Layouts/DataBaseMenu.vue';

    export default {
        components: {
            AppLayout,
            TopicBlock,
            DataBaseMenu,
        },
        data() {
            return {
                filter: '',
                topics: []
            }
        },
        computed: {
            filteredTopics() {
                return this.topics.filter((topic, index, array) => {
                    const title = topic.title.toLowerCase();
                    let description = '';
                    if(topic.description)
                        description = topic.description.toLowerCase();
                    let keywords = '';
                    if(topic.keywords)
                       keywords = topic.keywords.toLowerCase();
                    const searchTerm = this.filter.toLowerCase();
                    let expired = false;
                    const createdAt = new Date(topic.created_at)
                    array[index].created_at = createdAt.toDateString()
                    if(topic.expire) {
                        const expire = new Date(topic.expire)
                        array[index].expire = expire.toDateString()
                        const now = new Date()
                        expired = expire >= now
                    }
                    return !expired &&
                        topic.visibility &&
                        (title.includes(searchTerm) ||
                        description.includes(searchTerm) ||
                        keywords.includes(searchTerm));
                });
            }
        },
        methods: {
            getTopics() {
                axios.get('../api/topics')
                .then((res)  => {
                    this.topics = res.data;
                }).catch((err)  => {
                    console.log(err);
                });
            },
            addToPlan(event, topic) {
                if (event.target.tagName === "BUTTON") {
                    const _topic = this.topics.find(topic => topic.id === parseInt(event.target.getAttribute('data')));
                    window.localStorage.setItem('plan-title', _topic.title);
                    window.localStorage.setItem('plan-supervisor',  decodeURIComponent(atob(_topic.name)));
                    if( _topic.agreement)
                        window.localStorage.setItem('plan-supervisor-email',  decodeURIComponent(atob(_topic.email)));
                }
            },
        },
        created() {
            this.getTopics();
        },

    }
</script>
