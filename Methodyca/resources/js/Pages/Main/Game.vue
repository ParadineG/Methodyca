<template>
    <app-layout imgPath="assets/">
        <div class="game">
            <div id="unityContainer">
                <unity src="games/Methodyca/Build/exe.json" width="1024" height="576" unityLoader="games/Methodyca/Build/UnityLoader.js"></unity>
                <!--<p>Sadly the game is not yet available :(</p>-->
            </div>
        </div>
    </app-layout>
</template>

<script>
	//import TextBlock from '@/Layouts/TextBlock';
	import Unity from '@/Layouts/Unity'
    import AppLayout from '@/Layouts/AppLayout';

	export default {
		name:"game",
		components: {
			//TextBlock,
			Unity,
            AppLayout
		}
	}
</script>

<style scoped>
	.game {
		display: flex;
		justify-content: center;
	}

	.gameScreen {
		background-color: rgba(61, 75, 88, 0.9);
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		padding: 20px;
		margin-bottom: 20px;
	}

	#unityContainer {
		background-color: rgba(61, 75, 88, 0.9);
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		padding: 20px;
		margin-bottom: 20px;

		/*width: 80%;
		height: 40vw;
		padding: 0px;
		margin: 0px;
		border: 0px none;
		position: relative;
		background: rgba(61, 75, 88, 0.9) none repeat scroll 0% 0%;
		left: 50%;
		transform: translateX(-50%);
		color: #fefefe;
		text-align: center;
		font-family: "DaisyWheel";
		font-size: 2em;*/
	}

	@media screen and (max-width: 990px) {
		#unityContainer {
			font-size: 1em;
		}
	}

</style>
