<template>
  <table class="table table-striped">
      <thead>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Acciones</th>
      </thead>
      <tbody>
        <tr v-for="producto, index in productos">
          <td>{{producto.descripcion}}</td>
          <td>{{producto.precio}}</td>
          <td>
            <a href="#"
              @click.prevent="showModal = true"
            >
              <i class="fa fa-edit"></i>
            </a>

            <a href="#"
              @click.prevent="borrar(producto.id, index)"
            >
              <i class="fa fa-trash"></i>
            </a>
          </td>
          <modal-productos
            v-if="showModal"
            :producto="producto"
            @cerrar="showModal = false"
          >
          </modal-productos>
        </tr>
      </tbody>
    </table>
</template>

<script>
  import ModalProductos from './ModalProductos'

  export default{
    name:'tabla-productos',
    components: {
      ModalProductos
    },
    data(){
      return{
        showModal: false
      }
    },
    props: {
      productos:{
        required: true
      }
    },
    methods:{
      borrar(id, index){
        axios.delete('/api/productos/' + id)
        .then((resp) => {
          this.productos.splice(index, id)
        }).catch(function (resp) {
          console.log(resp)
        });
      }
    }
  }
</script>
