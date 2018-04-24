<template>
  <div>

    <button class="btn btn-default"
      @click.prevent="showModal = true"
    >
      Abrir modal
    </button>

    <modal
      v-if="showModal"
      @close="showModal = false"
    >
      <h3 slot="header" class="modal-title">
        Modal title
      </h3>
    </modal>

    <table class="table table-stripped table-bordered">
      <thead>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Acciones</th>
      </thead>
      <tbody>
        <tr v-for="producto in productos">
          <td>{{producto.descripcion}}</td>
          <td>{{producto.precio}}</td>
          <td>  </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import Modal from './../../layouts/modal';

  export default{
    name: 'bandeja-productos',
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
    components: {
      Modal
    },
    computed: {
      data(){
        let a = [2,3,1,10,8]
        return a.filter((item) => {
          return item > 4
        })
      }
    }
  }
</script>

