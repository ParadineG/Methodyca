<template>
	<nav class="navi">
        <inertia-link :href="route('find-topic')" class="button-link">Find topic</inertia-link>
        <inertia-link :href="route('add-topic')" class="button-link">Add topic</inertia-link>
        <inertia-link :href="route('create-plan')" class="button-link">Create plan</inertia-link>
    </nav>
</template>

<style scoped>
    .navi {
		padding: 10px;
	}

	.navi a {
		font-family: "GoldenDragon";
		/* font-weight: bold; */
		text-shadow: 3px 3px 3px rgba(61, 75, 88, 0.8);
		font-size: 1.8vw;
		color: #fefefe;
		/*color: #3d4b58; --> dark blue*/
		/*color: #a20099; --> deep purple*/
		/*color: #2c3e50; --> dark grey green colour*/
		margin: 15px;
		padding: 6px;
		text-decoration: none;
	}

	.navi a.router-link-active {
		/*font-size: 1.8em;*/
		/*border: 1px solid #f300cb;*/
		color: #00edff; /*--> bright blue*/
		/*color: #f885f7; --> dull purple */
		/*color: #ff00ff; --> bright purple*/
		/*color: #42b983; --> green colour*/
		/*color: #3d4b58; --> dark dark blue*/
		/*-webkit-animation: glow 1s ease-in-out infinite alternate;
		-moz-animation: glow 1s ease-in-out infinite alternate;
		animation: glow 4s ease-in-out infinite alternate;*/
	}

	@media screen and (max-width: 990px) {
		.nav {
			padding-left: 0;
			padding-right: 0;
		}

		.nav a {
			font-size: 2.7vw;
			margin: 3px;
		}
	}
    .button-link {
        transition: 0.7s ease;
    }
    .button-link:hover {
		color: rgba(0,237,255, 0.9);
	}
</style>

<script>
	export default {
		name: "data-base-menu",
	}
</script>
