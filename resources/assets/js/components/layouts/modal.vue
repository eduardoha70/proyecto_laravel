<style>
  .ModalBody {
    color: #2a3f54;
  }
  .ModalFooter {
    background-color: #f5f5f5;
  }
</style>


<template>
  <transition name="modal">
    <div class="modal modal-mask" style="display: block">

      <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

          <div class="modal-header ModalHeader">
            <h4 class="modal-title">
              <button type="button" class="close" @click="$emit('cerrar')">
                <span aria-hidden="true">×</span>
              </button>
              <slot name="header"></slot>
            </h4>
          </div>

          <div class="modal-body">
            <slot name="body"></slot>
          </div>

          <div class="modal-footer">
            <button class="btn btn-primary" @click.prevent="$emit('guardar')">Guardar</button>
            <button class="btn btn-danger" @click.prevent="$emit('cerrar')">Cerrar</button>
          </div>

        </div>

      </div>

    </div>
  </transition>
</template>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  /*transition: opacity .3s ease;*/
}
</style>
