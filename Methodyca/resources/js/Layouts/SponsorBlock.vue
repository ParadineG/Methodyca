<template>
	<div class="sponsorsBlock">
		<img :src="`assets/${ sponsorImage }`" alt="sponsor logo">
		<div style="justify-self: left;">
			<p><em>{{ sponsorName }}</em></p>
			<p>{{ sponsorDesc }}</p>
			<a :href="linkHref" target="_blank">More about {{ sponsorName }}.</a>
		</div>
	</div>
</template>

<style scoped>
	.sponsorsBlock {
		display: grid;
		color: #fefefe;
		grid-template-columns: 30% 70%;
		/* grid-template-rows: 10% 10% 20% 20%; */
		/* grid-gap: 5%; */
		grid-row-gap: 1em;
		justify-items: center;
		align-items: center;
		padding: 20px;
	}

	.sponsorsBlock img {
		max-width: 70%;
	}

	.sponsorsBlock em {
		font-size: 18px;
		font-weight: bold;
		font-style: normal;
	}

	.sponsorsBlock a:link {
		/* color: #ff00ff; */
		color: #00edff;
		font-weight: bold;
		background-color: transparent;
		text-decoration: none;
	}
	.sponsorsBlock a:visited {
		color: #00edff;
		/* color: #b300b3; */
		background-color: transparent;
		text-decoration: none;
	}
	.sponsorsBlock a:hover {
		color: #ffc1fe;
		background-color: transparent;
		text-decoration: none;
	}

	@media screen and (max-width: 990px) {
		.sponsorsBlock {
			display: block;
			padding-bottom: 3%;
		}

		.sponsorsBlock img {
			max-width: 50%;
			margin-left: 50%;
			transform: translateX(-50%);
		}
	}
</style>

<script>
	export default {
		name: "sponsor-block",
		props: ['sponsorName', 'sponsorDesc', 'sponsorImage', 'linkHref']
	}
</script>

