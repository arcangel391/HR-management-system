<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Details
            </h2>
        </template>


        <div class="py-12 px-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-3">
                  <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Post Information
        </template>

        <template #description>
            Update your post
        </template>

        <template #form>
         

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="title" value="Title" />
                <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="name" />
                <jet-input-error :message="form.errors.title" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="content" value="Content" />
                 <textarea
                class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                v-model="form.content"
                rows="10"
              ></textarea>
                <jet-input-error :message="form.errors.content" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3"
    import AppLayout from '@/Layouts/AppLayout';
      import JetButton from '@/Jetstream/Button';
    import JetFormSection from '@/Jetstream/FormSection';
    import JetInput from '@/Jetstream/Input';
    import JetInputError from '@/Jetstream/InputError';
    import JetLabel from '@/Jetstream/Label';
    import JetActionMessage from '@/Jetstream/ActionMessage';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';

    export default {
        components: {
            AppLayout,
             JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },
        props: ['post'],

        setup(props){
             const form =useForm({
                    _method: 'PUT',
                    title: props.post.title,
                    content: props.post.content,
               
                });
                const updateProfileInformation = () => {
               

                form.value.post(route('posts.update',props.post.id), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true
                });
            };

            return { form,updateProfileInformation }
        },
    };
</script>
