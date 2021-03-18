<template>
	<div class="miniGameBlock">
        <inertia-link :href="route(minigameHref)" target="_blank">
			<img :src="`assets/${ picture_src }`" alt="mini-game thumbnail">
			<div class="description">
				<h1>{{ pic_title }}</h1>
				<p>{{ pic_desc }}</p>
			</div>
        </inertia-link>
	</div>
</template>

<script>
export default {
	name: "mini-games-block",
	props: {
        picture_src: String,
        pic_desc: String,
		pic_title: String,
		minigameHref: String
    },
    /* methods: {
        resolve_img_url: function (path) {
            let images = require.context('../../assets/', false, /\.png$|\.jpg$/)
            return images("./"+path)
        }
    } */
}
</script>

<style scoped>
	.miniGameBlock {
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		/*old color 254*/
		background-color: rgba(61, 75, 88, 0.9);
		/* background-color: #fefefe; */
		max-width: 800px;
		min-width: 100px;
		padding: 10px;
		margin: 20px;
		margin-top: 0px;
		text-decoration: none;
	}

	img {
		width: 100%;
	}

	.description {
		width: 100%;
		background-color: rgba(61, 75, 88, 0);
		/* background-color: #fefefe; */
		text-align: center;
		color: #fefefe;
		line-height: 1.2;
	}
	a {
		text-decoration: none;
	}

	.description h1 {
		font-size: 1.9em;
		/* letter-spacing: 2px; */
	}

	.description p {
		padding: 5px;
		font-weight: normal;
		/* font-family: Times New Roman, Times, serif; */
	}

</style>
