<template>
	<div>
    <div class="bgImg">
        <img :src="`${ imgPath }SkyW2.png`" id="bg">
        <img :src="`${ imgPath }MoonBig.png`" id="moon">
        <img :src="`${ imgPath }PlanetBig.png`" id="planet">
        <img :src="`${ imgPath }MountainsW2.png`" id="mountain">
        <img :src="`${ imgPath }CloudWBig.png`" id="cloud">
        <img :src="`${ imgPath }ValleyWNoSky2.png`" id="valley">
        <img :src="`${ imgPath }ForegroundWNoText2.png`" id="fg">
    </div>
    <main-header :imgPath="imgPath"/>
    <div class="pageContainer">
        <!-- Page Content -->
        <main >
            <article class="contentContainer">
                <slot></slot>
            </article>
        </main>
        <main-footer :imgPath="imgPath"/>
    </div>
	</div>
</template>
<style>
/*      - FONTS -        */
/*
@font-face {
	font-family: "VeteranTypewriter";
	src: local("VeteranTypewriter"),
		url("/fonts/veteran-typewriter.ttf") format("truetype");
}

@font-face {
	font-family: "TypeWrong";
	src: local("TypeWrong"),
		url("/fonts/TypeWrong-Smudged-Bold.ttf") format("truetype");
}
*/
@font-face {
	font-family: "GoldenDragon";
	src: local("GoldenDragon"),
		url("/fonts/golden-dragon-solid.ttf") format("truetype");
}
/*
@font-face {
	font-family: "Subscriber";
	src: local("Subscriber"),
		url("/fonts/SUBSCRIBER-Regular.otf") format("opentype");
}
*/
@font-face {
	font-family: "DaisyWheel";
	src: local("DaisyWheel"),
		url("/fonts/daisywhl.otf") format("opentype");
}

@import url('https://fonts.googleapis.com/css2?family=Raleway');
/*@import url('https://fonts.googleapis.com/css2?family=Luckiest+Guy');
@import url('https://fonts.googleapis.com/css2?family=Sigmar+One');
@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@800&display=swap');*/

/*-----------------------*/

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
	/* overflow: auto; */
}

body {
	/* font-family: "Avenir", Helvetica, Arial, sans-serif; */
	font-family: "Raleway";
	/* font-family: Arial, Helvetica, sans-serif; */
	line-height: 1.4;
	background: #869fb3;
    /* border: 1px solid #fefefe; */
}

.contentContainer > * {
	position: relative;
	width:100%;
}

.bgImg {
	position: absolute;
	top: 0;
	width: 100%;
	height: 100vh;
	overflow: hidden;
	display: flex;
	justify-content: center;
	align-items: center;
    -webkit-filter: blur(0px);
	filter: blur(0px);
}

.bgImg:before {
	content: '';
	position: absolute;
	bottom: 0;
	width: 100%;
	height: 100px;
	background: linear-gradient(to top, #869fb3, transparent);
	z-index: 50;
}

.bgImg img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
	pointer-events: none;
}

h1 {
	font-family: "GoldenDragon";
	font-size: 1.9em;
	/* letter-spacing: 1px; */ /* --> if using subscriber font;*/
}

.pageContainer {
	position: relative;
	min-height: 95vh;
}

.contentContainer {
	margin-top: 20px;
	padding-bottom: 14%;
}

.container {
	top: 100px;
	margin-top: 11%;
	left: 20px;
	right: 20px;
	bottom: 20px;
	position: fixed;
	overflow: hidden;
	overflow-y: scroll;
	-ms-overflow-style: none;
	scrollbar-width: none;
}

.container::-webkit-scrollbar {
  display: none;
}

</style>
<script>
    import MainHeader from '@/Layouts/MainHeader';
	import MainFooter from '@/Layouts/MainFooter';

	export default {
		name:"app-layout",
        props: ["imgPath"],
		components: {
			MainHeader,
			MainFooter
		},
        computed() {
            imgPath = () => {
                return isMiniGame ? '../assets/' : 'assets/'
            }
        },
		created () {
			window.addEventListener('scroll', this.handleScroll);
		},
		unmounted () {
			window.removeEventListener('scroll', this.handleScroll);
		},
		methods: {
			handleScroll (event) {
				const bg = document.getElementById("bg");
				const moon = document.getElementById("moon");
				const planet = document.getElementById("planet");
				const cloud = document.getElementById("cloud");
				const mountain = document.getElementById("mountain");
				const valley = document.getElementById("valley");
				const fg = document.getElementById("fg");

				const value = window.scrollY;

				bg.style.top = value * 0.6 + 'px';
				moon.style.left = -value * 0.5 + 'px';
				moon.style.top = value * 0.7 + 'px';
				planet.style.left = value * 0.3 + 'px';
				planet.style.top = value * 1 + 'px';
				cloud.style.top = value * 0.15 + 'px';
				mountain.style.top = value * 0.6 + 'px';
				valley.style.top = value * 0.4 + 'px';
				fg.style.top = value * 0.1 + 'px';
			}
		}
	}
</script>
