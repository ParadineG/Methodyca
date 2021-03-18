<template>
	<header class="header" v-if="show">
		<img :src="`${ imgPath }LogoDraft02.png`" />
		<main-menu v-if="showNav"/>
		<div class="spacer" v-else></div>
	</header>
</template>

<style scoped>
	.header {
		width: 100%;
		color: #fefefe;
		text-align: center;
		padding: 10px;
		margin-top: 1%;
		position: relative;
		z-index: 200;
	}

	.header a {
		padding-right: 5px;
	}

	.spacer {
		width: 100%;
		margin-bottom: 2vh;
	}

	img {
		max-width: 50%;
		left: 50%;
		width: auto;
		height: auto;
		margin: 5px auto;
	}

	@media screen and (max-width: 990px) {
		img {
			max-width: 90%;
		}
	}
</style>

<script>
    import MainMenu from "@/Layouts/MainMenu"

    export default {
        name: "main-header",
        props: [
            "imgPath",
        ],
        components: {
            MainMenu,
        },
        data: function () {
            return {
                showNav: true
            }
        },
        computed: {
            show () {
                return location.pathname !== '/select';
            }
        },
        watch: {
            $route: function() {
                // Check if given route is true, if it is then hide Nav.
                if (location.pathname.match(/^\/mini-games\/.*$/)) {
                        this.showNav = false
                } else  {
                        this.showNav = true
                }
        }
        },
    }
</script>
