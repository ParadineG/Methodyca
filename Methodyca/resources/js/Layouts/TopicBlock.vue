<template>
<!-- This example requires Tailwind CSS v2.0+ -->
    <details class="bg-gray-700 shadow overflow-hidden focus:bg-red-700 hover:ring-indigo-500 hover:border-indigo-500">
        <summary class="px-4 py-4 sm:px-4 text-lg leading-6 font-medium text-white">
            {{ topicTitle }}
        </summary>
        <div class="border-t border-gray-200">
            <dl>
            <div class="bg-gray-500 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                Description
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                {{ topicDescription }}
                </dd>
            </div>
            <div class="bg-gray-600 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                Keywords
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                {{ topicKeywords }}
                </dd>
            </div>
            <!--<div class="bg-gray-500 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                Popularity
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                {{ topicPopularity }}
                </dd>
            </div>-->
            <div class="bg-gray-500 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                Created
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                {{ topicCreated_at }}
                </dd>
            </div>
            <div class="bg-gray-600 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                Expire
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                {{ topicExpire }}
                </dd>
            </div>
            <div class="bg-gray-500 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                    <button v-bind:data="topicId" class="button-form">Select</button>
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                    If interested You can select this topic for Your Research Plan.
                </dd>
            </div>
            </dl>
        </div>
    </details>
</template>

<style scoped>
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
        margin: 0;
		cursor: pointer;
	}

	.button-form:hover {
		color: rgba(0,237,255, 0.9);
		border: 1px solid rgba(0,237,255, 0.9);
	}
</style>

<script>
	export default {
		name: "topic-block",
		props: ['topicTitle', 'topicDescription', 'topicKeywords', 'topicPopularity', 'topicCreated_at', 'topicExpire', 'topicId'],
	}
</script>

