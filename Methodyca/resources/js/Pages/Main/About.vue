<template>
    <app-layout imgPath="assets/">
        <section class="teamMembers">
            <h1>The Team</h1>
            <div class="flex-containerTM">
                <team-block teamMName="Martin Sillaots" teamMRole="Project Manager" imageName="MartinS.png"/>

                <team-block teamMName="Mikhail Fiadotau" teamMRole="Narrative Designer" imageName="MikhailS.png"/>
                <team-block teamMName="Peadar Callaghan" teamMRole="Narrative Designer" imageName="PeadarS.jpg"/>
                <team-block teamMName="David Upshall" teamMRole="Game Designer" imageName="DavidS.png"/>
                <team-block teamMName="Kaisa Norak" teamMRole="Game Designer" imageName="KaisaS.png"/>
                <team-block teamMName="Oluwafiyikewa Alawode" teamMRole="Sound Designer" imageName="KewaS.png"/>
                <team-block teamMName="Ralph Söthe-Garnier" teamMRole="Web Designer" imageName="RalphS.png"/>
                <team-block teamMName="Anni Hõ" teamMRole="Game Artist" imageName="AnniS2.png"/>
                <team-block teamMName="Elena Gorshkova" teamMRole="Game Artist" imageName="ElenaS.png"/>
                <team-block teamMName="Iryna Selina" teamMRole="Game Artist" imageName="IrynaS.png"/>
                <team-block teamMName="Ahmed ElShenawy" teamMRole="Developer" imageName="AhmedS.png"/>
                <team-block teamMName="Roman Gorislavski" teamMRole="Developer" imageName="RomanS.png"/>
                <team-block teamMName="Sinan Emiroğlu" teamMRole="Developer" imageName="SinanS.png"/>
            </div>
        </section>
        <section class="sponsorMembers">
            <h1>The Sponsors</h1>
            <sponsor-block sponsorName="HITSA IT Akadeemia" sponsorDesc="IT Akadeemia is a co-operation program between the Estonian state, universities and companies in the ICT (information and communication technology) sector that aims at increasing the quality and competitiveness of the ICT higher education." sponsorImage="ITAkadeemiaWhite.png" linkHref="https://www.hitsa.ee/ikt-haridus/ita"/>
            <sponsor-block sponsorName="Tallinn University" sponsorDesc="Tallinn University is the largest university of humanities in Tallinn and the third biggest public university in Estonia. It has five interdisciplinary focus fields, namely educational innovation, digital and media culture, cultural competences, healthy and sustainable lifestyle and society and open governance." sponsorImage="tlu.png" linkHref="https://www.tlu.ee/en"/>
            <sponsor-block sponsorName="Digital Learning Games" sponsorDesc="Digital Learning Games is a 2 year international postgraduate programme at Tallinn University that aims at bringing together people with different backgrounds to learn from each other and create games in teams." sponsorImage="dlg3S.png" linkHref="http://dlg.tlu.ee"/>
        </section>
    </app-layout>
</template>

<style scoped>
	.teamMembers {
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		background-color: rgba(61, 75, 88, 0.8);
		position: relative;
		left: 20%;
		width: 60%;
		padding: 10px;
	}

	.teamMembers h1 {
		color: #fefefe;
		padding-bottom: 10px;
		padding-left: 10px;
		padding-top: 5px;
		/* font-size: 2.4em; */
	}

	.flex-containerTM {
		display: grid;
		grid-template-columns: 25% 25% 25%;
		/* grid-template-rows: 10% 10% 20% 20%; */
		grid-gap: 7%;
		grid-row-gap: 1em;
		justify-items: center;
		align-items: normal;
		margin-left: 9%;
		margin-bottom: 25px;
	}

    .flex-containerTM > :first-child {
        grid-column: 1/4;
    }

	.sponsorMembers {
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		background-color: rgba(61, 75, 88, 0.8);
		position: relative;
		/* left: 8%; */
		/* width: 84%; */
		left: 20%;
		width: 60%;
		padding: 10px;
		padding-left: 20px;
		padding-bottom: 25px;
		margin-top: 15px;
		margin-bottom: 30px;
	}

	.sponsorMembers h1{
		color: #fefefe;
		/* font-size: 2.4em; */
	}

	@media screen and (max-width: 990px) {
		.teamMembers, .sponsorMembers {
			left: 5%;
			width: 90%;
		}
	}
</style>

<script>
    import AppLayout from '@/Layouts/AppLayout';
	import TeamBlock from '@/Layouts/TeamBlock';
    import SponsorBlock from '@/Layouts/SponsorBlock';

	export default {
		name:"about",
		components: {
            AppLayout,
			TeamBlock,
			SponsorBlock
		}
	}
</script>

