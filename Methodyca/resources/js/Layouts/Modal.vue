<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              default header
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              default body
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              <button class="button-success" @click="$emit('close')">
                OK
              </button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<style scoped>
#app {
  padding: 1rem;
}

.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}
.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  color: #fefefe;
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: rgb(35, 43, 51);
  box-shadow: 0 10px 20px 0 rgba(61, 75, 88, 0.3), 0 10px 40px 0 rgba(61, 75, 88, 0.25);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
    margin-top: 0;
    font-weight: bold;
}

.modal-body {
    margin: 20px 0;
}
.button-success {
    color: white;
    border-radius: 4px;
    border: 1px solid rgba(254,254,254, 0.9);
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    background: rgba(61, 75, 88, 0);
    font-size: 125%;
    padding-left: 16px;
    padding-right: 16px;
    padding-top: 5px;
    padding-bottom: 4px;
    color: #fefefe;
    font-family: "Raleway";
    font-weight: 800;
    font-size: 18px;
    transition: 0.7s ease;
    text-decoration: none;
    margin-top: 10px;
    cursor: pointer;
}

.button-success:hover {
    color: rgba(0,237,255, 0.9);
    border: 1px solid rgba(0,237,255, 0.9);
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

</style>

<script lang="ts">
    export default {
        data() {
            return {
                showModal: false
            }
        }
    }
</script>
