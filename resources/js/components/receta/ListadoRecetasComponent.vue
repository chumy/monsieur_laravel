<template>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tiempo</th>
            <th scope="col">Personas</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            <lista-receta-component 
                v-for="receta in recetas" 
                :key="receta.id"
                :receta="receta"> 
            </lista-receta-component>
        </tbody>
    </table>
</template>

<script>
export default {
    data(){
        return {
            recetas: [{
                'id' : 1, 
                'nombre': 'Receta 1',
                'tiempo':1,
                'personas' : 3}]
        }
    },
    mounted(){
        console.log('Component listado montado.')
    }
}
</script>