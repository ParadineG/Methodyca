<template>
	<div class="pubblock">
		<h1>{{ pubTitle }}</h1>
		<div class="metaData">
			<p id="author">{{ pubAuthor }}</p>
			<p id="publisher">{{ pubPublisher }}</p>
			<p>{{ pubData }}</p>
		</div>
		<br>
		<p>{{ pubAbstract }}</p>
		<br>
		<a :href="linkHref" download>{{ linkText }}</a>
	</div>
</template>

<style scoped>
	.pubblock {
		color: #fefefe;
		background-color: rgba(61, 75, 88, 0.8);
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		position: relative;
		left: 20%;
		width: 60%;
		margin-top: 10px;
		margin-bottom: 10px;
		padding: 20px;
		padding-top: 15px;
		padding-bottom: 10px;
		overflow: hidden;
	}

	@media screen and (max-width: 990px) {
		.pubblock {
			color: #fefefe;
			background-color: rgba(61, 75, 88, 0.8);
			box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
			position: relative;
			left: 5%;
			width: 90%;
			margin-top: 10px;
			margin-bottom: 10px;
			padding: 20px;
			padding-top: 15px;
			padding-bottom: 10px;
			overflow: hidden;
		}
	}

	.pubblock a:link {
		color: #00edff;
		/* color: #f885f7; */
		font-weight: bold;
		background-color: transparent;
		text-decoration: none;
	}
	.pubblock a:visited {
		color: #b300b3;
		background-color: transparent;
		text-decoration: none;
	}
	.pubblock a:hover {
		color: #ffc1fe;
		background-color: transparent;
		text-decoration: none;
	}

	.metaData {
		font-size: 0.95em;
	}

	#author {
		font-weight: bold;
		/*font-family: "DaisyWheel";
		font-size: 1.3em;*/
	}

	#publisher {
		font-style: italic;
	}
</style>

<script>
	export default {
		name: "publication-block",
		props: {
			pubTitle: {
				type: String,
				required: true
			},
			pubAuthor: {
				type: String,
				required: true
			},
			pubPublisher: {
				type: String,
				required: false
			},
			pubData: {
				type: String,
				required: true
			},
			pubAbstract: {
				type: String,
				required: true
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
