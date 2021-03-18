<template>
    <app-layout imgPath="assets/">
        <publication-block pubTitle="Methodyca - A Digital Game to Teach Research Methods" pubAuthor="Mikhail Fiadotau et al." pubPublisher="NordiCHI '20: Proceedings of the 11th Nordic Conference on Human-Computer Interaction: Shaping Experiences, Shaping Society" pubData="Tallinn, Estonia, October 2020" pubAbstract="Methodyca is a browser-based adventure game whose aim is to introduce the field of research methods to university students, particularly targeting those in game design programs. Developed by faculty and graduate students at Tallinn University, with input from partner institutions in and outside of Estonia, the game seeks to increase players’ motivation and competences with regard to research methods, as well as to map out possible research topics and prospective supervisors in the fields of game design and game studies. In doing so, the game addresses the scarcity of learning resources available to students in games education. The main content of the game, however, is equally useful to students in non-game-related curricula, as the focus is on general quantitative, qualitative, and design-based methods common in the social sciences, including in HCI programs." linkHref="./NORDICHI20.pdf" linkText="Download full PDF here."/>
        <!--<PublicationBlock pubTitle="title" pubAuthor="author" pubPublisher="publisher" pubData="Location & date" pubAbstract="abstract/content" linkHref="./nameOfThePDFToDownload.pdf" linkText="Download full PDF here."/>-->
    </app-layout>
</template>

<style scoped>

</style>

<script>
	import PublicationBlock from '@/Layouts/PublicationBlock';
    import AppLayout from '@/Layouts/AppLayout.vue';

	export default {
		name:"publication",
		components: {
			PublicationBlock,
            AppLayout
		}
	}
</script>


