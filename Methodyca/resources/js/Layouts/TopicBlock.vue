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
            <div class="bg-gray-500 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                Popularity
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                {{ topicPopularity }}
                </dd>
            </div>
            <div class="bg-gray-600 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                Created
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                {{ topicCreated_at }}
                </dd>
            </div>
            <div class="bg-gray-500 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                Expire
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                {{ topicExpire }}
                </dd>
            </div>
            <div class="bg-gray-600 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-base font-medium text-white">
                If interested You can contact supervisor of this topic by email.
                </dt>
                <dd class="mt-1 text-base text-white sm:mt-0 sm:col-span-2">
                <input type="email" placeholder="Your email"
            autocomplete="search" class="mb-4 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md text-black box-border" />
                <button>Send</button>
                </dd>
            </div>
            </dl>
        </div>
    </details>
</template>

<style scoped>
</style>

<script>
	export default {
		name: "topic-block",
		props: ['topicTitle', 'topicDescription', 'topicKeywords', 'topicPopularity', 'topicCreated_at', 'topicExpire']
	}
</script>

