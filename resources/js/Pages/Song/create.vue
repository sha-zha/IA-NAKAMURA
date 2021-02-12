<template>
    <form @submit.prevent="songStore">
        <input type="text" v-model="form.title" placeholder="titre" >
        <input type="textarea" placeholder="paroles" v-model="form.lyris">
        <input type="submit" value="ajouter">
    </form>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import { Inertia } from '@inertiajs/inertia'

    export default {

        data(){
            return {
                form: {
                    title :'',
                    lyris: ''               
                }
            }


        },
        methods: {
            songStore (){

               console.log(this.form.title);

                this.$inertia.post('/songs', this.form, { preserveState: false });
            }
        }

    }
</script>
