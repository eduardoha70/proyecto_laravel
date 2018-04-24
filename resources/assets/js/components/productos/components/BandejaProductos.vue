<template>
  <div>
    <div class="title_left">
      <h3>Productos</h3>
    </div>

    <div class="col-md-12">
      <div class="pull-right" style="margin-bottom: 15px;">
        <button class="btn btn-warning"
          @click.prevent="showModal = true"
        >
          Crear nuevo producto
        </button>
      </div>
    </div>

    <modal-productos
      v-if="showModal"
      @cerrar="showModal = false"
    >
    </modal-productos>

    <div class="SIDJ-box">
      <tabla-productos
        v-if="productos.length > 0"
        :productos="productos"
      ></tabla-productos>
    </div>


  </div>
</template>

<script>
  import ModalProductos from './ModalProductos'
  import TablaProductos from './TablaProductos'

  export default{
    name: 'bandeja-productos',
    components: {
      ModalProductos,
      TablaProductos
    },
    data(){
      return{
        showModal: false,
        productos: []
      }
    },
    mounted() {
      axios.get('/api/productos')
      .then((resp) => {
        this.productos = resp.data.data
        console.log(this.productos)
      }).catch(function (resp) {
        console.log(resp)
      });
    },
  }
</script>

