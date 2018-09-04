<template>
  <table class="table table-striped">
      <thead>
        <th style="width: 70%">Descripcion</th>
        <th style="width: 15%">Precio</th>
        <th style="width: 15%">Acciones</th>
      </thead>
      <tbody>
        <item-producto
          v-for="producto,index in productos"
          :key="producto.id"
          :producto="producto"
          :productos="productos"
        >
        </item-producto>
      </tbody>
    </table>
</template>

<script>
  import ItemProducto from './ItemProducto'
  export default{
    name:'tabla-productos',
    components:{
      ItemProducto
    },
    props: {
      productos:{
        required: true
      }
    }
  }
</script>

