<template>
    <admin-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Topics
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="topic in allTopics" :key="topic.id"  class="bg-white overflow-hidden shadow-xl">
                   <edit-topic-block :topicTitle="topic.title" :topicDescription="topic.description" :topicName="topic.name" :topicEmail="topic.email" :topicKeywords="topic.keywords" :topicPopularity="topic.popularity" :topicAgreement="topic.agreement" :topicCreated_at="topic.created_at" :topicExpire="topic.expire" :topicVisibility="topic.visibility" :topicId="topic.id" v-on:change="updateVisibility"/>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
    import { Inertia } from '@inertiajs/inertia'
    import AdminLayout from '@/Layouts/AdminLayout'
    import EditTopicBlock from '@/Layouts/EditTopicBlock'

    export default {
        components: {
            AdminLayout,
            EditTopicBlock,
        },
        data() {
            return {
                topics: []
            }
        },
        computed: {
            allTopics() {
                return this.topics.filter((topic, index, array) => {
                    array[index].name = decodeURIComponent(atob(topic.name))
                    array[index].email = decodeURIComponent(atob(topic.email))
                    return true;
                });
            }
        },
        methods: {
            getTopics() {
                axios.get('../api/topics')
                .then((res)  => {
                    this.topics = res.data;
                    //console.log(this.topics);
                }).catch((err)  => {
                    console.log(err);
                });
            },
            updateTopic(id, check) {
                axios.put(`../api/topics/${id}`, {
                    visibility: check
                }).then((res)  => {
                    //console.log(this.res);
                }).catch((err)  => {
                    console.log(err);
                });
            },
            updateVisibility(event, id) {
                if (event.target.getAttribute('type') === "checkbox") {
                    const check = event.target.checked;
                    const id = event.target.getAttribute('data')
                    //console.log(check)
                    this.updateTopic(id, check)
                }
            },

        },
        created() {
            this.getTopics();
        }
    }
</script>
