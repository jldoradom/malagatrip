<template>
    <div>
        <span class="like-btn" @click="likeReceta" :class="{ 'like-active' : this.like }"></span>
        <p>{{this.likes }}Les gusto la receta</p>
    </div>
</template>


<script>
export default {
    props: ['establecimientoId', 'like', 'likes'],
    data: function(){
        return {
            isActive: this.like,
            totalLikes: this.likes
        }
    },
    methods:{
        likeReceta(){
            console.log('diste me gusta ' + this.establecimientoId);
            axios.post('establecimientos/' + this.establecimientoId)
            .then(respuesta => {
                console.log(respuesta);
                if(respuesta.data.attached.length > 0 ){
                    this.$data.totalLikes++;
                } else {
                     this.$data.totalLikes--;
                }

              this.isActive = !this.isActive
            })
            .catch(error => {
                console.log(error);
            //    if(error.response.status === 401){
            //        window.location = '/register';
            //    }
           })
        },
        // cantidadLikes: function() {
        //     axios.get('/api/establecimiento/' + this.establecimientoId)
        //             .then(response => {
        //                 console.log("respuesta: " + response.data);
        //                 return response.data;
        //             })

        // }
    },
    computed: {
        // cantidadLikes: function() {
        //     axios.get('/api/establecimiento/' + this.establecimientoId)
        //             .then(response => {
        //                 console.log("respuesta: " + response.data);
        //                 this.totalLikes = response.data;
        //                 return this.totalLikes;
        //             })

        // }
    }
}
</script>
