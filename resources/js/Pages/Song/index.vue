<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Les dernières chansons
            </h2>
        </template>

        <song-create></song-create>

        <div class="py-12">

            <div v-for="song in songs" :key= "song.id ">

            <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
              
              <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                <blockquote>
                  <p class="text-lg font-semibold">
                    {{ song.title }}
                  </p>
                     <a :href="'/songs/'+song.id"class=" bg-indigo-600 border-4  border-indigo-600">
                        Voir plus 
                     </a>

                     <a v-bind:href="'/delete/'+song.id" class="bg-red-600 border-4  border-red-600">Supprimer {{ song.id }}</a>
                </blockquote>

              </div>
            </figure>
                
  


            </div>
       
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import SongCreate from '@/Pages/Song/create'


    export default {
        components: {
            AppLayout,
            SongCreate
        },
        props: {
            songs : Array
        }
    }
</script>
