<template>
	<footer>
		<div class="sponsors">
			<img :src="`${ imgPath }dlg3S.png`" id="dlg">
			<img :src="`${ imgPath }tlu.png`" id="tlu">
			<!-- <img src="../../assets/hitsa2.png" id="hitsa"> -->
			<img :src="`${ imgPath }ITAkadeemiaWhite.png`" id="itAkadeemia">
		</div>
	</footer>
</template>

<style scoped>
	footer {
        position: absolute;
        width: 100%;
		bottom: 0;
	}

	.sponsors {
		position: relative;
		margin-top: 2%;
		margin-bottom: 3%;
		display: grid;
		grid-template-columns: 26% 26% 26%;
		grid-gap: 6%;
		justify-items: center;
		align-items: center;
		margin-left: 12%;
		margin-right: 5%;
	}

	.sponsors img {
		max-width: 70%;
	}
</style>

<script>
    export default {
		name:"main-footer",
        props: [
            "imgPath",
        ],
    }
</script>

