<template>
    <admin-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Topics
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="topic in topics" :key="topic.id"  class="bg-white overflow-hidden shadow-xl">
                   <edit-topic-block/>
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
