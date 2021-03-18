<template>
	<section class="textblock">
		<h1>{{ blockTitle }}</h1>
		<p>{{ blockContent1 }}</p>
		<p><br>{{ blockContent2 }}</p>
		<a :href="linkHref">{{ linkText }}</a>
	</section>
</template>

<style scoped>
	.textblock {
		color: #fefefe;
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		background-color: rgba(61, 75, 88, 0.8);
		position: relative;
		left: 20%;
		width: 60%;
		margin-top: 10px;
		margin-bottom: 10px;
		padding: 20px;
		padding-top: 15px;
		overflow: hidden;
	}

	@media screen and (max-width: 990px) {
		.textblock {
			color: #fefefe;
			box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
			background-color: rgba(61, 75, 88, 0.8);
			position: relative;
			left: 5%;
			width: 90%;
			margin-top: 10px;
			padding-top: 15px;
			overflow: hidden;
		}
	}

	.textblock a:link {
		/* color: #ff00ff; */
		color: #00edff;
		font-weight: bold;
		background-color: transparent;
		text-decoration: none;
	}
	.textblock a:visited {
		color: #00edff;
		/* color: #b300b3; */
		background-color: transparent;
		text-decoration: none;
	}
	.textblock a:hover {
		color: #ffc1fe;
		background-color: transparent;
		text-decoration: none;
	}
</style>

<script>
	export default {
		name: "text-block",
		props: {
			blockTitle: {
				type: String,
				required: true
			},
			blockContent1: {
				type: String,
				required: true
			},
			blockContent2: {
				type: String,
				required: false
			},
			linkHref: {
				type:String,
				required: false
			},
			linkText: {
				type:String,
				required: false
			}
		}
	}
</script>


