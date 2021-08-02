<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Employee Details
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-3" >
                     <div class="mt-2" v-show="! photoPreview">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>
                <br>
                <br>
                Name:  {{ user.name }}<br>
                Email: {{ user.email }}<br>
                Role:  {{ user.role }}<br>
             <div v-if="user.can.update"> Created at:   {{ user.created_at }} </div>
                   <div v-if="user.can.update">  Updated at:      {{ user.updated_at }} </div><br/>
                  
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },
        props: ['user']
    };
</script>
