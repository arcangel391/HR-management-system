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
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
         

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.errors.email" class="mt-2" />
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
        props: ['user'],

        setup(props){
             const form =useForm({
                    _method: 'PUT',
                    name: props.user.name,
                    email: props.user.email,
               
                });
                const updateProfileInformation = () => {
               

                form.value.post(route('users.update',props.user.id), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true
                });
            };

            return { form,updateProfileInformation }
        },
    };
</script>
