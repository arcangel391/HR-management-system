<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts List
                  <inertia-link
          class="float-right"
          :href="route('posts.create')"
          
        >
          <jet-button>Create</jet-button>
        </inertia-link>
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                TITLE
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                CREATED AT
              </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                UPDATED AT
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200" >
            <tr v-for="post in posts" :key="post.id" >
              <td class="px-6 py-4 whitespace-nowrap" >
                <div class="flex items-center">
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{post.id}}
                    </div>
                    <div class="text-sm text-gray-500" >
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{post.title}}
                </span>
              </td>
                <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  {{post.created_at}}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" >
                {{post.updated_at}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <inertia-link :href="route('posts.show', post.id)" class="text-indigo-600 hover:text-indigo-900" v-if="post.can.view">Show</inertia-link>
                <inertia-link :href="route('posts.edit', post.id)" class="ml-2 text-indigo-600 hover:text-indigo-900" v-if="post.can.update">Edit</inertia-link>
                  <button
                            @click="deletePost(post.id)"
                            class="ml-2 text-red-600 hover:text-red-900"
                            v-if="post.can.delete"
                          >
                            Delete
                          </button>
              </td>
            </tr>

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    AppLayout,
    JetButton,
    
  },

   props: ['posts'],

    setup(props) {
   

  

    const deletePost = (postId) => {
      const result = confirm("Do you want to delete this post?");
      if (result) {
        Inertia.delete(route("posts.destroy", postId), {
          preserveScroll: true,
        });
      }
    };

    return { deletePost };
  },
   
   
   
  

 
};
</script>
