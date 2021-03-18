<template>
	<div class="teamMblock">
		<img :src="`assets/${ imageName }`" alt="profile pic" class="ppTeam">
		<div class="inside">
			<p><em>{{ teamMName }}</em></p>
			<p>{{ teamMRole }}</p>
		</div>
	</div>
</template>

<style scoped>
	.teamMblock {
		color: #fefefe;
		/* border: 1px solid #fefefe; */
		position: relative;
		/* margin-top: 10px; */
		margin-bottom: 10px;
		/* margin-left: 50px; */
		padding: 10px;
		/* overflow: hidden; */
		font-family: Raleway;
		font-size: 18px;
		font-style: normal;
	}

	.teamMblock em {
		font-size: 18px;
		font-weight: bold;
		font-style: normal;
	}
	.inside {
		position: relative;
		text-align: center;
	}

	img {
		position: relative;
		left: 50%;
		-ms-transform: translateX(-50%);
		transform: translateX(-50%);
		border-radius: 50%;
		width: 5vw;
	}

	@media screen and (max-width: 990px) {
		img {
			width: 10vw;
		}
	}
</style>

<script>
	export default {
		name: "team-block",
		props: ['teamMName', 'teamMRole', 'imageName']
	}
</script>


