<template>
    


    <form @submit.prevent="songUpdate" >
        <div v-for="format in form" >
            <input type="text" placeholder="titre"  v-model="format.title" >  
            <input type="text" placeholder="paroles" v-model="format.lyris" height="100" >          
        </div>

        
        <input type="submit" value="Editer">
    </form>

</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        
        props: {
            
            song : Array
        
        },
        data(){

            return {
                form: this.song
            }
        },
        components: {
            AppLayout
        },
      
        methods:{
            songUpdate(){
                console.log(this.form[0].id)
                this.$inertia.put('/songs/'+this.form[0].id, this.form[0], { preserveState: true });
            }
        }
    }

</script>
