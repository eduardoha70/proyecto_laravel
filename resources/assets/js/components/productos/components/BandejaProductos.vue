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
      :productos="productos"
      @cerrar="showModal = false"
    >
    </modal-productos>

    <tabla-productos
      v-if="productos.length > 0"
      :productos="productos"
    ></tabla-productos>

    <div style="text-align: center">
      <paginate
        :page-count="pagination"
        :page-range="3"
        :margin-pages="2"
        :click-handler="filtrarPagination"
        :prev-text="'Ant'"
        :next-text="'Sig'"
        :container-class="'pagination'"
        :page-class="'page-item'">
      </paginate>
    </div>

  </div>
</template>

<script>
  import ModalProductos from './ModalProductos'
  import TablaProductos from './TablaProductos'

  import Paginate from 'vuejs-paginate'

  export default{
    name: 'bandeja-productos',
    components: {
      ModalProductos,
      Paginate,
      TablaProductos
    },
    data(){
      return{
        showModal: false,
        productos: [],
        pagination: 0
      }
    },
    mounted() {
      axios.get('/api/productos', {params: { limit: 10}})
      .then((resp) => {
        this.productos = resp.data.data
        this.pagination = resp.data.meta.last_page
      }).catch(function (resp) {
        console.log(resp)
      });
    },
    methods: {
      filtrarPagination(pageNum){
         axios.get('/api/productos', {params: { limit: 10, page: pageNum }})
        .then((resp) => {
          this.productos = resp.data.data
          this.pagination = resp.data.meta.last_page
        }).catch(function (resp) {
          console.log(resp)
        });
      }
    }
  }
</script>


