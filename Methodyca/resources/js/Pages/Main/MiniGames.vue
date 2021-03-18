<template>
	<app-layout imgPath="assets/">
		<div class="flex-container">
			<mini-game-block picture_src="QuestioniserThumbnail2.png" pic_title="Questioniser" pic_desc="A dating sim mixed with a card game for learning about questionnaires as a data collection method." minigameHref="mg-questioniser"></mini-game-block>
			<mini-game-block picture_src="ObservationThumbnail.png" pic_title="Binoculars" pic_desc="Observe a park and its people to improve its layout." minigameHref="mg-binoculars"></mini-game-block>
			<mini-game-block picture_src="Interview1Thumbnail.png" pic_title="Interview Simulator" pic_desc="Learn how to conduct an interview through this simulator." minigameHref="mg-interview-sim"></mini-game-block>
			<mini-game-block picture_src="thumbnailPLsquare.png" pic_title="Participatory Loop" pic_desc="Design a promotion campaign for a time-travel machine by involving stakeholders and meet their needs." minigameHref="mg-participatory-loop"></mini-game-block>
			<mini-game-block picture_src="DataChargerThumbnail.png" pic_title="DataCharger" pic_desc="Decide whether it's qualitative or quantitative and dump it in the right box." minigameHref="mg-data-charger"></mini-game-block>
			<mini-game-block picture_src="thumbnailJammr.png" pic_title="Jammr" pic_desc="Collect data from a Game Jam forum and create a text corpus for an article about the event." minigameHref="mg-jammr"></mini-game-block>
		</div>
  </app-layout>
</template>

<script>
	import MiniGameBlock from '@/Layouts/MiniGameBlock';
    import AppLayout from '@/Layouts/AppLayout.vue';

	export default {
		name:"mini-games",
		components: {
			MiniGameBlock,
            AppLayout
		}
	}
</script>

<style scoped>
	.flex-container {
		display: grid;
		grid-template-columns: 28% 28% 28%;
		grid-gap: 5%;
		justify-items: center;
		align-items: center;
		margin-left: 6%;
		margin-bottom: 70px;
	}

	.disabledGray {
		opacity: 0.6; /* Real browsers */
        filter: alpha(opacity = 60); /* MSIE */
	}

	@media screen and (max-width: 990px){
		.flex-container {
			display: block;
			justify-items: center;
			align-items: center;
			margin-left: auto;
		}
	}
</style>

