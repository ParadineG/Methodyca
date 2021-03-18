<template>
  <div class="gallery">
    <transition-group name="fade" tag="div">
      <div v-for="i in [currentIndex]" :key="i">
        <img :src="`assets/${currentImg}`" />
      </div>
    </transition-group>
    <a class="prev" @click="prev" href="javascript:void(0);">&#10094;&#10094;</a>
    <a class="next" @click="next" href="javascript:void(0);">&#10095;&#10095;</a>
  </div>
</template>

<style scoped>
	.gallery {
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		text-align: center;
		color: rgba(61, 75, 88, 0.8);
		/*#2c3e50;*/
		position: relative;
		/* height: */
	}

	.fade-enter-active,
	.fade-leave-active {
		transition: all 0.9s ease;
		overflow: hidden;
		visibility: visible;
		width: 100%;
		opacity: 1;
	}

	.fade-enter-active {
		position: relative;
	}

	.fade-leave-active {
		position: absolute;
	}

	.fade-enter,
	.fade-leave-to {
		visibility: hidden;
		width:100%;
		opacity: 0;
	}

	img {
		width: 60%;
		box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
        margin: auto;
	}

	.prev, .next {
		cursor: pointer;
		position: absolute;
		top: 47%;
		width: auto;
		padding: 16px;
		color: #00edff;
		font-weight: bold;
		font-size: 18px;
		transition: 0.7s ease;
		text-decoration: none;
		user-select: none;
	}

	.next {
		right: 20%;
		border-radius: 4px 0px 0px 4px;
	}

	.prev {
		left: 20%;
		border-radius: 0 4px 4px 0;
	}

	.prev:hover, .next:hover {
		background-color: rgba(61, 75, 88, 0.9);
	}

	@media screen and (max-width: 990px) {
		img {
			width: 90%;
			box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
		}

		.next {
			right: 5%;
			top: 43%;
		}

		.prev {
			left: 5%;
			top: 43%;
		}
	}
</style>

<script>
export default {
  name: "slider",
  data() {
    return {
        images: [
            "Gallery1.png",
            "Gallery2.png",
            "Gallery3.png"
        ],
        timer: null,
        currentIndex: 0,
	    rotationTime: 7000
    };
  },

  mounted: function() {
    this.startSlide();
  },

  methods: {
    startSlide: function() {
      this.timer = setTimeout(this.next, this.rotationTime);
    },

    next: function() {
        clearTimeout(this.timer);
        this.currentIndex += 1;
		this.timer = setTimeout(this.next, this.rotationTime);
    },
    prev: function() {
		clearTimeout(this.timer);
        this.currentIndex -= 1;
		this.timer = setTimeout(this.next, this.rotationTime);
    }
  },

  computed: {
    currentImg: function() {
      return this.images[Math.abs(this.currentIndex) % this.images.length];
    }
  }
};
</script>
