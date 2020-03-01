<template>
    
        <tr>
            <th scope="row">{{ receta.id }}</th>
            <td>{{ receta.nombre }}</td>
            <td>{{ receta.tiempo }}</td>
            <td>{{ receta.personas }}</td>
            <td>
                <form action="#" method="POST">
                    <a href="#" class="btn btn-link"><span class="oi oi-eye"></span></a>
                    <a href="#" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </td>
        </tr>

</template>
<script>
export default {
    props : ['receta'],
    data() {
        return {
            receta:{
                'id' : '', 
                'nombre': '',
                'tiempo':'',
                'personas' : ''
            }
        }
    }
}
</script>