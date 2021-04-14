<template>
	<div class="menu">
		<nav id="nav">
            <template v-if="isIsolated">
                <a :href="route('home')" class="button-link">Home</a>
                <inertia-link :href="route('game')" class="button-link">Game</inertia-link>
                <inertia-link :href="route('mini-games')" class="button-link">Mini-Games</inertia-link>
                <inertia-link :href="route('publication')" class="button-link">Publication</inertia-link>
                <a :href="route('find-topic')" class="button-link">Database</a>
                <inertia-link :href="route('about')" class="button-link">About Us</inertia-link>
            </template>
            <template v-else>
                <inertia-link :href="route('home')" class="button-link">Home</inertia-link>
                <a :href="route('game')" class="button-link">Game</a>
                <a :href="route('mini-games')" class="button-link">Mini-Games</a>
                <a :href="route('publication')" class="button-link">Publication</a>
                <inertia-link :href="route('find-topic')" class="button-link">Database</inertia-link>
                <a :href="route('about')" class="button-link">About Us</a>
            </template>
        </nav>
	</div>
</template>

<style scoped>
	.menu {
		/*-webkit-transform: translateY(20%);*/
		width: 100%;
		color: #fefefe;
		position: relative;
		text-align: center;
		padding: 0px;
	}

	img {
		max-width: 50%;
		left: 50%;
		width: auto;
		height: auto;
	}

	#nav {
		padding: 10px;
	}

	#nav a {
		font-family: "GoldenDragon";
		/* font-weight: bold; */
		text-shadow: 3px 3px 3px rgba(61, 75, 88, 0.8);
		font-size: 2.2vw;
		color: #fefefe;
		/*color: #3d4b58; --> dark blue*/
		/*color: #a20099; --> deep purple*/
		/*color: #2c3e50; --> dark grey green colour*/
		margin: 15px;
		padding: 6px;
		text-decoration: none;
	}

	#nav a:active {
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
    .button-link {
        transition: 0.7s ease;
    }
    .button-link:hover {
		color: rgba(0,237,255, 0.9) !important;
		/*border: 1px solid rgba(0,237,255, 0.9);*/
	}

	@media screen and (max-width: 990px) {
		#nav {
			padding-left: 0;
			padding-right: 0;
		}

		#nav a {
			font-size: 2.7vw;
			margin: 3px;
		}
	}

	@keyframes glow {
		from {
			text-shadow: 0 0 2px #fff, 0 0 4px #fff, 0 0 6px #e60073, 0 0 8px #e60073, 0 0 10px #e60073, 0 0 12px #e60073, 0 0 14px #e60073;
		}
		to {
			text-shadow: 0 0 2px #fff, 0 0 4px #ff4da6, 0 0 6px #ff4da6, 0 0 8px #ff4da6, 0 0 10px #ff4da6, 0 0 12px #ff4da6, 0 0 14px #ff4da6;
		}
	}

</style>

<script>
	export default {
		name: "main-menu",
        computed: {
            isIsolated() {
               return window.location.pathname !== '' && window.location.pathname !== '/' && !window.location.pathname.includes('database')
            }
        },
	}
</script>

