<template>
    <app-layout imgPath="assets/">
        <div class="videoSizer">
            <div class="videoContainer">
                <iframe src="https://www.youtube.com/embed/mJyjHbCvV3A" width="100%" height="100%" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <text-block blockTitle="Info" blockContent1="Methodyca is a browser-based point & click adventure game whose aim is to introduce the field of research methods. Learn what happened to your thesis supervisor by diving into the fantastic realm of Methodyca and help its inhabitants through a multitude of mini-games." blockContent2="The game was designed and developed by students of Digital Learning Games at Tallinn University with the support of HITSA IT Akadeemia." linkHref="#/about" linkText="Learn more about us."/>
        <slider />
    </app-layout>
</template>

<style scoped>
	.videoSizer {
		width: 60%;
		margin-right: auto;
		margin-left: auto;
	}

	.videoContainer {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	height: 0;
	box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
	}

	.videoContainer iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}

	@media screen and (max-width: 990px) {
		.videoSizer {
			 width: 90%;
		}
	}
</style>

<script>
    import AppLayout from '@/Layouts/AppLayout'
	import Slider from "@/Layouts/Slider.vue";
	import TextBlock from '@/Layouts/TextBlock';

	export default {
		name:"home",
		components: {
            AppLayout,
			TextBlock,
			Slider
		}
	}
</script>

