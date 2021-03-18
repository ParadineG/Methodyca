<template>
    <app-layout imgPath="../assets/">
        <div class="mini-game">
            <div class="gameScreen">
                <unity src="../games/Binoculars/Build/exe.json" width="1024" height="576" unityLoader="../games/Binoculars/Build/UnityLoader.js"></unity>
            </div>
        </div>
    </app-layout>
</template>

<script>
	import Unity from '@/Layouts/Unity'
    import AppLayout from '@/Layouts/AppLayout.vue'

	export default {
		components: {
			Unity,
            AppLayout

		}
	}
</script>

<style scoped>
	.mini-game {
		display: flex;
		justify-content: center;
	}

	.gameScreen {
		background-color: rgba(61, 75, 88, 0.9);
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		padding: 20px;
		margin-bottom: 20px;
	}
</style>
